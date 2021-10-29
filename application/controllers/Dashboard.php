<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	public $page  = 'Dashboard';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');

        }

    $this->load->model('General_model');
		$this->load->model('Dashboard_model');

				
	}
	public function index()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['fin_year']  = $this->General_model->fin_year();
		$template['body'] = 'Dashboard/list';
		$template['script'] = 'Dashboard/script';
		$this->load->view('template',$template);
	}

	public function customer()
	{
		$data = $this->Dashboard_model->customers();
		echo json_encode($data);
	}

	public function vendor()
	{
		$data = $this->Dashboard_model->vendors();
		echo json_encode($data);
	}

	public function stock()
	{
		$data = $this->Dashboard_model->stocks();
		echo json_encode($data);
	}

	public function employee()
	{
		$data = $this->Dashboard_model->employees();
		echo json_encode($data);
	}
}
