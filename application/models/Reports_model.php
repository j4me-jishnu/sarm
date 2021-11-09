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

		public function getStockrepo($param){
			$arOrder = array('','searchValue','start_date','end_date','cust_name');
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
			$item_name =(isset($param['item_name']))?$param['item_name']:'';
			if($searchValue){
				$this->db->like('stock_id', $searchValue); 
			}
			if($item_name){
				$this->db->where('product_name >=', $item_name); 
			}
			$this->db->where("stock_status",1);
			$this->db->select('*');
			$this->db->from('tbl_stock');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_stock.company_id');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_stock.item_id');
			$this->db->join('tbl_finyear','tbl_finyear.finyear_id = tbl_stock.finyear');
			$this->db->order_by('stock_id', 'DESC');
			$query = $this->db->get();
			
			$data['data'] = $query->result();
			return $data;
	
		}

		public function getProductionTable1($param){
			$arOrder = array('','searchValue','start_date','end_date','cust_name');
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			if($searchValue){
				$this->db->like('production_id', $searchValue); 
			}
			if($start_date){
				$this->db->where('date >=', $start_date); 
			}
			if($end_date){
				$this->db->where('date <=', $end_date); 
			}
			$this->db->where("production_status",1);
			$this->db->select('*');
			$this->db->from('tbl_production');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_production.company_id_fk');
			$this->db->join('tbl_area','tbl_area.area_id = tbl_production.area_id_fk');
			$this->db->join('tbl_productioninput','tbl_productioninput.production_id_fk = tbl_production.production_id');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_productioninput.product_id');
			$this->db->order_by('production_id', 'DESC');
			$query = $this->db->get();
			
			$data['data'] = $query->result();
			return $data;
	
		}
	
		public function getProductionTable2($param){
			$arOrder = array('','searchValue','start_date','end_date','cust_name');
			$searchValue =($param['searchValue'])?$param['searchValue']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			if($searchValue){
				$this->db->like('production_id', $searchValue); 
			}
			if($start_date){
				$this->db->where('date >=', $start_date); 
			}
			if($end_date){
				$this->db->where('date <=', $end_date); 
			}
			$this->db->where("production_status",1);
			$this->db->select('*');
			$this->db->from('tbl_production');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_production.company_id_fk');
			$this->db->join('tbl_area','tbl_area.area_id = tbl_production.area_id_fk');
			$this->db->join('tbl_productionoutput','tbl_productionoutput.production_id_fk = tbl_production.production_id');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_productionoutput.product_id');
			$this->db->order_by('production_id', 'DESC');
			$query = $this->db->get();
			
			$data['data'] = $query->result();
			return $data;
	
		}


		public function getSaleTables($param){
			$arOrder = array('','invoice_no','shop','product_num1');
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
			$product_num1 =(isset($param['product_num1']))?$param['product_num1']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('tbl_sale.invoice_number', $invoice_no); 
			}
			if($product_num1){
				$this->db->like('tbl_product.product_name', $product_num1); 
			}
			if($shop!=0){
				$this->db->where('tbl_companyinfo.cmp_name', $shop); 
			}
			if($start_date){
				$this->db->where('sale_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('sale_date <=', $end_date); 
			}

			$this->db->where("sale_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_sale');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_sale.product_id_fk');
			$this->db->join('tbl_salepayments','tbl_salepayments.invoice_number = tbl_sale.invoice_number');
			$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_sale.cmp_id');
			$this->db->order_by('tbl_sale.sale_id','DESC');
			$query = $this->db->get();
			$data['data'] = $query->result();
			$data['recordsTotal'] = $this->getSaleTablesTotalCount($param);
			$data['recordsFiltered'] = $this->getSaleTablesTotalCount($param);
			return $data;
	
		}

		public function getSaleTablesTotalCount($param){
			$invoice_no =(isset($param['invoice_no']))?$param['invoice_no']:'';
			$product_num1 =(isset($param['product_num']))?$param['product_num']:'';
			$shop =(isset($param['shop']))?$param['shop']:'';
			$start_date =(isset($param['start_date']))?$param['start_date']:'';
			$end_date =(isset($param['end_date']))?$param['end_date']:'';
			
			if($invoice_no){
				$this->db->where('tbl_sale.invoice_number', $invoice_no); 
			}
			if($product_num1){
				$this->db->like('tbl_product.product_name', $product_num1); 
			}
			if($shop!=0){
				$this->db->where('tbl_companyinfo.cmp_name', $shop); 
			}
			if($start_date){
				$this->db->where('sale_date >=', $start_date);
			}
			if($end_date){
				$this->db->where('sale_date <=', $end_date); 
			}

			$this->db->where("sale_status >",0);
			$this->db->select('*');
			$this->db->from('tbl_sale');
			$this->db->join('tbl_product','tbl_product.product_id = tbl_sale.product_id_fk');
			$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id');
			$this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_sale.cmp_id');
			$this->db->order_by('tbl_sale.sale_id','DESC');
			$query = $this->db->get();
			return $query->num_rows();
		}
}

?>