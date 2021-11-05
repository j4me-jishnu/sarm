<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {
	public $page  = 'Expensereport';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
		$this->load->model('Reports_model');
        
	}
	public function payrollReport()
	{
		$template['body'] = 'Reports/Payroll/list';
		$template['script'] = 'Reports/Payroll/script';
		$this->load->view('template', $template);
	}
	public function getPayrollReport(){
		
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$cust_name =(isset($_REQUEST['cust_name']))?$_REQUEST['cust_name']:'';
		$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        $end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
	
		if($start_date){
            $start_date = str_replace('/', '-', $start_date);
            $param['start_date'] =  date("Y-m-d",strtotime($start_date));
        }
       
        if($end_date){
            $end_date = str_replace('/', '-', $end_date);
            $param['end_date'] =  date("Y-m-d",strtotime($end_date));
        }
        $data = $this->Reports_model->getPayrollrepo($param);
      
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	}
	?>