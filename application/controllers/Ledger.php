<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ledger extends MY_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('General_model');
    $this->load->model('Dashboard_model');
    $this->load->model('Ledger_model');
  }
/* Input table name and ledgerhead name value and this function will create currensponding ledgerhead*/
  public function create_ledger_head($table_name,$value){
    switch ($table_name) {
      case 'tbl_employee':
      $group_id_fk=8; // here come wages and salary, not resolved
      $field_name='emp_name';
      break;
      case 'tbl_bank':
      $group_id_fk=12;
      $field_name='bank_name';
      break;
      case 'tbl_supplier':
      $group_id_fk=21;
      $field_name='supplier_name';
      break;
      case 'tbl_customer':
      $group_id_fk=15;
      $field_name='custname';
      break;
    }
    $insertArray=array(
      'group_id_fk'=>$group_id_fk,
      'ledger_head'=>$value,
      'ledgerhead_desc'=>'1',
      'opening_bal'=>'1200',
      'debit_or_credit'=>1,
      'ledgerhead_status'=>1,
      'company_id_fk'=>5,
      'created_date' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    );
    $result=$this->Ledger_model->add_new_ledger($table_name,$field_name,$value,$insertArray);
    if($result){
      $response_text="Added successfully and Ledger head created";
      $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
    }
    else{
      $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
    }
    redirect('/Customer/', 'refresh');
  }

}
