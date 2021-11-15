<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administration extends MY_Controller {
	public $customer  = 'tbl_customer';
	public $suppliers = 'tbl_supplier';
	public $tax = 'tbl_taxdetails';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');

        }

        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');

	}
	public function index()
	{

	}

	//customers
	public function customers()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}

		$template['body'] = 'Administration/Customer/list';
		$template['script'] = 'Administration/Customer/script';
		$this->load->view('template', $template);
	}
	public function Customerget()
	{
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Administration_model->getCustomerTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addCustomer()
	{
		$this->form_validation->set_rules('cust_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['category']=$this->General_model->getPriceCategories();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Administration/Customer/add';
			$template['script'] = 'Administration/Customer/script';
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
			if($this->input->post('radio_val') == '0'){
				// ledgerhead debit value is 1
				$ledger_head_status = 1;
			}
			else if($this->input->post('radio_val') == '1'){
				// ledgerhead debit value is 2
				$ledger_head_status = 2;
			}
			$datas = array(
						// 'customer_type'=>$this->input->post('optradio'),
						'custname' => $this->input->post('cust_name'),
						'company_id' => $company,
						'custaddress' => $this->input->post('cust_address'),
						'custphone' => $this->input->post('cust_phone'),
						'custemail' => $this->input->post('cust_email'),
						'old_balance'=>$this->input->post('old_balance'),
						'cust_pcategory'=>$this->input->post('category'),
						'custstatus' => 1,
						'debit_credit'	=>$this->input->post('radio_val'),
						);

			$data2 = array(
				'group_id_fk'	=> 15,
				'ledger_head' =>$this->input->post('cust_name'),
				'ledgerhead_desc' => 'Customer',
				'opening_bal'	=> $this->input->post('old_balance'),
				'debit_or_credit' => $ledger_head_status,
				'ledgerhead_status'	=> 1,
				'company_id_fk'	=>	$company,
			);
			$data3 =array(
				'ledger_head' =>$this->input->post('cust_name'),
				'opening_bal'	=> $this->input->post('old_balance'),
				'debit_or_credit' => $ledger_head_status,
				'company_id_fk'	=>	$company,
			);

			$cust_id = $this->input->post('cust_id');
			if($cust_id){

				$data['cust_id'] = $cust_id;
				//get name of customer from customer table to pass and change data in ledger head
				$cust_name = $this->General_model->get_data('tbl_customer','cust_id','custname',$cust_id);
				$result = $this->General_model->update($this->customer,$datas,'cust_id',$cust_id);
				//in leger head customer name is used to find ledger entry and toupdate that field
				//data3 is used because data2 array is mostly static and changes made in ledger head would be changes if data2 array put
				$result2 = $this->General_model->update('tbl_ledgerhead',$data3,'ledger_head',$cust_name[0]->custname);
				$response_text = 'Customer details updated';
			}
			else{
				$result = $this->General_model->add($this->customer,$datas);
				$result2 = $this->General_model->add('tbl_ledgerhead',$data2);
				$response_text = 'Customer details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Customer/', 'refresh');
		}
	}
	public function Customeredit($cust_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->General_model->get_row($this->customer,'cust_id',$cust_id);
    	$template['category']=$this->General_model->getPriceCategories();
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Administration/Customer/add';
		$template['script'] = 'Administration/Customer/script';
		$this->load->view('template', $template);
	}
	public function Customerdelete()
	{
		$cust_id = $this->input->post('cust_id');
        $updateData = array('custstatus' => 0);
		$updateData2 = array('ledgerhead_status' => 0);
		//get name of customer from customer table to pass and delete data in ledger head
		$cust_name = $this->General_model->get_data('tbl_customer','cust_id','custname',$cust_id);
        $data = $this->General_model->update($this->customer,$updateData,'cust_id',$cust_id);
		//this function updates values of ledgerhead table to correspondind customer name to 0
		$data2 = $this->General_model->update('tbl_ledgerhead',$updateData2,'ledger_head',$cust_name[0]->custname);
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
        redirect('/Customer/', 'refresh');
	}

	//suppliers
	public function Supplier()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Supplier/list';
		$template['script'] = 'Administration/Supplier/script';
		$this->load->view('template', $template);
	}
	public function addSupplier()
	{

		$this->form_validation->set_rules('supplier_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['category']=$this->General_model->getPriceCategories();
			$template['body'] = 'Administration/Supplier/add';
			$template['script'] = 'Administration/Supplier/script';
			$this->load->view('template', $template);
		}
		else {
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}

			if($this->input->post('supplier_act_status') != NULL){
				$suppelier_active_status = $this->input->post('supplier_act_status');
			}
			else{
				$suppelier_active_status = 0;
			}

			if($this->input->post('supplier_type') == '0'){
				//debit is 1 in ledger head
				$suppelier_types = 1;
			}
			else if($this->input->post('supplier_type') == '1'){
				//credit is 2 in ledger head
				$suppelier_types = 2;
			}

			$data = array(
						'supplier_name' => $this->input->post('supplier_name'),
						'supplier_address' => $this->input->post('supplier_address'),
						'supplier_phone' => $this->input->post('supplier_phone'),
						'supplier_email' => $this->input->post('supplier_email'),
						'supplier_oldbal' => $this->input->post('supplier_oldbal'),
						// 'supplier_type' => $this->input->post('optradio'),
						'company_id' =>$company,
						'supplier_pcategory' =>$this->input->post('category'),
						'supplier_status' => 1,
						'supplier_type'	=>$this->input->post('supplier_type'),
						'supplier_act_status' =>$suppelier_active_status,
						);

			$data2 = array(
				'group_id_fk'	=>	21,
				'ledger_head'	=>	$this->input->post('supplier_name'),
				'ledgerhead_desc'	=>	'Supplier',
				'opening_bal'	=>	$this->input->post('supplier_oldbal'),
				'debit_or_credit'	=> $suppelier_types,
				'ledgerhead_status'	=> 1,
				'company_id_fk'	=>	$company,
			);

			$data3	=	array(
				'ledger_head'	=>	$this->input->post('supplier_name'),
				'debit_or_credit'	=> $suppelier_types,
				'company_id_fk'	=>	$company,

			);
			$supplier_id = $this->input->post('supplier_id');
			if($supplier_id){

				 $data['supplier_id'] = $supplier_id;
				 //Here retrive the row coressponding to supplier id
				 $supplier_name2 = $this->General_model->get_data('tbl_supplier','supplier_id','supplier_name',$supplier_id);
				 $result = $this->General_model->update($this->suppliers,$data,'supplier_id',$supplier_id);
				 //pass the supplier name and update ledger head
				 $result2 = $this->General_model->update('tbl_ledgerhead',$data3,'ledger_head',$supplier_name2[0]->supplier_name);
				 $response_text = 'Supplier details  updated';
			}
			else{
				$result = $this->General_model->add($this->suppliers,$data);
				$result2 = $this->General_model->add('tbl_ledgerhead',$data2);
				$response_text = 'Supplier details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Supplier/', 'refresh');
		}
	}
	public function getSupplier()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Administration_model->getSupplierTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editSupplier($supp_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->General_model->get_row($this->suppliers,'supplier_id',$supp_id);
    	$template['category']=$this->General_model->getPriceCategories();
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Administration/Supplier/add';
		$template['script'] = 'Administration/Supplier/script';
		$this->load->view('template', $template);
	}
	public function deleteSupplier()
	{
		$supplier_id = $this->input->post('supplier_id');
        $updateData = array('supplier_status' => 0);
		$updateData2 = array('ledgerhead_status' => 0);
		$supplier_name2 = $this->General_model->get_data('tbl_supplier','supplier_id','supplier_name',$supplier_id);
        $data = $this->General_model->update($this->suppliers,$updateData,'supplier_id',$supplier_id);
		$data2 = $this->General_model->update('tbl_ledgerhead',$updateData2,'ledger_head',$supplier_name2[0]->supplier_name);
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

	//TAX
	public function Tax()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Tax/list';
		$template['script'] = 'Administration/Tax/script';
		$this->load->view('template', $template);
	}
	public function getTaxdetails()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Administration_model->getTaxTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addTax()
	{
		$this->form_validation->set_rules('taxname', 'Tax Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Administration/Tax/add';
			$template['script'] = 'Administration/Tax/script';
			$this->load->view('template', $template);
		}
		else {
			$tax_id = $this->input->post('tax_id');

			$data = array(
						'taxname'=> $this->input->post('taxname'),
						'taxamount' => $this->input->post('taxamount'),
						'taxdetails' => $this->input->post('taxdetails'),
						'tax_status' => 1
						);
			if($tax_id){

				 $data['tax_id'] = $tax_id;
				 $result = $this->General_model->update($this->tax,$data,'tax_id',$tax_id);
				 $response_text = 'Tax Details updated';
			}
			else{
				$result = $this->General_model->add($this->tax,$data);
				$response_text = 'Tax Details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Tax/', 'refresh');
		}
	}
	public function deleteTaxdetails()
	{
		$tax_id = $this->input->post('tax_id');
        $updateData = array('tax_status' => 0);
        $data = $this->General_model->update($this->tax,$updateData,'tax_id',$tax_id);
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
	public function editTaxdetails($tax_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->General_model->get_row($this->tax,'tax_id',$tax_id);
		$template['body'] = 'Administration/Tax/add';
		$template['script'] = 'Administration/Tax/script';
		$this->load->view('template', $template);
	}

	//area
	public function Area()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Area/list';
		$template['script'] = 'Administration/Area/script';
		$this->load->view('template', $template);
	}
	public function getArea()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Administration_model->getAreaTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addArea()
	{
		$this->form_validation->set_rules('area_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Administration/Area/add';
			$template['script'] = 'Administration/Area/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(
						'area_name' => $this->input->post('area_name'),
						'area_description' => $this->input->post('area_description'),
						'area_status' => 1
						);
						$area_id = $this->input->post('area_id');
				if($area_id)
				{
                     $result = $this->General_model->update('tbl_area',$data,'area_id',$area_id);
                     $response_text = 'Area  updated successfully';
                }
				else
				{
                     $result = $this->General_model->add('tbl_area',$data);
                     $response_text = 'Area added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Area/', 'refresh');
		}
	}
	public function editArea($area_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Area/add';
		$template['script'] = 'Administration/Area/script';
		$template['records'] = $this->General_model->get_row('tbl_area','area_id',$area_id);
    	$this->load->view('template', $template);
	}
	public function deleteArea()
	{
		$area_id = $this->input->post('area_id');
        $updateData = array('area_status' => 0);
        $data = $this->General_model->update('tbl_area',$updateData,'area_id',$area_id);
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

	//bank
	public function Bank()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Bank/list';
		$template['script'] = 'Administration/Bank/script';
		$this->load->view('template', $template);
	}
	public function getBank()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Administration_model->getBankTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addBank()
	{
		$this->form_validation->set_rules('bank_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
            $template['body'] = 'Administration/Bank/add';
			$template['script'] = 'Administration/Bank/script';
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
			$datas = array(
						'bank_cmp' => $company,
						'bank_name' => $this->input->post('bank_name'),
						'bank_accno' => $this->input->post('acc_no'),
						'bank_branch' => $this->input->post('bank_branch'),
						'bank_ifsc' => $this->input->post('bank_ifsc'),
						'bank_debit_credit' => $this->input->post('bank_type'),
						'bank_status' => 1,
						'old_balance' => $this->input->post('opening_bal'),

						);
			if($this->input->post('bank_type') == 0)
				{
					//debit
					$debit_credit=1;
				}
			else if($this->input->post('bank_type') == 1)
				{
					//credit
					$debit_credit=2;
				}			
			$data2 = array(
						'group_id_fk' => 12,
						'ledger_head' => $this->input->post('bank_name'),
						'ledgerhead_desc'=>'Bank',
						'opening_bal'=> $this->input->post('opening_bal'),
						'debit_or_credit'=>$debit_credit,
						'ledgerhead_status'=>1,
						'company_id_fk'=>$company			
			);
			$data3 = array(
						'ledger_head' => $this->input->post('bank_name'),
						'debit_or_credit'=>$debit_credit,
						'company_id_fk'=>$company,
						'opening_bal'=> $this->input->post('opening_bal'),
			);			
			$bank_id = $this->input->post('bank_id');
			if($bank_id){

				$data['bank_id'] = $bank_id;
				//Here retrive the row coressponding to Bank id
				$bank_name2 = $this->General_model->get_data('tbl_bank','bank_id','bank_name',$bank_id);
				$result = $this->General_model->update('tbl_bank',$datas,'bank_id',$bank_id);
				 //pass the Bank name and update ledger head
				 $result2 = $this->General_model->update('tbl_ledgerhead',$data3,'ledger_head',$bank_name2[0]->bank_name);
				$response_text = 'Bank details  updated';
			}
			else{
				$result = $this->General_model->add('tbl_bank',$datas);
				$result2 = $this->General_model->add('tbl_ledgerhead',$data2);
				$response_text = 'Bank details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Bank/', 'refresh');
		}
	}
	public function deleteBank()
	{
		$bank_id = $this->input->post('bank_id');
		$bank_name2 = $this->General_model->get_data('tbl_bank','bank_id','bank_name',$bank_id);
        $updateData = array('bank_status' => 0);
		$updateData2 = array('ledgerhead_status' => 0);
        $data = $this->General_model->update('tbl_bank',$updateData,'bank_id',$bank_id);
		$data1 = $this->General_model->update('tbl_ledgerhead',$updateData2,'ledger_head',$bank_name2[0]->bank_name);
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
	public function editBank($bank_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Bank/add';
		$template['script'] = 'Administration/Bank/script';
		$template['company']=$this->General_model->getCompanies();
		$template['records'] = $this->Administration_model->getBankdetails($bank_id);
		// print_r($template['records']);die();
    	$this->load->view('template', $template);
	}
}
