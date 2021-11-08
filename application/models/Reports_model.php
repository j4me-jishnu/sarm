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

	public function getAttendanceReport($param){

		$arOrder = array('','emp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$emp_name =(isset($param['emp_name']))?$param['emp_name']:'';
        $start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($start_date){
            $this->db->where('att_date >=', $start_date); 
        }
		if($end_date){
            $this->db->where('att_date <=', $end_date); 
        }
		if($emp_name){
			$this->db->where('emp_name', $emp_name); 
        }
		if($searchValue){
            $this->db->like('emp_name', $searchValue); 
        }
        $this->db->where("att_status",1);

		$this->db->select('*,DATE_FORMAT(att_date,\'%d/%m/%Y\') as att_date');
		$this->db->from('tbl_empattendance');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_empattendance.emp_id');
		$this->db->order_by('att_id', 'DESC');
		$this->db->like('att_date', date('Y-m'));
		$query = $this->db->get();
		
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getAttendanceReportCount($param);
		$data['recordsFiltered'] = $this->getAttendanceReportCount($param);
		return $data;
		}
	
	public function getAttendanceReportCount($param = NULL){
		
		$arOrder = array('','emp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$emp_name =(isset($param['emp_name']))?$param['emp_name']:'';
        $start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($start_date){
            $this->db->where('att_date >=', $start_date); 
        }
		if($end_date){
            $this->db->where('att_date <=', $end_date); 
        }
		if($emp_name){
			$this->db->where('emp_name', $emp_name); 
        }
		if($searchValue){
            $this->db->like('emp_name', $searchValue); 
        }
        $this->db->where("att_status",1);

		$this->db->select('*,DATE_FORMAT(att_date,\'%d/%m/%Y\') as att_date');
		$this->db->from('tbl_empattendance');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_empattendance.emp_id');
		$this->db->order_by('att_id', 'DESC');
		$this->db->like('att_date', date('Y-m'));
		$query = $this->db->get();
		return $query->num_rows();

    }

	public function getAbsentReport($param){

		$arOrder = array('','emp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$emp_name =(isset($param['emp_name']))?$param['emp_name']:'';
        $start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($start_date){
            $this->db->where('absent_date >=', $start_date); 
        }
		if($end_date){
            $this->db->where('absent_date <=', $end_date); 
        }
		if($emp_name){
			$this->db->where('emp_name', $emp_name); 
        }
		if($searchValue){
            $this->db->like('emp_name', $searchValue); 
        }
        $this->db->where("absent_status",1);

		$this->db->select('*,DATE_FORMAT(absent_date,\'%d/%m/%Y\') as absent_date');
		$this->db->from('tbl_empabsent');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_empabsent.emp_id');
		$this->db->order_by('absent_id', 'DESC');
		$this->db->like('absent_date', date('Y-m'));
		$query = $this->db->get();
		
		$data['data'] = $query->result();
		$data['recordsTotal'] = $this->getAbsentReportCount($param);
		$data['recordsFiltered'] = $this->getAbsentReportCount($param);
		return $data;
		}


		public function getAbsentReportCount($param = NULL){
		
			$arOrder = array('','emp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$emp_name =(isset($param['emp_name']))?$param['emp_name']:'';
        $start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($start_date){
            $this->db->where('absent_date >=', $start_date); 
        }
		if($end_date){
            $this->db->where('absent_date <=', $end_date); 
        }
		if($emp_name){
			$this->db->where('emp_name', $emp_name); 
        }
		if($searchValue){
            $this->db->like('emp_name', $searchValue); 
        }
        $this->db->where("absent_status",1);

		$this->db->select('*,DATE_FORMAT(absent_date,\'%d/%m/%Y\') as absent_date');
		$this->db->from('tbl_empabsent');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_empabsent.emp_id');
		$this->db->order_by('absent_id', 'DESC');
		$this->db->like('absent_date', date('Y-m'));
		$query = $this->db->get();
			return $query->num_rows();
	
		}
	
	
}

?>