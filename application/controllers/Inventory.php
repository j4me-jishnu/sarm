<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
		$this->load->model('Inventory_model');
        
	}
	public function index()
	{

	}
	public function Purchase()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['supplier'] = $this->General_model->getSuppliers();
		$template['body'] = 'Inventory/Purchase/list';
		$template['script'] = 'Inventory/Purchase/script';
		$this->load->view('template', $template);
	}
	public function getPurchase()
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
		
		$param['invoice_number'] = (isset($_REQUEST['invoice_number']))?$_REQUEST['invoice_number']:'';
		$param['supplier_id'] = (isset($_REQUEST['supplier_id']))?$_REQUEST['supplier_id']:'';
		$purchase_date =(isset($_REQUEST['purchase_date']))?$_REQUEST['purchase_date']:'';
		if($purchase_date)
		{
            $purchase_date = str_replace('/', '-', $purchase_date);
            $param['purchase_date'] =  date("Y-m-d",strtotime($purchase_date));
        }
			
		$data = $this->Inventory_model->getPurchaseReport($param);
		// var_dump($data);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addPurchase()
	{
		$this->form_validation->set_rules('supp_id', ' Supplier Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			//invoice id auto increment
			@$hello = $this->General_model->getLastInvoiceID();
			if(isset($hello)){
				@$index = $hello[0]['invoice_number'] + 1;
				@$template['invoice'] = $index;
			}
			else{
				$template['invoice'] = 1;
			}
			//
			
			$template['company']=$this->General_model->getCompanies();
			$template['supplier'] = $this->General_model->getSuppliers();
			$template['pcategory'] = $this->General_model->getPriceCategories();
			$template['itemlist'] = $this->General_model->getItemlist();
			$template['banklist'] = $this->General_model->getBankListTable();
			$template['body'] = 'Inventory/Purchase/add';
			$template['script'] = 'Inventory/Purchase/script';
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
			$purchase_date = str_replace('/', '-', $this->input->post('pur_date'));
			$purchase_date =  date("Y-m-d",strtotime($purchase_date));
			$product_id = $this->input->post('product_id_fk');
			$supp_id = $this->input->post('supp_id');
			$cmp_id = $company;
			// Bank or Cash
			$radio_type = $this->input->post('bank_or_cash');
			if($radio_type == 1){
				$bank_id = $this->input->post('bank_id');
			}
			else{
				$bank_id = NULL;
			}
			
			$purchase_quantity = $this->input->post('quantity');
			$purchase_price = $this->input->post('price');
			$discount_price = $this->input->post('discount'); 
			$purchase_return = $this->input->post('return'); 
			$tax_per = $this->input->post('tax');
			$total_price = $this->input->post('total');
			$counter = $this->input->post('counter');
			$draft = $this->input->post('draft');
			if ($draft != 1 && $draft != 2) 
			{	
				
				$invc_no = $this->input->post('invoice_number_edit');
				if (isset($invc_no)) 
				{
					$this->Inventory_model->UpdatePurchase($invc_no);
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
					if(@$remark_checkbox[$i] == 1){
						$remark_text = $this->input->post('remarks_text');
					}
					else
					{
						$remark_text[] = "";
					}
					$data=array(
					  'product_id_fk' =>$product_id[$i],
					  'supp_id' =>$supp_id,
					  'cmp_id' =>$cmp_id,
					  'bank_id' =>$bank_id,
					  'finyear' => $fyr,
					  'price_category'=>$this->input->post('optradio'),
					  'invoice_number' =>$this->input->post('invoice_number'),
					  'reference_bill_id'=>$this->input->post('ref_bill_id'),
					  'purchase_quantity' =>$purchase_quantity[$i],
					  'purchase_price' =>$purchase_price[$i],
					  'discount_price' =>$discount_price[$i],
					  'purchase_return' => $purchase_return[$i],
					  'discount_type' =>$discount_type,
					  'total_price' =>$total_price[$i],
					  'purchase_remarks' =>$remark_text[$i],
					  'purchase_date' =>$purchase_date,
					  'stockstatus' =>0,
					  'purchase_status' =>1
					);

					
					// print_r($data);
					$result = $this->General_model->add('tbl_purchase',$data);
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
	  					'net_balance'=>$this->input->post('net_bal'),
	  					'payment_status'=>1 
	  					);
				$result = $this->General_model->add('tbl_purchasepayments',$datap);
				if($invc_no)
				{
					$this->db->where('purchase_fk_id',$invc_no)->delete('tbl_ledgerhead');
				}
				$upData = array('supplier_oldbal' =>$this->input->post('net_bal'));
				$stk = $this->General_model->update('tbl_supplier',$upData,'supplier_id',$supp_id);
				$response_text = 'Purchase added successfully';
				$round_off_variable = $this->input->post('round_off2');
				//If round of value less than and equal to 49 paise enter to ledger head as roundoff value in credit
				if($this->input->post('round_off2') > 0 && $this->input->post('round_off2') <= 0.49){

						$ledger_head_data = array(
							'group_id_fk' => 38,
							'ledger_head' => 'Purchase',
							'ledgerhead_desc' => 'Round Off Purchase',
							'opening_bal' => $this->input->post('round_off2'),
							'debit_or_credit' => 2,
							'ledgerhead_status' =>1,
							'company_id_fk' => $company,
							'purchase_fk_id' => $this->input->post('invoice_number'),
							'ledger_default' => 0,
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s'),
						);
						$result34 = $this->General_model->add('tbl_ledgerhead',$ledger_head_data);	
					
				}
				//If round of value greater than and equal to 50 paise enter to ledger head as roundoff value in debit
				else if($this->input->post('round_off2') > 0.49 && $this->input->post('round_off2') <=1)
				{
					
					//$differnce = $round_off_variable - $this->input->post('round_off_diff');
					$ledger_head_data = array(
						'group_id_fk' => 38,
						'ledger_head' => 'Purchase',
						'ledgerhead_desc' => 'Round Off Purchase',
						'opening_bal' => $this->input->post('round_off2'),
						'debit_or_credit' => 1,
						'ledgerhead_status' =>1,
						'company_id_fk' => $company,
						'purchase_fk_id' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result34 = $this->General_model->add('tbl_ledgerhead',$ledger_head_data);	
				}

				if($this->input->post('frieght') != ""){
					$freight_data = array(
						'group_id_fk' => 39,
						'ledger_head' => 'Freight',
						'ledgerhead_desc' => 'Freight',
						'opening_bal' => $this->input->post('frieght'),
						'debit_or_credit' => 2,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$freight_data); 	
				}
				if($this->input->post('bill_discount') != ""){
					$bill_data = array(
						'group_id_fk' => 41,
						'ledger_head' => 'Discount',
						'ledgerhead_desc' => 'Discount',
						'opening_bal' => $this->input->post('bill_discount'),
						'debit_or_credit' => 1,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$bill_data); 
				}
				if($this->input->post('pack_chrg') != ""){
					$packing_data = array(
						'group_id_fk' => 43,
						'ledger_head' => 'Package Charge',
						'ledgerhead_desc' => 'Package Charge',
						'opening_bal' => $this->input->post('pack_chrg'),
						'debit_or_credit' => 2,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$packing_data); 
				}
	
				if($this->input->post('tax_sum') != ""){
					$tax_data = array(
						'group_id_fk' => 40,
						'ledger_head' => 'Tax Amount',
						'ledgerhead_desc' => 'Tax Amount',
						'opening_bal' => $this->input->post('tax_sum'),
						'debit_or_credit' => 2,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$tax_data); 
				}
	
				if($this->input->post('cash') != "" && $this->input->post('cash') != 0){
					$cash_data = array(
						'group_id_fk' => 13,
						'ledger_head' => 'Cash',
						'ledgerhead_desc' => 'Cash',
						'opening_bal' => $this->input->post('cash'),
						'debit_or_credit' => 2,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$cash_data); 
				}
	
				if($this->input->post('bank') != "" && $this->input->post('bank') != 0){
					$bank_data = array(
						'group_id_fk' => 12,
						'ledger_head' => 'Cash',
						'ledgerhead_desc' => 'Cash',
						'opening_bal' => $this->input->post('bank'),
						'debit_or_credit' => 2,
						'ledgerhead_status' => 1,
						'company_id_fk' => $company,
						'sale_id_fk' => $this->input->post('invoice_number'),
						'ledger_default' => 0,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s'),
					);
					$result45 = $this->General_model->add('tbl_ledgerhead',$bank_data); 
				}

				if($draft == 3)
				{
					$inv_ide = $this->input->post('invoice_number');
					redirect(base_url()."PurchaseInvoiceList/".$inv_ide);

				}
			}
			else
			{
				$pur_table_id = $this->input->post('pur_table_id');
				$total_pay_id = $this->input->post('total_payments_id');
				if($draft == 2
				){
					$j=1;
				for ($i=0; $i < $counter; $i++) 
				{ 
					//new changes to delete exesting table
					$returns = $this->General_model->delete('tbl_purchase','purchase_id',$pur_table_id[$i]);
					$data=array(
					  'product_id_fk' =>$product_id[$i],
					  'supp_id' =>$supp_id,
					  'cmp_id' =>$cmp_id,
					  'finyear' => $fyr,
					  'price_category'=>$this->input->post('optradio'),
					  'invoice_number' =>$this->input->post('invoice_number'),
					  'reference_bill_id'=>$this->input->post('ref_bill_id'),
					  'purchase_quantity' =>$purchase_quantity[$i],
					  'purchase_price' =>$purchase_price[$i],
					  'discount_price' =>$discount_price[$i],
					  'discount_type' =>$this->input->post('disradio_'.$j.''),
					  'total_price' =>$total_price[$i],
					  'purchase_date' =>$purchase_date,
					  'stockstatus' =>0,
					  'purchase_status' =>2 //draft
					);
					//$result = $this->General_model->update('tbl_purchase',$data,'purchase_id',$pur_table_id[$i]);
					$result = $this->General_model->add('tbl_purchase',$data);
					//$insert_id = $this->db->insert_id();
				$j++;	
				}
				$returns = $this->General_model->delete('tbl_purchasepayments','purchase_payment_id',$total_pay_id);
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
	  					'net_balance'=>$this->input->post('net_bal'),
	  					'payment_status'=>1 
	  					);
				//$result = $this->General_model->update('tbl_purchasepayments',$datap,'purchase_payment_id',$total_pay_id);
				$result = $this->General_model->add('tbl_purchasepayments',$datap);
				$response_text = 'Draft added successfully';
				}
				else{
				$j=1;
				for ($i=0; $i < $counter; $i++) 
				{ 
					$data=array(
					  'product_id_fk' =>$product_id[$i],
					  'supp_id' =>$supp_id,
					  'cmp_id' =>$cmp_id,
					  'finyear' => $fyr,
					  'price_category'=>$this->input->post('optradio'),
					  'invoice_number' =>$this->input->post('invoice_number'),
					  'reference_bill_id'=>$this->input->post('ref_bill_id'),
					  'purchase_quantity' =>$purchase_quantity[$i],
					  'purchase_price' =>$purchase_price[$i],
					  'discount_price' =>$discount_price[$i],
					  'discount_type' =>$this->input->post('disradio_'.$j.''),
					  'total_price' =>$total_price[$i],
					  'purchase_date' =>$purchase_date,
					  'stockstatus' =>0,
					  'purchase_status' =>2 //draft
					);
					$result = $this->General_model->add('tbl_purchase',$data);
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
	  					'net_balance'=>$this->input->post('net_bal'),
	  					'payment_status'=>1 
	  					);
				$result = $this->General_model->add('tbl_purchasepayments',$datap);
				$response_text = 'Draft added successfully';
					}
				
			}
			
			if($result)
			{
				if (isset($invc_no)) 
				{	
	        		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;Purchase Details Updated successfully&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
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
			redirect('/Purchase/', 'refresh');
		}	
	}

	public function PurchaseInvoiceList($invoice)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['supplier'] = $this->General_model->getSuppliers();
		$template['pcategory'] = $this->General_model->getPriceCategories();
		$template['itemlist'] = $this->General_model->getItemlist();
		$template['banklist'] = $this->General_model->getBankListTable();
		$template['unit'] = $this->General_model->get_all('tbl_unit');
		$template['records'] = $this->Inventory_model->getPurchaseReportInvoice($invoice);
		$template['records2'] = $this->Inventory_model->getPurchaseReportInvoice2($invoice);
		//var_dump($template['unit']);die();
		$template['body'] = 'Inventory/Purchase/invoice';
		$template['script'] = 'Inventory/Purchase/script';
		$this->load->view('template', $template);
	}
	public function checkInvoice()
	{
		$records = $this->Inventory_model->checkInvoiceUsed($this->input->post('invoice_number'));
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function deletePurchase()
	{
		$invoice = $this->input->post('invoice');
		
		$records = $this->Inventory_model->get_invc($invoice);
		$amt = $this->Inventory_model->getOldbalance($records[0]->supp_id);
		$net_total = $this->Inventory_model->getNet($invoice);
		$balance = $amt - $net_total;
		$upData = array('supplier_oldbal' => $balance);
		$stk = $this->General_model->update('tbl_supplier',$upData,'supplier_id',$records[0]->supp_id);

        $updateData = array('purchase_status' => 0);
        $data = $this->General_model->update('tbl_purchase',$updateData,'invoice_number',$invoice);

		$update = array('payment_status' => 0);
		$data = $this->General_model->update('tbl_purchasepayments',$update,'invoice_number',$invoice);
		
		$update_data_ledger = array('ledgerhead_status' => 0);
		$ledger = $this->General_model->update('tbl_ledgerhead',$update_data_ledger,'purchase_fk_id',$invoice);

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
	public function getSuppDetails()
	{
		$records = $this->Inventory_model->getSuppliersData($this->input->post('supp_id'));
		$data_json = json_encode($records);
        echo $data_json;
	}
	public function getItemlist()
	{
		$cmp_id = $this->input->post('cmp_id');
		if ($cmp_id) 
		{
			$result = $this->General_model->getItemlists($cmp_id);
		}
		else
		{
			$result = $this->General_model->getItemlist();
		}	
		$json_data = json_encode($result);
    	echo $json_data;
	}
	public function getTaxlist()
	{
		$result = $this->General_model->getTaxlist();
		$json_data = json_encode($result);
    	echo $json_data;
	}
	public function getPrice()
	{
		$data=$this->General_model->getPriceAmount($this->input->post('product_id'),$this->input->post('cat'));
		echo json_encode($data);
	}
	public function getPriceName()
	{
		$data=$this->General_model->getPriceAmounts($this->input->post('product_code'),$this->input->post('cat'));
		echo json_encode($data);
	}
	public function getSupplierbyCompany()
	{
		header('Content-Type: application/x-json; charset=utf-8');
		$data = $this->General_model->getSupplierbyCompanyid($this->input->post('cmp_id'));
		echo json_encode($data);
	}
	public function stockUpdate()
	{
		$invoice = $this->input->post('invoice');
		$records = $this->Inventory_model->get_invc($invoice);
		for($i=0;$i<count($records);$i++)
		{
			$stok[$i] = $this->Inventory_model->get_stk($records[$i]->product_id_fk);
            $nwstk = $stok[$i][0]->stock + $records[$i]->purchase_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$records[$i]->product_id_fk);
		}
		$upData = array('stockstatus' =>1);
		$stk = $this->General_model->update('tbl_purchase',$upData,'invoice_number',$invoice);					
 		if($stk) {
             $response['text'] = 'Updated successfully';
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
	public function PurchaseEdit($invoice)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['supplier'] = $this->General_model->getSuppliers();
		$template['pcategory'] = $this->General_model->getPriceCategories();
		$template['itemlist'] = $this->General_model->getItemlist();
		$template['banklist'] = $this->General_model->getBankListTable();
		$template['records'] = $this->Inventory_model->getPurchaseReportInvoice($invoice);
		// $template['codes'] = $this->General_model->getCodes();
		// var_dump($template['records']);die();
		$template['body'] = 'Inventory/Purchase/edit';
		$template['script'] = 'Inventory/Purchase/editscript';
		$this->load->view('template', $template);
	}

	//stock
	public function Stock()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['supplier'] = $this->General_model->getSuppliers();
		$template['mainCategory'] = $this->General_model->getMainCategorylist();
		$template['body'] = 'Inventory/Stock/list';
		$template['script'] = 'Inventory/Stock/script';
		$this->load->view('template', $template);
	}
	public function getStockdetails()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'100'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        $param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        if ($this->session->userdata['user_type'] =='C')
		{
			$company =  $this->session->userdata['cmp_id'];
			$param['company'] =$company;
		}
		$param['supplier'] = (isset($_REQUEST['supplier']))?$_REQUEST['supplier']:'';
		$param['maincategory'] = (isset($_REQUEST['maincategory']))?$_REQUEST['maincategory']:'';
		$param['subcategory'] = (isset($_REQUEST['subcategory']))?$_REQUEST['subcategory']:'';
		$data = $this->Inventory_model->getStockReport($param);
		for($i=0;$i<count($data['data']);$i++)
        { 
        	$stock_sum = $data['data'][$i]->opening_stock + $data['data'][$i]->stock_qty;
        	if ($stock_sum == 0) 
        	{
        		$data['data'][$i]->overall_status = "Out of Stock";
        	}
        	else if ($stock_sum > 0 && $stock_sum <= $data['data'][$i]->min_stock) 
        	{
        		$data['data'][$i]->overall_status = "Reached Below";
        	}
        	else
        	{
        		$data['data'][$i]->overall_status = "Available";
        	}
        	$data['data'][$i]->stock_sum = $stock_sum;	
        }
		$json_data = json_encode($data);
    	echo $json_data;
	}

	public function StockUpdateList($product_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
		}
		$template['stocks'] = $this->Inventory_model->UpdateStockList($product_id);
		//var_dump($template['stocks']);die();
		$template['total_stock'] = $template['stocks'][0]->opening_stock + $template['stocks'][0]->stock_qty;
		$template['body'] = 'Inventory/Stock/edit';
		$template['script'] = 'Inventory/Stock/script';
		$this->load->view('template', $template);
		

	}
	
	public function StockUpdateEdit()
	{
		$product_id = $this->input->post('product_ide');
			if($product_id)
			{
				
				if($remarks = $this->input->post('remarks') != ""){
					$remarks = $this->input->post('remarks');
				}
				else
				{
					$remarks = "";
				}
				$avail_stock = $this->input->post('avail_stock');
				$damaged_stock = $this->input->post('damaged_stock');
				if($this->input->post('damaged_stock') != ""){
					$damage = $avail_stock - $damaged_stock;
				}
				$data = array(
					'stock' => $damage,
					'damaged_stock' => $damaged_stock,
					'remark' => $remarks,
				);

				$result = $this->General_model->update('tbl_stock',$data,'item_id',$product_id);
			}

			if($result)
			{
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;Stock Details Updated successfully&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else
			{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}

			redirect('/Stock/', 'refresh');
	}

}