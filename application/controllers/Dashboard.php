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
		$template['fin_year']  = $this->General_model->fin_year();
		$template['body'] = 'Dashboard/list';
		$template['script'] = 'Dashboard/script';
		$this->load->view('template',$template);
	}
}
