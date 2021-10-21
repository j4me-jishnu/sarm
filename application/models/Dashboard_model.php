<?php
Class Dashboard_model extends CI_Model{

	public function fin_year()
	{
		$this->db->where('fin_status',1);
		$query=$this->db->get('tbl_finyear');
		return $query->row();
	}
	public function customers()
	{
		$this->db->where('custstatus',1);
		$query=$this->db->get('tbl_customer');
		return $query->num_rows();
	}
	public function vendors()
	{
		$this->db->where('vendorstatus ',1);
		$query=$this->db->get('tbl_vendor');
		return $query->num_rows();
	}
	public function stock()
	{
		$this->db->select('stockid');
		$this->db->from('tbl_stock');
		$this->db->where('status', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function masterstock()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stockavilable()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock >', 10);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stockunavilable()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock =', 0);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function stock_reachedbelow()
	{
		$this->db->select('master_stockid');
		$this->db->from('tbl_masterstock');
		$this->db->where('master_stock <', 10);
		$this->db->where('master_stock >', 0);
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function shop()
	{
		$this->db->where('status',1);
		$query=$this->db->get('tbl_shop');
		return $query->num_rows();
	}
	public function log_id()
	{
		$this->db->select('masterlog_id');
		$this->db->from('tbl_masterlog');
		$this->db->order_by('masterlog_id','DESC');
		$this->db->limit(1);
		$this->db->where('masterlog_status', 1);
		$query=$this->db->get();
		return $query->result();
	} 
	public function stock_movement($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_stock');
		$this->db->join('tbl_product','tbl_product.product_id = product_id_fk');
	//	$this->db->join('tbl_size','tbl_size.size_id = size_id_fk');
		$this->db->where('masterlog_id_fk',$id);
		$this->db->where('status', 1);
		$query=$this->db->get();
		return $query->result();	
	}
	public function products()
	{
		$this->db->where('product_status',1);
		$query=$this->db->get('tbl_product');
		return $query->num_rows();
	}
	public function purchases()
	{
		$this->db->where('purchase_status',1);
		$query=$this->db->get('tbl_purchase');
		return $query->num_rows();
	}
	public function sales()
	{
		$this->db->where('sale_status',1);
		$query=$this->db->get('tbl_sale');
		return $query->num_rows();
	}
	public function masterstockdetails()
	{
		$this->db->select('*');
		$this->db->from('tbl_masterstock');
		$this->db->join('tbl_product','tbl_product.product_id = product_id_fk');
		$this->db->join('tbl_category','tbl_category.category_id = tbl_product.category_id_fk');
		//$this->db->join('tbl_size','tbl_size.size_id = size_id_fk');
		$this->db->where('masterstatus', 1);
		$query=$this->db->get();
		return $query->result();	
	}
		
}

?>