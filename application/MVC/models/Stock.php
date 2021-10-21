<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock extends MY_Controller {
	public $table = 'sale_details';
	public $table1 = 'product_details';
	public $page  = 'Stock';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
            redirect('/login');
        }
        
        $this->load->model('General_model');
        $this->load->model('Stock_model');
        
        
	}
	public function index()
	{
		$template['body'] = 'Stock/list';
		$template['script'] = 'Stock/script';
		$this->load->view('template', $template);
	}
	public function get(){
		$this->load->model('Stock_model');
    	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Stock_model->getStockTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }
}