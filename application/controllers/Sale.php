<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sale extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Settings_model');
		$this->load->model('Sale_model');
		$this->load->model('Inventory_model');
        
	}
	public function index()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Sale/list';
		$template['script'] = 'Sale/script';
		$this->load->view('template',$template);
	}
	public function add()
	{
		$this->form_validation->set_rules('company', 'company', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}

			//invoice id auto increment
			@$lastinvoiceid = $this->General_model->getLastInvoiceID2();

			if(isset($lastinvoiceid)){
				@$incremented_number = $lastinvoiceid[0]['invoice_number'] + 1;
				@$template['invoice'] = $incremented_number;
			}
			else{
				$template['invoice'] = 1;
			}
			//	
			$template['company']=$this->General_model->getCompanies();
			$template['customers'] = $this->General_model->getCustomers();
			$template['pcategory'] = $this->General_model->getPriceCategories();
			$template['itemlist'] = $this->General_model->getItemlist();
			$template['bank'] = $this->Sale_model->GetBank();
			$template['body'] = 'Sale/add';
			$template['script'] = 'Sale/script';
			$this->load->view('template', $template);
		}
		else 
		{
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}
			
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
			$sale_date = str_replace('/', '-', $this->input->post('pur_date'));
			$sale_date =  date("Y-m-d",strtotime($sale_date));
			$product_id = $this->input->post('product_id_fk');
			$cust_id = $this->input->post('cust_id');
			$cmp_id = $company;
			$sale_quantity = $this->input->post('quantity');
			$sale_price = $this->input->post('price');
			$discount_price = $this->input->post('discount'); 
		
			$tax_per = $this->input->post('tax');
			$total_price = $this->input->post('total');
			$counter = $this->input->post('counter');
			$draft = $this->input->post('draft');
			if ($draft != 1 && $draft != 2) 
			{
				$invc_no = $this->input->post('invoice_number_edit');
				if (isset($invc_no)) 
				{
					$records = $this->Sale_model->getSaleReportInvoice($invc_no);
					for($i=0;$i<count($records);$i++)
					{
						$stok = $this->Inventory_model->get_stk($records[$i]->product_id_fk);
			            $nwstk = $stok[0]->stock + $records[$i]->sale_quantity;
						$updateData = array(
						'stock' =>$nwstk);			
						$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$records[$i]->product_id_fk);
					}
					$this->Sale_model->UpdateSale($invc_no);
				}
				$j=1;
				$counter_old = $this->input->post('counter_old');
				// echo $counter_old;
				for ($i=0; $i < $counter; $i++) 
				{
					for ($k=$j; $k <= $counter_old ; $k++) 
					{ 
						if ($this->input->post('disradio_'.$k.'') != NULL) 
						{
							$discount_type = $this->input->post('disradio_'.$k.'');
							$j = $k;
							// echo $discount_type;
							break;
						}
					}
					//remark checkbox
					$remark_checkbox = $this->input->post('remark_chk');
					if($remark_checkbox[$i] == 1){
						$remark_text = $this->input->post('remarks_text');
					}
					else
					{
						$remark_text = "";
					}
					$data=array(
					  'product_id_fk' =>$product_id[$i],
					  'cust_id' =>$cust_id,
					  'cmp_id' =>$cmp_id,
					  'finyear' => $fyr,
					  'price_category'=>$this->input->post('optradio'),
					  'invoice_number' =>$this->input->post('invoice_number'),
					  'sale_quantity' =>$sale_quantity[$i],
					  'sale_price' =>$sale_price[$i],
					  'discount_price' =>$discount_price[$i],
					  'discount_type' =>$discount_type,
					  'total_price' =>$total_price[$i],
					  'sale_remark' =>$remark_text[$i],
					  'sale_date' =>$sale_date,
					  'stockstatus' =>0,
					  'sale_status' =>1
					);
					$result = $this->General_model->add_returnID('tbl_sale',$data);
					$insert_id = $this->db->insert_id();

					$stok = $this->Inventory_model->get_stk($product_id[$i]);
		            $nwstk = $stok[0]->stock - $sale_quantity[$i];
					$updateData = array(
					'stock' =>$nwstk);			
					$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$product_id[$i]);
				$j++;	
				}
				//check if radio button of bank is selected
				$radio_type = $this->input->post('bank_or_cash');
					if($radio_type == 1){
						//bank radio selected
						$bank_id4 = $this->input->post('bank_id');
						$bank_amt = $this->input->post('cash');
						$cash_amt = 0;
					}
					else{
						//cash radio selected
						$bank_id4 = NULL;
						$bank_amt = 0;
						$cash_amt = $this->input->post('cash');
					}	

				$datap = array(
						'invoice_number' =>$this->input->post('invoice_number'),
						'tax_amount'=>$this->input->post('tax_sum'),
						'bill_discount'=>$this->input->post('bill_discount'),
						'bill_discount_type'=>$this->input->post('bill_dis'),
						'frieght'=>$this->input->post('frieght'),
						'packing_charge'=>$this->input->post('pack_chrg'),
	  					'net_total' =>$this->input->post('sum'),
	  					'cash_paid' => $cash_amt,
	  					'bank_paid' => $bank_amt,
	  					'bank_id' => $bank_id4,
	  					'old_balance' => $this->input->post('old_bal'),
	  					'net_balance' => $this->input->post('net_bal'),
						'round_off_amt' => $this->input->post('round_off'),
	  					'payment_status'=>1 
	  					);
						  
				$result = $this->General_model->add('tbl_salepayments',$datap);
				if($invc_no)
				{
					$this->db->where('sale_id_fk',$invc_no)->delete('tbl_ledgerhead');
				}			  
				$upData = array('old_balance' =>$this->input->post('net_bal'));
				$stk = $this->General_model->update('tbl_customer',$upData,'cust_id',$cust_id);
				$response_text = 'Sale added successfully';

				if($this->input->post('round_off_diff') > 0){		  
				//Insert Round Off Difference in ledgerHead
				
					$round_off_diff = array(
						'group_id_fk' => 27,
						'ledger_head' => 'Round_off@Sale',
						'ledgerhead_desc' => 'Round off Sale',
						'opening_bal' => $this->input->post('round_off_diff'),
						'debit_or_credit' => 1,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0
					);
				$result45 = $this->General_model->add('tbl_ledgerhead',$round_off_diff); 	 
				
			}
		}
			
			else
			{
				if($draft == 2)
				{
					//Update AS DRAFT//
					$invc_no = $this->input->post('invoice_number_edit');
					$prod_table_id = $this->input->post('pro_table_id');
					$prod_pay_id = $this->input->post('sale_pay_id');
					$j=1;
					for ($i=0; $i < $counter; $i++) 
					{ 
						$data=array(
						'product_id_fk' =>$product_id[$i],
						'cust_id' =>$cust_id,
						'cmp_id' =>$cmp_id,
						'finyear' => $fyr,
						'price_category'=>$this->input->post('optradio'),
						'invoice_number' =>$this->input->post('invoice_number'),
						'sale_quantity' =>$sale_quantity[$i],
						'sale_price' =>$sale_price[$i],
						'discount_price' =>$discount_price[$i],
						'discount_type' =>$this->input->post('disradio_'.$j.''),
						'total_price' =>$total_price[$i],
						'sale_date' =>$sale_date,
						'stockstatus' =>0,
						'sale_status' =>2 //draft
						);
						$result = $this->General_model->update('tbl_sale',$data,'sale_id',$prod_table_id[$i]);
						// $insert_id = $this->db->insert_id();
					$j++;	
					}
					$datap = array(
							'invoice_number' =>$this->input->post('invoice_number'),
							'tax_amount'=>$this->input->post('tax_sum'),
							'bill_discount'=>$this->input->post('bill_discount'),
							'bill_discount_type'=>$this->input->post('bill_dis'),
							'frieght'=>$this->input->post('frieght'),
							'packing_charge'=>$this->input->post('pack_chrg'),
							'net_total' =>$this->input->post('sum'),
							'cash_paid' =>$this->input->post('cash'),
							'bank_paid' =>$this->input->post('bank'),
							'old_balance'=>$this->input->post('old_bal'),
							'round_off_amt' => $this->input->post('round_off'),
							'net_balance'=>$this->input->post('net_bal'),
							'payment_status'=>1 
							);
					$result = $this->General_model->update('tbl_salepayments',$datap,'sale_payment_id',$prod_pay_id);
					$response_text = 'Draft added successfully';
				}
				else{
				$j=1;
				for ($i=0; $i < $counter; $i++) 
				{ 
					$data=array(
					  'product_id_fk' =>$product_id[$i],
					  'cust_id' =>$cust_id,
					  'cmp_id' =>$cmp_id,
					  'finyear' => $fyr,
					  'price_category'=>$this->input->post('optradio'),
					  'invoice_number' =>$this->input->post('invoice_number'),
					  'sale_quantity' =>$sale_quantity[$i],
					  'sale_price' =>$sale_price[$i],
					  'discount_price' =>$discount_price[$i],
					  'discount_type' =>$this->input->post('disradio_'.$j.''),
					  'total_price' =>$total_price[$i],
					  'sale_date' =>$sale_date,
					  'stockstatus' =>0,
					  'sale_status' =>2 //draft
					);
					$result = $this->General_model->add('tbl_sale',$data);
					$insert_id = $this->db->insert_id();
				$j++;	
				}
				$datap = array(
						'invoice_number' =>$this->input->post('invoice_number'),
						'tax_amount'=>$this->input->post('tax_sum'),
						'bill_discount'=>$this->input->post('bill_discount'),
						'bill_discount_type'=>$this->input->post('bill_dis'),
						'frieght'=>$this->input->post('frieght'),
						'packing_charge'=>$this->input->post('pack_chrg'),
	  					'net_total' =>$this->input->post('sum'),
	  					'cash_paid' =>$this->input->post('cash'),
	  					'bank_paid' =>$this->input->post('bank'),
	  					'old_balance'=>$this->input->post('old_bal'),
						'round_off_amt' => $this->input->post('round_off'),
	  					'net_balance'=>$this->input->post('net_bal'),
	  					'payment_status'=>1 
	  					);
				$result = $this->General_model->add('tbl_salepayments',$datap);
				$response_text = 'Draft added successfully';
					}
			}
			
			if($result)
			{
				if (isset($invc_no)) 
				{	
	        		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;sale Details Updated successfully&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
	        	}
			}
			else
			{
	        	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Sale/', 'refresh');
		}
	}
	public function getCustomerbyCompany()
	{
		header('Content-Type: application/x-json; charset=utf-8');
		$data = $this->General_model->getCustomerbyCompanyid($this->input->post('cmp_id'));
		echo json_encode($data);
	}
	public function getcustDetails()
	{
		$records = $this->General_model->getCustomersData($this->input->post('cust_id'));
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function checkInvoicenumber()
	{
		$records = $this->Sale_model->checkInvoiceUsed($this->input->post('invoice_number'));
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function getSale()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		if ($this->session->userdata['user_type'] =='C')
		{
			$company =  $this->session->userdata['cmp_id'];
			$param['company'] =$company;
		}
		
		// $param['invoice_number'] = (isset($_REQUEST['invoice_number']))?$_REQUEST['invoice_number']:'';
		// $param['supplier_id'] = (isset($_REQUEST['supplier_id']))?$_REQUEST['supplier_id']:'';
		// $purchase_date =(isset($_REQUEST['purchase_date']))?$_REQUEST['purchase_date']:'';
		// if($purchase_date)
		// {
  //           $purchase_date = str_replace('/', '-', $purchase_date);
  //           $param['purchase_date'] =  date("Y-m-d",strtotime($purchase_date));
  //       }
			
		$data = $this->Sale_model->getSaleReport($param);
		// var_dump($data);die;
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function edit($invoice)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['customers'] = $this->General_model->getCustomers();
		$template['pcategory'] = $this->General_model->getPriceCategories();
		$template['itemlist'] = $this->General_model->getItemlist();
		$template['bank'] = $this->Sale_model->GetBank();
		$template['records'] = $this->Sale_model->getSaleReportInvoice($invoice);
		// var_dump($template['records']);die;
		$template['body'] = 'Sale/edit';
		$template['script'] = 'Sale/editscript';
		$this->load->view('template', $template);
	}
	public function deleteSale()
	{
		$invoice = $this->input->post('invoice');
		$records = $this->Sale_model->getSaleReportInvoice($invoice);
		for($i=0;$i<count($records);$i++)
		{
			$stok = $this->Inventory_model->get_stk($records[$i]->product_id_fk);
		    $nwstk = $stok[0]->stock + $records[$i]->sale_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$records[$i]->product_id_fk);
		}
		
		$amt = $this->Sale_model->getOldbalance($records[0]->cust_id);
		$net_total = $this->Sale_model->getNet($invoice);
		$balance = $amt - $net_total;
		$upData = array('old_balance' => $balance);
		$stk = $this->General_model->update('tbl_customer',$upData,'cust_id',$records[0]->cust_id);

		$updateData = array('sale_status' => 0);
        $data = $this->General_model->update('tbl_sale',$updateData,'invoice_number',$invoice);

		$update = array('payment_status' => 0);
		$data = $this->General_model->update('tbl_salepayments',$update,'invoice_number',$invoice);

        if($data) {
            $response['text'] = 'Deleted successfully';
            $response['type'] = 'success';
        }
        else{
            $response['text'] = 'Something went wrong';
            $response['type'] = 'error';
        }
        $response['layout'] = 'topRight';
        $data_json = json_encode($response);
        echo $data_json;
	}
}