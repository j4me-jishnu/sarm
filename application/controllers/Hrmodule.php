<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hrmodule extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');

        }
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
		$this->load->model('Hr_model');

	}
	public function index()
	{

	}
	public function Employee()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Hrmodule/Employee/list';
		$template['script'] = 'Hrmodule/Employee/script';
		$this->load->view('template', $template);
	}
	public function getEmployee()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

    	$data = $this->Hr_model->getCustomerTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addEmployee()
	{
		$this->form_validation->set_rules('employname', 'Name', 'required');
		// $this->form_validation->set_rules('employsalary','lang:Salary','required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Hrmodule/Employee/add';
			$template['script'] = 'Hrmodule/Employee/script';
			$this->load->view('template', $template);
		}
		else {

			if($this->input->post('act_status') != NULL){
				$act_status = $this->input->post('act_status');
			}
			else
			{
				$act_status = 0;
			}
			
				$datas = array(
					'emp_name' => $this->input->post('employname'),
					'company_id'=> $this->input->post('company'),
					'emp_address' => $this->input->post('employaddress'),
					'emp_phone' => $this->input->post('employphone'),
					'emp_email' => $this->input->post('employemail'),
					'emp_mode' => $this->input->post('salary_mode'),
					'emp_salary' => $this->input->post('employsalary'),
					'debit_or_credit' => $this->input->post('debit_or_credit'),
					'old_balance' => $this->input->post('old_balance2'),
					'emp_date' => date("Y-m-d",strtotime($this->input->post('dob'))),
					'emp_act_status' => $act_status, 
					'emp_status' => 1
					);

			

			if($this->input->post('salary_mode')==0){
				$salary_mode = 27;
			}
			else{
				$salary_mode = 29;
			}
			if($this->input->post('debit_or_credit')==0){
				$debit_credit = 1;
			}
			else{
				$debit_credit = 2;
			}
			//ledgerhead entry
			$data2 = array(
						'group_id_fk' => $salary_mode,
						'ledger_head' => $this->input->post('employname'),
						'ledgerhead_desc' => 'Employee',
						'opening_bal' => $this->input->post('old_balance2'),
						'company_id_fk' => $this->input->post('company'),
						'ledgerhead_status' => 1,
						'debit_or_credit' => $debit_credit,
			);
			$data3 = array(
				'ledger_head' => $this->input->post('employname'),
				'opening_bal' => $this->input->post('old_balance2'),
				'company_id_fk' => $this->input->post('company'),
				'debit_or_credit' => $debit_credit,
			);
			//end
			$emp_id = $this->input->post('emp_id');
			if($emp_id){
				//get name of employee to find inj ledgerhead table
				$emp_name = $this->General_model->get_data('tbl_employee','emp_id','emp_name',$emp_id);
				$data['emp_id'] = $emp_id;
				$result = $this->General_model->update('tbl_employee',$datas,'emp_id',$emp_id);

				if($this->input->post('salary_mode') == '2'){
					$emp_item = $this->input->post('pr_item');
					$emp_pc_kg = $this->input->post('pr_kg_pc');
					$emp_rates = $this->input->post('pr_rate');
					$emp_ide = $this->input->post('pr_ide');
					$count = count($this->input->post('pr_item'));
					$sort = array_map(null,$emp_item,$emp_pc_kg,$emp_rates,$emp_ide);
					foreach($sort as $sorts){
						$emp_pr = array(
		
							'emp_pr_item' => $sorts[0],
							'emp_pr_kg_pcs' => $sorts[1],
							'emp_pr_rate' => $sorts[2],
							'emp_pr_status' => 1, 
						);

						$result_emp = $this->General_model->update('tbl_emp_piece_rate',$emp_pr,'emp_pr_id',$sorts[3]);
					}
				}

				$result2 = $this->General_model->update('tbl_ledgerhead',$data3,'ledger_head',$emp_name[0]->emp_name);
				$response_text = 'Employee details updated';
			}
			else{
				$result = $this->General_model->add_returnID('tbl_employee',$datas);

				//check if employee is Peice rate
				if($this->input->post('salary_mode') == '2'){
					$emp_item = $this->input->post('pr_item');
					$emp_pc_kg = $this->input->post('pr_kg_pc');
					$emp_rates = $this->input->post('pr_rate');
					$count = count($this->input->post('pr_item'));
					//multiple entry for peice rate exist enter into 
					$sort = array_map(null,$emp_item,$emp_pc_kg,$emp_rates);
					foreach($sort as $sorts){
						$emp_pr = array(
							'emp_pr_fk' => $result,
							'emp_pr_item' => $sorts[0],
							'emp_pr_kg_pcs' => $sorts[1],
							'emp_pr_rate' => $sorts[2],
							'emp_pr_status' => 1, 
						);

						$result_emp = $this->General_model->add('tbl_emp_piece_rate',$emp_pr);
					}
				}	
				$result2 = $this->General_model->add('tbl_ledgerhead',$data2);
				$response_text = 'Employee details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Employee/', 'refresh');
		}
		}
	
	public function deleteEmployee()
	{
		
		$emp_id = $this->input->post('emp_id');
		$emp_name = $this->General_model->get_data('tbl_employee','emp_id','emp_name',$emp_id);
		$updateData2 = array('ledgerhead_status' => 0);
        $updateData = array('emp_status' => 0);
		$updateData3 = array('emp_pr_status' => 0);
        $data = $this->General_model->update('tbl_employee',$updateData,'emp_id',$emp_id);
		$data2 = $this->General_model->update('tbl_ledgerhead',$updateData2,'ledger_head',$emp_name[0]->emp_name);
		$data3 = $this->General_model->update('tbl_emp_piece_rate',$updateData3,'emp_pr_fk',$emp_id);
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
	public function editEmployee($emp_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->Hr_model->getEmployeeData($emp_id);
		$template['pr_records'] = $this->Hr_model->getPREmployeeData($emp_id);
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Hrmodule/Employee/add';
		$template['script'] = 'Hrmodule/Employee/script';
		// var_dump($template['pr_records']);die;
		$this->load->view('template', $template);
	}

	//Attendance
	public function Attendance()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Hrmodule/Attendance/list';
		$template['script'] = 'Hrmodule/Attendance/script';
		$this->load->view('template', $template);
	}
	public function getAttendence()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        $param['cmp_id'] = (isset($_REQUEST['cmp_id']))?$_REQUEST['cmp_id']:'';

		$data = $this->Hr_model->getAttendenceData($param);

		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function absent_reg()
	{
		$emp_id = $this->input->post('emp_id');
		$at_date = str_replace('/', '-', $this->input->post('att_date'));
		$at_date = date("Y-m-d",strtotime($at_date));
		$date = $at_date;
		if($this->Hr_model->check_absent($emp_id,$date) == 0){
		$at_date = str_replace('/', '-', $this->input->post('att_date'));
		$at_date = date("Y-m-d",strtotime($at_date));
		$month = date("m",strtotime($at_date));
		$data = array(
						'absent_date'=> $at_date,
						'month'=> $month,
						'emp_id'=> $emp_id,
						'absent_status'=> 1
						);
		$result = $this->General_model->add('tbl_empabsent',$data);
		$response_text = 'Absent Registered successfully';
		if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}

        echo json_encode($result);
	}
	public function attend_reg()
	{
		$emp_id = $this->input->post('emp_id');
		$at_date = str_replace('/', '-', $this->input->post('att_date'));
		$at_date = date("Y-m-d",strtotime($at_date));
		$date = $at_date;
		if($this->Hr_model->check_attendance($emp_id,$date) == 0)
		{
			$session = $this->input->post('session');
			$at_date = str_replace('/', '-', $this->input->post('att_date'));
			$at_date = date("Y-m-d",strtotime($at_date));
			$month = date("m",strtotime($at_date));
			$data = array(
						'att_date'=> $at_date,
						'month' => $month,
						'emp_id'=> $emp_id,
						'att_status'=> 1
						);
			$result = $this->General_model->add('tbl_empattendance',$data);
			$response_text = 'Attendance Registered successfully';

			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Attendence already exist,&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
        echo json_encode($result);
	}

	public function multi_attend_reg()
	{
		$emp_id = $this->input->post('id');
		$at_date = str_replace('/', '-', $this->input->post('dates'));
		$at_date = date("Y-m-d",strtotime($at_date));
		$month = date("m",strtotime($at_date));
		$date = $at_date;
		if($this->Hr_model->check_attendance($emp_id,$date) == 0)
		{
			$data = array(
						'att_date'=> $at_date,
						'month' => $month,
						'emp_id'=> $emp_id,
						'att_status'=> 1
						);
			$result = $this->General_model->add('tbl_empattendance',$data);
			$response_text = 'Attendance Registered successfully';

			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Attendence already exist,&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
        echo json_encode($result);
	}
	//PayAdvance
	public function PayAdvance()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Hrmodule/PayAdvance/list';
		$template['script'] = 'Hrmodule/PayAdvance/script';
		$this->load->view('template', $template);
	}
	public function getpayAdvance()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Hr_model->getpayAdvanceData($param);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addPayAdvance()
	{
		$salarydate = str_replace('/', '-', $this->input->post('payroll_salarydate'));
		$salarydate = date("Y-m-d",strtotime($salarydate));

		$this->form_validation->set_rules('emp', 'Date', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Hrmodule/PayAdvance/add';
			$template['script'] = 'Hrmodule/PayAdvance/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(

						'emp_id'=> $this->input->post('emp'),
						'company_id'=>$this->input->post('company'),
						'adv_month'=> $this->input->post('payroll_salmonth'),
						'adv_amount'=>$this->input->post('payroll_ta'),
						'adv_date'=> $salarydate,
						'adv_status'=> 1
						);
			$adv_id = $this->input->post('adv_id');
			if ($adv_id)
			{
				$data['adv_id'] = $adv_id;
				$result = $this->General_model->update('tbl_advance',$data,'adv_id',$adv_id);
				$response_text = 'Advance Payment details  updated';
			}
			else
			{
	             $result = $this->General_model->add('tbl_advance',$data);
				 $response_text = 'Advance Payment Details added successfully';

				if($data){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
			}
			redirect('/PayAdvance/', 'refresh');
		}
	}
	public function getEmployeesbyCompany()
	{
		$data=$this->Hr_model->fetchEmployeesbycompany($this->input->post('cmp_id'));
        echo json_encode($data);
	}
	public function getBasicofEmployee()
	{
		$data=$this->Hr_model->getBasicofEmployee($this->input->post('emp_id'));
        echo json_encode($data);
	}
	public function getSalaryMode()
	{
		$data=$this->Hr_model->getSalaryMode($this->input->post('emp_id'));
        echo json_encode($data);
	}
	public function editPayAdvance($id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records']=$this->Hr_model->fetchAdvancepay($id);
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Hrmodule/PayAdvance/edit';
		$template['script'] = 'Hrmodule/PayAdvance/script';
		$this->load->view('template', $template);
	}

	//Payroll
	public function Payroll()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Hrmodule/Payroll/list';
		$template['script'] = 'Hrmodule/Payroll/script';
		$this->load->view('template', $template);
	}
	public function getPayroll()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Hr_model->getPayrollDetails($param);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addPayroll()
	{
		$salarydate = str_replace('/', '-', $this->input->post('payroll_salarydate'));
		$salarydate = date("Y-m-d",strtotime($salarydate));
		$this->form_validation->set_rules('emp', 'Date', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Hrmodule/Payroll/add';
			$template['script'] = 'Hrmodule/Payroll/script';
			$this->load->view('template', $template);
		}
		else
		{
			$data = array(
						'company_id'=>$this->input->post('company'),
						'payroll_emp_id'=> $this->input->post('emp'),
						// 'payroll_salmonth'=> $this->input->post('payroll_salmonth'),
						'payroll_basicsalary'=> $this->input->post('payroll_basicpay'),
						// 'payroll_ta'=> $this->input->post('payroll_ta'),
						// 'payroll_incentive'=> $this->input->post('payroll_incentive'),
						'payroll_advance'=>$this->input->post('payroll_balance'),
						'payroll_leaveamt'=> $this->input->post('payroll_leaveamt'),
						'payroll_salary'=> $this->input->post('payroll_salary'),
						// 'payroll_expence'=> $this->input->post('payroll_expence'),
						'payroll_salarydate'=> $salarydate,
						'payroll_salmonth'=>$this->input->post('payroll_salmonth'),
						'payroll_status'=> 1
						);

            $result = $this->General_model->add('tbl_payroll',$data);
			$response_text = 'Payroll Details added successfully';

			if($data){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Payroll/', 'refresh');
		}
	}
	public function getAdvanceofEmployee()
	{
		$data=$this->Hr_model->getadvanceofEmployee($this->input->post('emp_id'),$this->input->post('month'));
        echo json_encode($data);
	}
	public function getLeaveofEmployee()
	{
		$data=$this->Hr_model->getLeavesofEmployee($this->input->post('emp_id'),$this->input->post('month'));
        echo json_encode($data);
	}

	public function getAttendanceofEmployee()
	{
		$data=$this->Hr_model->getAttendanceofEmployee($this->input->post('emp_id'),$this->input->post('month'));
        echo json_encode($data);
	}

	public function getAllAttendanceofEmployee()
	{
		$data=$this->Hr_model->getAllAttendanceofEmployee($this->input->post('emp_id'));
        echo json_encode($data);
	}


	public function Overtime()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Hrmodule/Overtime/list';
		$template['script'] = 'Hrmodule/Overtime/script';
		$this->load->view('template', $template);
	}
	public function addOvertime()
	{
		$this->form_validation->set_rules('emp', 'Date', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Hrmodule/Overtime/add';
			$template['script'] = 'Hrmodule/Overtime/script';
			$this->load->view('template', $template);
		}
		else
		{
			$date = str_replace('/', '-', $this->input->post('date'));
			$date = date("Y-m-d",strtotime($date));
			$data = array(
				'ot_cmp_id_fk'=>$this->input->post('company'),
				'ot_emp_id_fk' =>$this->input->post('emp'),
				// 'hours' =>0,
				'ot_amount' =>$this->input->post('amount'),
				'ot_date' =>$date,
				'ot_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
			);
			$ot_id = $this->input->post('ot_id');
			if ($ot_id)
			{
				$result = $this->General_model->update('tbl_overtime',$data,'ot_id',$ot_id);
				$response_text = 'Overtime details  updated';
			}
			else
			{
				$result = $this->General_model->add('tbl_overtime',$data);
				$response_text = 'Overtime Details added successfully';
			}
			if($response_text){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Overtime/', 'refresh');
		}
	}
	public function getOvertime()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Hr_model->getOvertimeDetails($param);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editOvertime($id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','ot_cmp_id_fk',$id);
			}
		$template['records'] = $this->Hr_model->getOvertimeDetailss($id);
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Hrmodule/Overtime/edit';
		$template['script'] = 'Hrmodule/Overtime/script';
		$this->load->view('template', $template);
	}
	public function deleteOvertime()
	{
		$ot_id = $this->input->post('ot_id');
        $updateData = array('ot_status' => 0);
        $data = $this->General_model->update('tbl_overtime',$updateData,'ot_id',$ot_id);
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
	public function getOvertimeofEmployee()
	{
		$data=$this->Hr_model->getOvertimeofEmployee($this->input->post('emp_id'),$this->input->post('month'));
        echo json_encode($data);
	}


	public function PieceRateEmployee()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Hrmodule/PieceEmployee/list';
		$template['script'] = 'Hrmodule/PieceEmployee/script';
		$this->load->view('template', $template);
	}

	public function getPieceEmployee()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$data = $this->Hr_model->getPieceEmployee($param);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function addPieceEmployee()
	{
		$this->form_validation->set_rules('employ_pr_name', 'Name', 'required');
		$this->form_validation->set_rules('employ_pr_rate','Piece Rate','required');
		if ($this->form_validation->run() == FALSE)
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Hrmodule/PieceEmployee/add';
			$template['script'] = 'Hrmodule/PieceEmployee/script';
			$this->load->view('template', $template);
		}
		else {

			if($this->input->post('emp_pr_act_status') != NULL){
				$emp_pr_act_status = $this->input->post('emp_pr_act_status');
			}
			else
			{
				$emp_pr_act_status = 0;
			}

			$datas = array(
						'emp_pr_name' => $this->input->post('employ_pr_name'),
						'emp_pr_cmp_id'=> $this->input->post('company_pr_id'),
						'emp_pr_address' => $this->input->post('employ_pr_address'),
						'emp_pr_phone' => $this->input->post('employ_pr_phone'),
						'emp_pr_email' => $this->input->post('employ_pr_email'),
						'emp_pr_material_ty' => $this->input->post('employ_pr_remark'),
						'emp_pr_piece_rate' => $this->input->post('employ_pr_rate'),
						'emp_pr_old_bal' => $this->input->post('old_pr_balance2'),
						'emp_pr_act_status' => $emp_pr_act_status,
						'emp_pr_status' => 1
						);

			$emp_pr_id = $this->input->post('emp_pr_id');
			if($emp_pr_id){
				$result = $this->General_model->update('tbl_emp_piece_rate',$datas,'emp_pr_id ',$emp_pr_id);
				$response_text = 'Employee Piece Rate details updated';
			}
			else{
				$result = $this->General_model->add('tbl_emp_piece_rate',$datas);
				$response_text = 'Employee Piece Rate details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/PieceRateEmployee/', 'refresh');
		}
	}

	public function editPieceRateEmployee($id=2)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','ot_cmp_id_fk',$id);
			}
		$template['records'] = $this->Hr_model->getPieceEmployees($id);
		// var_dump($template['records']);die;
		$template['company']=$this->General_model->getCompanies();
		$template['body'] = 'Hrmodule/PieceEmployee/add';
		$template['script'] = 'Hrmodule/PieceEmployee/script';
		$this->load->view('template', $template);
	}

	public function deletePeiceRateEmployee()
	{
		$emp_pr_id = $this->input->post('emp_pr_id');
        $updateData = array('emp_pr_status' => 0);
        $data = $this->General_model->update('tbl_emp_piece_rate',$updateData,'emp_pr_id',$emp_pr_id);
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
