<?php
class Ledger_model extends CI_Model{

  public function add_new_ledger($table_name,$field_name,$value,$insertArray){
    $query=$this->db->insert('tbl_ledgerhead',$insertArray);
    if($query){ return true;} else { return false; }
  }



}
