<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Companyreport extends MY_Controller {

	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
		$this->load->model('Companyreport_model');
        $this->load->model('General_model');
        
	}


		public function stockReport()
	{
        if($this->session->userdata('user_type')=='C'){
            $id = $this->session->userdata('id');
            $template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
            }
		$template['body'] = 'Companyreport/Stock/list';
		$template['script'] = 'Companyreport/Stock/script';
		$this->load->view('template', $template);
	}

	public function getStockReport(){
		$param['cmp_id'] = $this->session->userdata('cmp_id');
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$param['item_name'] =(isset($_REQUEST['item_name']))?$_REQUEST['item_name']:'';
	
        $data = $this->Companyreport_model->getStockrepo($param);
      
    	$json_data = json_encode($data);
    	echo $json_data;
    	}

	public function saleReport()
		{
            if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Companyreport/Sale/list';
			$template['script'] = 'Companyreport/Sale/script';
			$this->load->view('template', $template);
		}

	public function getSaleTable(){
		
            $param['cmp_id'] = $this->session->userdata('cmp_id');
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
			$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
			$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
			$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
			$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
			$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
					
			$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
			$end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
			$param['invoice_no'] = (isset($_REQUEST['invoice_no']))?$_REQUEST['invoice_no']:'';
			$param['product_num1'] = (isset($_REQUEST['product_num1']))?$_REQUEST['product_num1']:'';
					
				if($start_date){
					$start_date = str_replace('/', '-', $start_date);
					$param['start_date'] =  date("Y-m-d",strtotime($start_date));
				}
				   
				if($end_date){
					$end_date = str_replace('/', '-', $end_date);
					$param['end_date'] =  date("Y-m-d",strtotime($end_date));
				}
					
					$data = $this->Companyreport_model->getSaleTables($param);
					$json_data = json_encode($data);
					echo $json_data;
				}
	
                //Company Purchase Report			
	public function purchaseReport()
		{
            if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Companyreport/Purchase/list';
			$template['script'] = 'Companyreport/Purchase/script';
			$this->load->view('template', $template);
		}
				
	public function getPurchaseTable(){

		$param['cmp_id'] = $this->session->userdata('cmp_id');
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
					
		$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
		$end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
		$param['invoice_no'] = (isset($_REQUEST['invoice_no']))?$_REQUEST['invoice_no']:'';
		
					
			if($start_date){
				$start_date = str_replace('/', '-', $start_date);
				$param['start_date'] =  date("Y-m-d",strtotime($start_date));
			}
				   
			if($end_date){
				$end_date = str_replace('/', '-', $end_date);
				$param['end_date'] =  date("Y-m-d",strtotime($end_date));
			}
					
			$data = $this->Companyreport_model->getPurchaseTables($param);
            //  var_dump($this->db->last_query());    
			$json_data = json_encode($data);
			echo $json_data;
				}	
	}
	?>