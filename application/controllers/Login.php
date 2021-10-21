<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Loginmodel');
        $this->load->model('Accounts_model');
        $this->load->model('Accountsreports_model');
        $this->load->model('General_model');
    }
    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
              $this->load->view('Login/index');
        } 
        else 
        {
                $data = array('user_name' => $this->input->post('username'),
                              'password' => $this->input->post('password')
                              );
                $result = $this->Loginmodel->checkUserLogin($data);
                if($result)
                {
                //     update ledger balance
                //     $data = array(
                //         'updated_date'=> date("Y-m-d H:i:s"),
                //     );
                //     $this->General_model->update('tbl_login',$data,'cmp_id',$this->session->userdata['cmp_id']);
                //     $date = date('Y-m-d');
                //     $month = (float)date('m');
                //     $year = date('Y');
                //     $day = (float)date('d');
                //     $response = $this->Loginmodel->checkIfLoggined($year,$month,$day);
                //     if ($response == 0) 
                //     {
                //         redirect('dashboard');
                //     }
                //     else
                //     {
                        
                //         $company=$this->General_model->getCompanies();
                //         $ledgerhead=$this->Accounts_model->getLedgerheadlist();
                //         // $yesterday = date("Y-m-d",strtotime ( '-1 day' , strtotime ( $date ) )) ;
                //         foreach ($company as $row) 
                //         {
                //             foreach ($ledgerhead as $key) 
                //             {
                //                 $result = $this->Accountsreports_model->UpdateLedgerBalance($row->cmp_id,$date,$key->ledgerhead_id);
                //             }
                //         }
                        
                //         redirect('dashboard');
                //     }
                    redirect('dashboard');     
                }
                else{
                    $error['message'] = "The user name or password is invalid";
					$this->load->view('Login/index',$error);
                }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('/login/');
    }
}
?>
