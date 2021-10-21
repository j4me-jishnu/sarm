<?php
class Loginmodel extends CI_Model{
   /* public function checkUserLogin($data){
        $this->db->where($data);
        $query = $this->db->get('tbl_login');
        if($query->num_rows() == 1){
            $this->session->set_userdata($query->row_array());
            return true;
        }
        else{
            return false;
        }
    }*/
    public function checkUserLogin($data){
        $this->db->where($data);
        $this->db->where('tbl_login.status',1);
        $query = $this->db->get('tbl_login');
        if($query->num_rows() == 1){
            $this->session->set_userdata($query->row_array());
            return true;
        }
        else{
            return false;
        }
    }
    // public function checkIfLoggined($year,$month,$day)
    // {
    //     $this->db->select('*');
    //     $this->db->where('YEAR(updated_date)',$year);
    //     $this->db->where('MONTH(updated_date)',$month);
    //     $this->db->where('DAY(updated_date)',$day);

    //     return $this->db->get('tbl_login')->num_rows();
    
    // }
}
?>
