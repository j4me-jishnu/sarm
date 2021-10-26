<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounts extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');

        }
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
		$this->load->model('Accounts_model');
		$this->load->model('Accountsreports_model');

	}

	public function Voucherhead()
	{
		if($this->session->userdata('user_type')=='C'){
		$id = $this->session->userdata('id');
		$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
		}
		$template['body'] = 'Accounts/Voucherhead/list';
		$template['script'] = 'Accounts/Voucherhead/script';
		$this->load->view('template', $template);
	}
	public function addVoucherhead()
	{
		$this->form_validation->set_rules('vouch_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Accounts/Voucherhead/add';
			$template['script'] = 'Accounts/Voucherhead/script';
			$this->load->view('template', $template);
		}
		else {
			$vouch_id = $this->input->post('vouch_id');


			$data = array(
						'vouch_head' =>strtoupper($this->input->post('vouch_head')),
						'vouch_desc' =>strtoupper($this->input->post('vouch_desc')),
						'vouch_status' => 1
						);
			if($vouch_id){

                 $data['vouch_id'] = $vouch_id;
                 $result = $this->General_model->update('tbl_vouchhead',$data,'vouch_id',$vouch_id);
                 $response_text = 'Voucher Head  updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_vouchhead',$data);
                 $response_text = 'Voucher Head added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Voucherhead/');
		}
	}
	public function getVoucherHeads()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getVoucherheadTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editVoucherhead($vouch_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->Accounts_model->getVoucherhead($vouch_id);
		$template['body'] = 'Accounts/Voucherhead/add';
		$template['script'] = 'Accounts/Voucherhead/script';
		$this->load->view('template', $template);
	}
	public function deleteVoucherHead()
	{
		$vouch_id = $this->input->post('vouch_id');
        $updateData = array('vouch_status' => 0);
        $data = $this->General_model->update('tbl_vouchhead',$updateData,'vouch_id',$vouch_id);
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


	public function Receipthead()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Receipthead/list';
		$template['script'] = 'Accounts/Receipthead/script';
		$this->load->view('template', $template);
	}
	public function addReceipthead()
	{
		$this->form_validation->set_rules('receipt_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Accounts/Receipthead/add';
			$template['script'] = 'Accounts/Receipthead/script';
			$this->load->view('template', $template);
		}
		else {
			$receipt_id = $this->input->post('receipt_id');


			$data = array(
						'receipt_head' =>strtoupper($this->input->post('receipt_head')),
						'receipt_desc' =>strtoupper($this->input->post('receipt_desc')),
						'receipt_status' => 1
						);
			if($receipt_id){

                 $result = $this->General_model->update('tbl_receipthead',$data,'receipt_id',$receipt_id);
                 $response_text = 'Receipt Head  updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_receipthead',$data);
                 $response_text = 'Receipt Head added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Receipthead/');
		}
	}
	public function getReceipthead()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getReceiptheadTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editReceipthead($receipt_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->Accounts_model->getReceipthead($receipt_id);
		$template['body'] = 'Accounts/Receipthead/add';
		$template['script'] = 'Accounts/Receipthead/script';
		$this->load->view('template', $template);
	}
	public function deleteReceipthead()
	{
		$receipt_id = $this->input->post('receipt_id');
        $updateData = array('receipt_status' => 0);
        $data = $this->General_model->update('tbl_receipthead',$updateData,'receipt_id',$receipt_id);
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


	public function Receipt()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Receipt/list';
		$template['script'] = 'Accounts/Receipt/script';
		$this->load->view('template', $template);
	}
	public function addReceipt()
	{
		$this->form_validation->set_rules('receip_id', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['receiptnames'] = $this->Accounts_model->getReceiptnames();
			$template['data']=$this->Accounts_model->getBank();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Receipt/add';
			$template['script'] = 'Accounts/Receipt/script';
			$this->load->view('template', $template);
		}
		else
		{
			$receipt_id = $this->input->post('rece_id');

			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
			$rept_date = str_replace('/', '-', $this->input->post('rept_date'));
			$rept_date = date("Y-m-d",strtotime($rept_date));
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}
			$data = array(
			           'finyear_id_fk' =>$fyr,
						'receip_id_fk' =>$this->input->post('receip_id'),
						'rept_date' =>$rept_date,
						'receipt_amount' =>$this->input->post('receipt_amount'),
						'received_to' =>$this->input->post('paid_to'),
						'narration' =>strtoupper($this->input->post('narration')),
						'receipt_status' => 1,
						'company_id_fk' => $company
						);

			if($receipt_id){
                 $result = $this->General_model->update('tbl_receipt',$data,'receipt_id',$receipt_id);
                 $response_text = 'Receipt updated successfully';
            }
			else{
			    $result =  $this->General_model->add('tbl_receipt',$data);
				$response_text = 'Receipt added  successfully';
            }
			if($response_text){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Receipt/');
		}
	}
	public function getReceipt()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Accounts_model->getRecieptTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editReceipt($receipt_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->Accounts_model->getRecieptTableby($receipt_id);
		$template['receiptnames'] = $this->Accounts_model->getReceiptnames();
		$template['data']=$this->Accounts_model->getBank();
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Accounts/Receipt/add';
		$template['script'] = 'Accounts/Receipt/script';
		$this->load->view('template', $template);
	}
	public function deleteReceipt()
	{
		$receipt_id = $this->input->post('receipt_id');
        $updateData = array('receipt_status' => 0);
        $data = $this->General_model->update('tbl_receipt',$updateData,'receipt_id',$receipt_id);

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


	public function Voucher()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Voucher/list';
		$template['script'] = 'Accounts/Voucher/script';
		$this->load->view('template', $template);
	}
	public function addVoucher()
	{
		$this->form_validation->set_rules('vouch_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['vouchnames'] = $this->Accounts_model->voucherheads();
			$template['data']=$this->Accounts_model->getBank();
			$template['body'] = 'Accounts/Voucher/add';
			$template['script'] = 'Accounts/Voucher/script';
			$this->load->view('template', $template);
		}
		else
		{
			$voucher_id = $this->input->post('vouch_id');
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

			$voucher_date = str_replace('/', '-', $this->input->post('voucher_date'));
			$voucher_date = date("Y-m-d",strtotime($voucher_date));
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}
			$data = array(
			           'finyear_id_fk' =>$fyr,
						'vouch_id_fk' =>$this->input->post('vouch_head'),
						'voucher_amount' =>$this->input->post('voucher_amount'),
						'paid_from' =>$this->input->post('paid_to'),
						'voucher_date' =>$voucher_date,
						'narration' =>strtoupper($this->input->post('narration')),
						'voucher_status' => 1,
						'company_id_fk' => $company
						);
			if($voucher_id)
			{
                 $result = $this->General_model->update('tbl_voucher',$data,'voucher_id',$voucher_id);
                 $response_text = 'Voucher updated successfully';
            }
			else
			{
			     $this->General_model->add('tbl_voucher',$data);
                 $response_text = 'Voucher added  successfully';

            }
			if($response_text){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Voucher/');
		}
	}
	public function getVoucher()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Accounts_model->getVoucherTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editVoucher($voucher_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['vouchnames'] = $this->Accounts_model->voucherheads();
		$template['data']=$this->Accounts_model->getBank();
		$template['records'] = $this->Accounts_model->getVoucherby($voucher_id);
		$template['body'] = 'Accounts/Voucher/add';
		$template['script'] = 'Accounts/Voucher/script';
    	$this->load->view('template', $template);
	}
	public function deleteVoucher()
	{
		$voucher_id = $this->input->post('voucher_id');
        $updateData = array('voucher_status' => 0);
        $data = $this->General_model->update('tbl_voucher',$updateData,'voucher_id',$voucher_id);

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

	public function Groups()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Groups/list';
		$template['script'] = 'Accounts/Groups/script';
		$this->load->view('template', $template);
	}
	public function addGroups()
	{
		$this->form_validation->set_rules('group_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['type'] = $this->Accounts_model->getTypesList();
			$template['body'] = 'Accounts/Groups/add';
			$template['script'] = 'Accounts/Groups/script';
			$this->load->view('template', $template);
		}
		else
		{
			$group_id = $this->input->post('group_id');
			$default = $this->input->post('default');
			if ($default != 1) {
				$default =0;
			}

			$data = array(
						'group_name' =>strtoupper($this->input->post('group_name')),
						'group_desc' =>strtoupper($this->input->post('group_desc')),
						'group_status' => 1,
						'type_id_fk' => $this->input->post('type'),
						'default' => $default,
						'group_parent_id'=> 0
						);
			if($group_id){

                 $result = $this->General_model->update('tbl_groups',$data,'group_id',$group_id);
                 $response_text = 'Updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_groups',$data);
                 $response_text = 'Added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Groups/');
		}
	}
	public function getGroups()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getGroupsTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editGroups($group_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['type'] = $this->Accounts_model->getTypesList();
		$template['records'] = $this->Accounts_model->getGroups($group_id);
		$template['body'] = 'Accounts/Groups/add';
		$template['script'] = 'Accounts/Groups/script';
		$this->load->view('template', $template);
	}
	public function deleteGroups()
	{
		$group_id = $this->input->post('group_id');
        $updateData = array('group_status' => 0);
        $data = $this->General_model->update('tbl_groups',$updateData,'group_id',$group_id);

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
	public function Subgroups()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Subgroups/list';
		$template['script'] = 'Accounts/Subgroups/script';
		$this->load->view('template', $template);
	}
	public function addSubgroups()
	{
		$this->form_validation->set_rules('group_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['type'] = $this->Accounts_model->getTypesList();
			$template['groups']=$this->Accounts_model->getGroupslist();
			$template['body'] = 'Accounts/Subgroups/add';
			$template['script'] = 'Accounts/Subgroups/script';
			$this->load->view('template', $template);
		}
		else
		{
			$group_id = $this->input->post('group_id');
			$default = $this->input->post('default');
			if ($default != 1) {
				$default =0;
			}

			$data = array(
						'group_name' =>strtoupper($this->input->post('group_name')),
						'group_desc' =>strtoupper($this->input->post('group_desc')),
						'group_status' => 1,
						'type_id_fk' => $this->input->post('type'),
						'default' => $default,
						'group_parent_id'=> $this->input->post('groups')
						);
			if($group_id){

                 $result = $this->General_model->update('tbl_groups',$data,'group_id',$group_id);
                 $response_text = 'Updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_groups',$data);
                 $response_text = 'Added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Subgroups/');
		}
	}
	public function getgroupslist()
	{
		$data = $this->Accounts_model->getGroupslistbyType($this->input->post('type'));
		echo json_encode($data);
	}
	public function getSubgroup()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getsubGroupsTable($param);
    	$groups=$this->Accounts_model->getGroupslist();
    	for ($i=0; $i < count($data['data']) ; $i++)
    	{
    		for ($k=0; $k < count($groups) ; $k++)
    		{
    			if($data['data'][$i]->group_parent_id == $groups[$k]->group_id)
	    		{
	    			$data['data'][$i]->main_group = $groups[$k]->group_name;
	    		}
    		}
    	}
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editsubGroups($group_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->Accounts_model->getGroups($group_id);
		$template['type'] = $this->Accounts_model->getTypesList();
		$template['groups']=$this->Accounts_model->getGroupslist();
		$template['body'] = 'Accounts/Subgroups/edit';
		$template['script'] = 'Accounts/Subgroups/script';
		$this->load->view('template', $template);
	}
	public function deleteSubgroup()
	{
		$group_id = $this->input->post('group_id');
        $updateData = array('group_status' => 0);
        $data = $this->General_model->update('tbl_groups',$updateData,'group_id',$group_id);

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


	public function Ledgerhead()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Ledgerhead/list';
		$template['script'] = 'Accounts/Ledgerhead/script';
		$this->load->view('template', $template);
	}
	public function addLedgerhead()
	{
		$this->form_validation->set_rules('ledger_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['groups']=$this->Accounts_model->getsubsGroupslist();
			$template['body'] = 'Accounts/Ledgerhead/add';
			$template['script'] = 'Accounts/Ledgerhead/script';
			$this->load->view('template', $template);
		}
		else
		{
			$ledgerhead_id = $this->input->post('ledgerhead_id');

			$data = array(
						'group_id_fk' =>$this->input->post('groups'),
						'ledger_head' =>$this->input->post('ledger_head'),
						'ledgerhead_desc' =>$this->input->post('ledgerhead_desc'),
						'ledgerhead_status' =>1,
						'opening_bal' => $this->input->post('opening_bal'),
						'debit_or_credit' => $this->input->post('optradio'),
						'company_id_fk' => $this->input->post('company')
						);
			$day= date('d') - 1;
			$monthyear=date('Y-m');
			$date=$monthyear.-$day;
			if($this->input->post('optradio') == 1)
			{
				$debit_credit=2;
			}
			else if($this->input->post('optradio') == 2)
			{
				$debit_credit=1;
			}

			if($ledgerhead_id)
			{
                 $result = $this->General_model->update('tbl_ledgerhead',$data,'ledgerhead_id',$ledgerhead_id);

                 	$array=array(
						'company_id_fk'=>$this->input->post('company'),
						'ledgerhead_id_fk'=>$ledgerhead_id,
						'date'=>$date,
						'balance'=>$this->input->post('opening_bal'),
						'debit_credit'=>$debit_credit,
						'ledgerbalance_status'=>1
					);
					$this->General_model->update('tbl_ledgerbalance',$array,'ledgerhead_id_fk',$ledgerhead_id);
                 $response_text = 'Updated successfully';
            }
			else
			{
			     $last_id=$this->General_model->add_returnID('tbl_ledgerhead',$data);
                 	$array=array(
						'company_id_fk'=>$this->input->post('company'),
						'ledgerhead_id_fk'=>$last_id,
						'date'=>$date,
						'balance'=>$this->input->post('opening_bal'),
						'debit_credit'=>$debit_credit,
						'ledgerbalance_status'=>1
					);
					$this->General_model->add('tbl_ledgerbalance',$array);
                $response_text = 'Added  successfully';

            }
			if($response_text){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Ledgerhead/');
		}
	}
	public function getLedgerhead()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getLedgerheadTable($param);
    	$groups=$this->Accounts_model->getGroupslist();
    	for ($i=0; $i < count($data['data']) ; $i++)
    	{
    		for ($k=0; $k < count($groups) ; $k++)
    		{
    			if($data['data'][$i]->group_parent_id == $groups[$k]->group_id)
	    		{
	    			$data['data'][$i]->main_group = $groups[$k]->group_name;
	    		}
    		}
    	}
    	   
    	$json_data = json_encode($data);
    	echo $json_data;
		
	}
	public function editLedgerhead($ledgerhead_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['groups']=$this->Accounts_model->getGroupslist();
		$template['records'] = $this->Accounts_model->getLedgerhead($ledgerhead_id);
		$template['body'] = 'Accounts/Ledgerhead/add';
		$template['script'] = 'Accounts/Ledgerhead/script';
		$this->load->view('template', $template);
	}
	public function deleteLedgerhead()
	{
		$ledgerhead_id = $this->input->post('ledgerhead_id');
        $updateData = array('ledgerhead_status' => 0);
        $data = $this->General_model->update('tbl_ledgerhead',$updateData,'ledgerhead_id',$ledgerhead_id);
       	$updat = array('ledgerbalance_status' => 0);
       	$data = $this->General_model->update('tbl_ledgerbalance',$updat,'ledgerhead_id_fk',$ledgerhead_id);
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

	public function Journal()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Journal/list';
		$template['script'] = 'Accounts/Journal/script';
		$this->load->view('template', $template);
	}
	public function addJournal()
	{
		$this->form_validation->set_rules('journal_date', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$res = $this->Accounts_model->getLastJournalid();

			if(isset($res->journal_inv)){$inv=$res->journal_inv;}else{
				$inv='JNL0';
			}
			list($alpha,$numeric) = sscanf($inv, "%[A-Z,-]%d");
			$s=substr($inv,6);
			$y=$s+1;
			$inv_no = str_pad($y, 4, "0", STR_PAD_LEFT);
			$template['invno'] = $alpha.$inv_no;

			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['ledgerhead']=$this->Accounts_model->getLedgerheadlist();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Journal/add';
			$template['script'] = 'Accounts/Journal/script';
			$this->load->view('template', $template);
		}
		else
		{
			$ledgerhead = $this->input->post('ledgerhead');
			$debit = $this->input->post('debit');
			$credit = $this->input->post('credit');
			$narration  = $this->input->post('narr');
			$count = count($ledgerhead);
			$unique_id = $this->input->post('unique_id');
			$journal_inv =  $this->input->post('journal_inv');

			$check_exist = $this->Accounts_model->chekExistans($journal_inv);
			if($check_exist != 0)
			{
				$res = $this->Accounts_model->UpdateJournal($journal_inv);
			}
			// if (! $unique_id)
			// {
			// 	$unique = $this->Accounts_model->getJournalUnique();
			// 	if (! $unique)
			// 	{
			// 		$unique=1;
			// 	}
			// 	else
			// 	{
			// 		$unique=$unique+1;
			// 	}
			// }
			// else
			// {
			// 	$res = $this->Accounts_model->UpdateJournal($unique_id);
			// 	if($res != 0)
			// 	{
			// 		$unique = $unique_id;
			// 	}
			// }

			$journal_date = str_replace('/', '-', $this->input->post('journal_date'));
			$journal_date =  date("Y-m-d",strtotime($journal_date));
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}


			for ($i=0; $i < $count ; $i++)
			{
				$data = array(
					'fin_year' => $fyr,
					'company_id_fk'=> $this->input->post('company'),
					'journal_date' => $journal_date,
					'note' => $this->input->post('note'),
					'ledger_head_id' => $ledgerhead[$i],
					'debit_amt' => $debit[$i],
					'credit_amt' => $credit[$i],
					'narration' => $narration[$i],
					'journal_status' => 1,
					'journal_inv' => $journal_inv
				);
				$response = $this->General_model->add('tbl_journal',$data);
                $response_text = 'Added  successfully';
			}
			for ($a=0; $a < count($ledgerhead) ; $a++)
			{
				$this->BalanceUpdate($this->input->post('company'),$ledgerhead[$a],$journal_date);
				// echo $ledgerhead[$a];die;
			}

			if ($response_text)
			{
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else
			{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('Journal');
		}
	}
	public function getLedgerHeadlist()
	{
		$result = $this->Accounts_model->getLedgerheadlist();
		echo json_encode($result);
	}
	public function getJournallist()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getJournalTable($param);

    	// for ($i=0; $i < count($data['data']); $i++)
    	// {

    	// 	$row = $this->Accounts_model->getNumsofCount($data['data']->journal_inv);
    	// 	for ($k=0; $k < count($row); $k++)
    	// 	{
    	// 		$data['data'][$i]->led =$data['data'][$i]->jout
    	// 	}
    	// }




    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editJournal($unique_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['ledgerhead']=$this->Accounts_model->getLedgerheadlist();
		$template['company']=$this->General_model->getCompanies();
		$template['records'] = $this->Accounts_model->getJournals($unique_id);
		$template['body'] = 'Accounts/Journal/edit';
		$template['script'] = 'Accounts/Journal/script';
		$this->load->view('template', $template);
	}
	public function deleteJournal()
	{
		$journal_id = $this->input->post('journal_id');
        $updateData = array('journal_status' => 0);
        $journal_inv =$this->Accounts_model->getJournalsInv($journal_id);
        $data = $this->General_model->update('tbl_journal',$updateData,'journal_inv',$journal_inv);

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


	public function Types()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Accounts/Type/list';
		$template['script'] = 'Accounts/Type/script';
		$this->load->view('template', $template);
	}
	public function getTypes()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Accounts_model->getTypesTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function BalanceUpdate($cmp,$ledgerhead,$journal_date)
	{
		$debit = $this->Accountsreports_model->getDebitSide($cmp,$ledgerhead,$journal_date);
		$credit= $this->Accountsreports_model->getCreditSide($cmp,$ledgerhead,$journal_date);
		$balance = $this->Accountsreports_model->getBalance($cmp,$ledgerhead,$journal_date,$journal_date);

		if (isset($debit) == NULL && isset($credit) == NULL)
		{
			$array=array(
						'company_id_fk'=>$cmp,
						'ledgerhead_id_fk'=>$ledgerhead,
						'date'=>$journal_date,
						'balance'=>0,
						'debit_credit'=>0,
						'ledgerbalance_status'=>1
					);
			$this->db->insert('tbl_ledgerbalance',$array);
		}
		else
		{
			$deb_count = count($debit);
            $cre_count = count($credit);
            if ($deb_count > $cre_count)
            {
              $count = $deb_count;
            }
            else if($cre_count > $deb_count)
            {
              $count = $cre_count;
            }
            else
            {
              $count = $cre_count;
            }

            if($balance)
            {
	            if($balance['debit_credit'] == 0)
		        {
		            $deb_total=0;$cred_total=0;
		        }
		        else if($balance['debit_credit'] == 2)
		        {
		          	if(isset($balance['balance']))
		          	{
		          		$deb_total=$balance['balance'];
		          		$cred_total = 0;
		          	}
		        }
		        else if($balance['debit_credit'] == 1)
		        {
		          	if(isset($balance['balance']))
		          	{
		          		$cred_total=$balance['balance'];
		          		$deb_total=0;
		          	}
		        }
		    }

            for ($i=0; $i < $count ; $i++)
            {
            	if(isset($debit[$i]['credit_amt'])){$deb_total = $deb_total + $debit[$i]['credit_amt'];}
                if(isset($credit[$i]['debit_amt'])){$cred_total = $cred_total + $credit[$i]['debit_amt'];}

                if($cred_total > $deb_total)
          		{
          			$array=array(
								'company_id_fk'=>$cmp,
								'ledgerhead_id_fk'=>$ledgerhead,
								'date'=>$journal_date,
								'balance'=>$cred_total-$deb_total,
								'debit_credit'=>1,
								'ledgerbalance_status'=>1
								);
          			$check_res= $this->Accounts_model->checkInledgerBalance($cmp,$ledgerhead,$journal_date);
          			if($check_res == 0)
          			{
          				$response = $this->General_model->add('tbl_ledgerbalance',$array);
          			}
          			else
          			{
          				$response = $this->General_model->upda('tbl_ledgerbalance',$array,'date',$journal_date,'ledgerhead_id_fk',$ledgerhead,'company_id_fk',$cmp);
          			}
          		}
          		if($deb_total > $cred_total)
          		{
          			$array=array(
								'company_id_fk'=>$cmp,
								'ledgerhead_id_fk'=>$ledgerhead,
								'date'=>$journal_date,
								'balance'=>$deb_total-$cred_total,
								'debit_credit'=>2,
								'ledgerbalance_status'=>1
								);
					$check_res= $this->Accounts_model->checkInledgerBalance($cmp,$ledgerhead,$journal_date);
          			if($check_res == 0)
          			{
          				$response = $this->General_model->add('tbl_ledgerbalance',$array);
          			}
          			else
          			{
          				$response = $this->General_model->upda('tbl_ledgerbalance',$array,'date',$journal_date,'ledgerhead_id_fk',$ledgerhead,'company_id_fk',$cmp);
          			}
          		}
            }

		}
	}
}
