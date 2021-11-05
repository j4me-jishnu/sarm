<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Reports_model extends CI_Model{

	public function getPayrollrepo($param){
		$arOrder = array('','searchValue','start_date','end_date','cust_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($searchValue){
            $this->db->like('supplier_id', $searchValue); 
        }
		if($start_date){
            $this->db->where('payroll_salarydate >=', $start_date); 
        }
		if($end_date){
            $this->db->where('payroll_salarydate <=', $end_date); 
        }
        $this->db->where("payroll_status",1);
		$this->db->select('*');
		$this->db->from('tbl_payroll');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_payroll.payroll_emp_id');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_payroll.company_id');
		$this->db->order_by('payroll_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        return $data;

	}
	
	
}

?>