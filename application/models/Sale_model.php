<?php
Class Sale_model extends CI_Model
{
	public function checkInvoiceUsed($invoice)
	{
		$this->db->select('*');
		$this->db->where('invoice_number',$invoice);
		return $this->db->get('tbl_sale')->num_rows();
	}	
	public function GetBank()
	{
		$this->db->select('*');
		$this->db->where('bank_status',1);
		return $this->db->get('tbl_bank')->result();
	}
	public function getSaleReport($param)
	{
		$company =(isset($param['company']))?$param['company']:'';
		// $invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		// $supplier_id =(isset($param['supplier_id']))?$param['supplier_id']:'';
		// $purchase_date =(isset($param['purchase_date']))?$param['purchase_date']:'';
       
		if($company){
            $this->db->where('tbl_sale.cmp_id', $company); 
        }
        // if ($invoice_number) {
        // 	$this->db->like('tbl_purchase.invoice_number', $invoice_number);
        // }
        // if ($supplier_id) {
        // 	$this->db->where('tbl_purchase.supp_id', $supplier_id);
        // }
        // if ($purchase_date) {
        // 	$this->db->where('tbl_purchase.purchase_date', $purchase_date);
        // }
		$this->db->where("sale_status >",0);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,COUNT(tbl_sale.invoice_number) as prcount,SUM(total_price) as total,DATE_FORMAT(sale_date,\'%d/%m/%Y\') as sale_dat');
		$this->db->from('tbl_sale');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id','left');
		$this->db->join('tbl_salepayments','tbl_salepayments.invoice_number = tbl_sale.invoice_number','left');
		$this->db->group_by('tbl_sale.invoice_number');
		$this->db->order_by('sale_date','DESC');
        $query = $this->db->get();
        
		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getsaleReportcount($param);
        $data['recordsFiltered'] = $this->getsaleReportcount($param);
        return $data;
	}
	public function getsaleReportcount($param)
	{
		$company =(isset($param['company']))?$param['company']:'';
		// $invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		// $supplier_id =(isset($param['supplier_id']))?$param['supplier_id']:'';
		// $purchase_date =(isset($param['purchase_date']))?$param['purchase_date']:'';
       
		if($company){
            $this->db->where('tbl_sale.cmp_id', $company); 
        }
        // if ($invoice_number) {
        // 	$this->db->like('tbl_purchase.invoice_number', $invoice_number);
        // }
        // if ($supplier_id) {
        // 	$this->db->where('tbl_purchase.supp_id', $supplier_id);
        // }
        // if ($purchase_date) {
        // 	$this->db->where('tbl_purchase.purchase_date', $purchase_date);
        // }
		$this->db->where("sale_status",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,COUNT(tbl_sale.invoice_number) as prcount,SUM(total_price) as total,DATE_FORMAT(sale_date,\'%d/%m/%Y\') as sale_dat');
		$this->db->from('tbl_sale');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id','left');
		$this->db->join('tbl_salepayments','tbl_salepayments.invoice_number = tbl_sale.invoice_number','left');
		$this->db->group_by('tbl_sale.invoice_number');
		$this->db->order_by('sale_date','DESC');
        $query = $this->db->get();
        return $query->num_rows();
	}
	public function getSaleReportInvoice($invoice)
	{
		$this->db->select('*,DATE_FORMAT(sale_date,\'%d/%m/%Y\') as sale_dat');
		$this->db->from('tbl_sale');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_sale.cust_id','left');
		$this->db->join('tbl_salepayments','tbl_salepayments.invoice_number = tbl_sale.invoice_number','left');
		$this->db->where('tbl_sale.invoice_number',$invoice);
        $query = $this->db->get();	
        return $query->result();
	}
	public function UpdateSale($invc_no)
	{
		$this->db->where('invoice_number',$invc_no)->delete('tbl_sale');
		$this->db->where('invoice_number',$invc_no)->delete('tbl_salepayments');
	}
	public function getOldbalance($cust_id)
	{
		$this->db->select('old_balance');
		$this->db->where('cust_id',$cust_id);
		return $this->db->get('tbl_customer')->row()->old_balance;
	}
	public function getNet($invoice)
	{
		$this->db->select('net_total');
		$this->db->where('invoice_number',$invoice);
		return $this->db->get('tbl_salepayments')->row()->net_total;
	}
}