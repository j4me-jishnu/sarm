<?php
Class Inventory_model extends CI_Model
{
	public function getPurchaseReport($param)
	{
		$company =(isset($param['company']))?$param['company']:'';
		$invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		$supplier_id =(isset($param['supplier_id']))?$param['supplier_id']:'';
		$purchase_date =(isset($param['purchase_date']))?$param['purchase_date']:'';
       
		if($company){
            $this->db->where('tbl_purchase.cmp_id', $company); 
        }
        if ($invoice_number) {
        	$this->db->like('tbl_purchase.invoice_number', $invoice_number);
        }
        if ($supplier_id) {
        	$this->db->where('tbl_purchase.supp_id', $supplier_id);
        }
        if ($purchase_date) {
        	$this->db->where('tbl_purchase.purchase_date', $purchase_date);
        }
		$this->db->where("purchase_status",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,COUNT(tbl_purchase.invoice_number) as prcount,SUM(total_price) as total,DATE_FORMAT(purchase_date,\'%d/%m/%Y\') as purchase_dat');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_supplier','tbl_supplier.supplier_id = tbl_purchase.supp_id','left');
		$this->db->join('tbl_purchasepayments','tbl_purchasepayments.invoice_number = tbl_purchase.invoice_number','left');
		$this->db->group_by('tbl_purchase.invoice_number');
		$this->db->order_by('purchase_date','DESC');
        $query = $this->db->get();
        
		$data['data'] = $query->result();
        $data['recordsTotal'] = $this->getPurchaseReportcount($param);
        $data['recordsFiltered'] = $this->getPurchaseReportcount($param);
        return $data;
	}
	public function getPurchaseReportcount($param)
	{
		$company =(isset($param['company']))?$param['company']:'';
		$invoice_number =(isset($param['invoice_number']))?$param['invoice_number']:'';
		$supplier_id =(isset($param['supplier_id']))?$param['supplier_id']:'';
		$purchase_date =(isset($param['purchase_date']))?$param['purchase_date']:'';
       
		if($company){
            $this->db->where('tbl_purchase.cmp_id', $company); 
        }
        if ($invoice_number) {
        	$this->db->where('tbl_purchase.invoice_number', $invoice_number);
        }
        if ($supplier_id) {
        	$this->db->where('tbl_purchase.supp_id', $supplier_id);
        }
        if ($purchase_date) {
        	$this->db->where('tbl_purchase.purchase_date', $purchase_date);
        }
		$this->db->where("purchase_status",1);
		
    
		$this->db->select('*,COUNT(tbl_purchase.invoice_number) as prcount,SUM(total_price) as total,DATE_FORMAT(purchase_date,\'%d/%m/%Y\') as purchase_dat');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_supplier','tbl_supplier.supplier_id = tbl_purchase.supp_id','left');
		$this->db->join('tbl_purchasepayments','tbl_purchasepayments.invoice_number = tbl_purchase.invoice_number','left');
		$this->db->group_by('tbl_purchase.invoice_number');
		$this->db->order_by('purchase_date','DESC');
        $query = $this->db->get();
        return $query->num_rows();
	}
	public function getPurchaseReportInvoice($invoice)
	{
		$this->db->select('*,DATE_FORMAT(purchase_date,\'%d/%m/%Y\') as purchase_dat');
		$this->db->from('tbl_purchase');
		$this->db->join('tbl_product','product_id = product_id_fk','left');
		$this->db->join('tbl_purchasepayments','tbl_purchasepayments.invoice_number = tbl_purchase.invoice_number','left');
		$this->db->join('tbl_supplier','tbl_supplier.supplier_id = tbl_purchase.supp_id','left');
		$this->db->join('tbl_bank','tbl_bank.bank_id = tbl_purchase.bank_id','left');
		$this->db->where('tbl_purchase.invoice_number',$invoice);
        return $query = $this->db->get()->result();
	}
	public function UpdatePurchase($invc_no)
	{
		$this->db->where('invoice_number',$invc_no)->delete('tbl_purchase');
		$this->db->where('invoice_number',$invc_no)->delete('tbl_purchasepayments');
	}
	public function checkInvoiceUsed($invoice_number)
	{
		$this->db->select('*');
		$this->db->where('invoice_number',$invoice_number);
		return $this->db->get('tbl_purchase')->num_rows();
	}
	public function getSuppliersData($supp_id)
	{
		$this->db->select('*');
		$this->db->where('supplier_id',$supp_id);
		return $this->db->get('tbl_supplier')->result();
	}
	public function get_invc($invoice)
	{
		$this->db->select('*');
		$this->db->where('invoice_number',$invoice);
		return $this->db->get('tbl_purchase')->result();
	}
	public function get_stk($prid)
	{
		$this->db->select('*');
		$this->db->from('tbl_stock');
		$this->db->where('item_id',$prid);
		$query = $this->db->get();
		return $query->result();
	}
	public function getStockReport($param)
	{
		$arOrder = array('','product_id_fk','shop','product');
        $product_name =(isset($param['product_id_fk']))?$param['product_id_fk']:'';
       	$company =(isset($param['company']))?$param['company']:'';

   		$supplier =(isset($param['supplier']))?$param['supplier']:'';
		$maincategory =(isset($param['maincategory']))?$param['maincategory']:'';
		$subcategory =(isset($param['subcategory']))?$param['subcategory']:'';
       
		if($company){
            $this->db->where('tbl_product.company_id', $company); 
        }
        if ($supplier) {
         	$this->db->where('tbl_product.supplier_id', $supplier);
        }
        if ($maincategory) {
         	$this->db->where('tbl_product.maincategory_id', $maincategory);
        } 
        if ($subcategory) {
         	$this->db->where('tbl_product.subcategory_id', $subcategory);
        }  
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,tbl_openingstock.stock as opening_stock,tbl_stock.stock as stock_qty');
		$this->db->from('tbl_product');
		$this->db->join('tbl_stock','item_id = product_id');
		$this->db->join('tbl_companyinfo','cmp_id = tbl_product.company_id');
		$this->db->join('tbl_openingstock','tbl_openingstock.item_id = tbl_product.product_id','left');
		$this->db->where('product_status',1);
		// $this->db->where('tbl_product.product_type','RM');
		$this->db->order_by('product_id','DESC');
        $query = $this->db->get();
        
		$data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
	}
	public function getOldbalance($supp_id)
	{
		$this->db->select('supplier_oldbal');
		$this->db->where('supplier_id',$supp_id);
		return $this->db->get('tbl_supplier')->row()->supplier_oldbal;
	}
	public function getNet($invoice)
	{
		$this->db->select('net_total');
		$this->db->where('invoice_number',$invoice);
		return $this->db->get('tbl_purchasepayments')->row()->net_total;
	}
}