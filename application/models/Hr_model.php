<?php
Class Hr_model extends CI_Model
{
	public function getCustomerTable($param)
	{
		$arOrder = array('','emp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }
        $this->db->where("emp_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_employee');
		$this->db->join('tbl_companyinfo','cmp_id = company_id');
		$this->db->order_by('emp_id', 'DESC');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
	}
	public function getEmployeeData($emp_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_employee');
		$this->db->join('tbl_companyinfo','cmp_id = company_id');
		$this->db->where('emp_id',$emp_id);
        return $query = $this->db->get()->row();
	}
    public function getPREmployeeData($emp_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_emp_piece_rate');
		$this->db->where('emp_pr_fk',$emp_id);
        $query = $this->db->get();
        return $query->result();
	}
	public function getAttendenceData($param)
	{
		$arOrder = array('','emp_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        $cmp_id =(isset($param['cmp_id']))?$param['cmp_id']:'';
		if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }
        if ($cmp_id) {
        	$this->db->where('company_id',$cmp_id);
        }


		$this->db->where("emp_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_employee');
		$this->db->order_by('emp_id', 'DESC');
        $query = $this->db->get();

		$data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();

        return $data;
	}
	function check_absent($emp_id,$date){

        $query = $this->db->select('*')->from('tbl_empabsent')->where('emp_id',$emp_id)->where('absent_date',$date)->get();
        if($query->num_rows()==0){
            $q = $this->db->select('*')->from('tbl_empattendance')->where('emp_id',$emp_id)->where('att_date',$date)->get();

            if($q->num_rows()==1){
                return 1;

              }
              else{

                  return 0;
              }

        }


    }
    function check_attendance($emp_id,$date){


        $query = $this->db->select('*')->from('tbl_empattendance')->where('emp_id',$emp_id)->where('att_date',$date)->get();
          if($query->num_rows()==0){
            $q = $this->db->select('*')->from('tbl_empabsent')->where('emp_id',$emp_id)->where('absent_date',$date)->get();
            if($q->num_rows()==1){
              return 1;

            }
            else{

                return 0;
            }

          }

    }
    public function getpayAdvanceData($param)
    {
    	$arOrder = array('','adv_empname ');
        $adv_empname  =(isset($param['adv_empname ']))?$param['adv_empname ']:'';
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }
		$this->db->where("adv_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(adv_date,\'%d/%m/%Y\')as adv_date');
		$this->db->from('tbl_advance');
		$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_advance.emp_id');
		$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_advance.company_id');
		$this->db->order_by('adv_id', 'DESC');
        $query = $this->db->get();

		$data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function fetchEmployeesbycompany($cmp_id)
    {
    	$this->db->where('company_id',$cmp_id);
        $data=$this->db->get('tbl_employee');
        return $data->result();
    }
    public function getBasicofEmployee($emp_id)
    {
    	$this->db->select('emp_salary');
    	$this->db->where('emp_id',$emp_id);
    	return $this->db->get('tbl_employee')->row()->emp_salary;
    }
    public function getSalaryMode($emp_id)
    {
    	$this->db->select('emp_mode');
    	$this->db->where('emp_id',$emp_id);
        return $this->db->get('tbl_employee')->row()->emp_mode;
    }
    public function fetchAdvancepay($id)
    {
    	$this->db->select('*,DATE_FORMAT(adv_date,\'%d/%m/%Y\') as adv_date');
    	$this->db->from('tbl_advance');
    	$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_advance.company_id');
    	$this->db->join('tbl_employee','tbl_employee.emp_id = tbl_advance.emp_id');
    	$this->db->where('adv_id',$id);
    	return $this->db->get()->row();
    }
    public function getPayrollDetails($param)
    {
    	$arOrder = array('','payroll_empname');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }

		$this->db->where("payroll_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(payroll_salarydate,\'%d/%m/%Y\')as payroll_salarydate');
		$this->db->from('tbl_payroll');
		$this->db->join('tbl_employee','emp_id = payroll_emp_id');
		$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_payroll.company_id');
		$this->db->order_by('payroll_id', 'DESC');
        $query = $this->db->get();

		$data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getadvanceofEmployee($emp_id,$month)
    {
    	$this->db->select('COALESCE(SUM(adv_amount),0) AS adv_amount');
    	$this->db->where('emp_id',$emp_id);
    	$this->db->where('adv_month',$month);
    	return $this->db->get('tbl_advance')->row()->adv_amount;

    }
    public function getLeavesofEmployee($emp_id,$month)
    {
    	$this->db->select('COALESCE(count(*),0) AS emp_absent');
		$this->db->from('tbl_empabsent');
		$this->db->where("month",$month);
		$this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
    	return $query->row()->emp_absent;
    }

    public function getAttendanceofEmployee($emp_id,$month)
    {
    	$this->db->select('*');
		$this->db->from('tbl_empattendance');
		$this->db->where("month",$month);
		$this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
    	return $query->num_rows();
    }

    public function getAllAttendanceofEmployee($emp_id)
    {
    	$this->db->select('att_date');
		$this->db->from('tbl_empattendance');
		$this->db->where("emp_id",$emp_id);
        $query = $this->db->get();
    	return $query->result();
    }

    public function getOvertimeDetails($param)
    {
        $arOrder = array('','payroll_empname');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }

        $this->db->where("ot_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*,DATE_FORMAT(ot_date,\'%d/%m/%Y\')as date');
        $this->db->from('tbl_overtime');
        $this->db->join('tbl_employee','tbl_employee.emp_id = tbl_overtime.ot_emp_id_fk');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_overtime.ot_cmp_id_fk');
        $this->db->order_by('ot_id','DESC');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getOvertimeDetailsCount($param);
        $data['recordsFiltered'] = $this->getOvertimeDetailsCount($param);
        return $data;
    }
    public function getOvertimeDetailsCount($param)
    {
         $arOrder = array('','payroll_empname');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_name', $searchValue);
        }

        $this->db->where("ot_status",1);

        $this->db->select('*,DATE_FORMAT(ot_date,\'%d/%m/%Y\')as date');
        $this->db->from('tbl_overtime');
        $this->db->join('tbl_employee','tbl_employee.emp_id = tbl_overtime.ot_emp_id_fk');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_overtime.ot_cmp_id_fk');
        $this->db->order_by('ot_id', 'DESC');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getOvertimeDetailss($id)
    {
       $this->db->select('*,DATE_FORMAT(ot_date,\'%d/%m/%Y\')as date');
        $this->db->from('tbl_overtime');
        $this->db->join('tbl_employee','tbl_employee.emp_id = tbl_overtime.ot_emp_id_fk');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_overtime.ot_cmp_id_fk');
        $this->db->where('ot_id',$id);
        $this->db->where("ot_status",1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getOvertimeofEmployee($emp_id,$month)
    {
        $this->db->select('COALESCE(SUM(ot_amount),0) AS over_amount');
        $this->db->where('ot_emp_id_fk',$emp_id);
        $this->db->where('Month(ot_date)',$month);
        return $this->db->get('tbl_overtime')->row()->over_amount;

    }

    public function getItemTable($emp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_emp_piece_rate');
        $this->db->where('emp_pr_fk',$emp_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getInvoiceTable($emp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_emp_peice_rate_pay','tbl_emp_peice_rate_pay.emp_fk = tbl_employee.emp_id');
        $this->db->where('tbl_employee.emp_id',$emp_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPieceEmployee($param)
    {
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_pr_name', $searchValue);
        }

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_emp_peice_rate_pay','tbl_emp_peice_rate_pay.emp_fk = tbl_employee.emp_id');
        $this->db->order_by('emp_id','DESC');
        $this->db->where("emp_status",1);
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getPieceEmployeeCount($param);
        $data['recordsFiltered'] = $this->getPieceEmployeeCount($param);
        return $data;
    }

    public function getPieceEmployeeCount($param)
    {
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('emp_pr_name', $searchValue);
        }
        
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_emp_peice_rate_pay','tbl_emp_peice_rate_pay.emp_fk = tbl_employee.emp_id');
        $this->db->order_by('emp_id','DESC');
        $this->db->where("emp_status",1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getPieceEmployees($emp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_emp_peice_rate_pay','tbl_emp_peice_rate_pay.emp_fk = tbl_employee.emp_id');
        $this->db->where('emp_id',$emp_id);
        $this->db->where("emp_status",1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getItemListTable($emp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_emp_piece_rate');
        $this->db->where('emp_pr_fk',$emp_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function peiceRateajaxTable()
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('emp_mode',2);
        $this->db->where('emp_status',1);
        $query = $this->db->get();
        return $query->result();
    }

    public function rateajaxTable($emp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_emp_piece_rate');
        $this->db->where('emp_pr_fk',$emp_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getPeicerateEmp()
    {
        $this->db->select('emp_id,emp_name');
        $this->db->from('tbl_employee');
        $this->db->where('emp_mode',2);
        $this->db->where('emp_status',1);
        $query = $this->db->get();
        return $query->result();
    }
}
