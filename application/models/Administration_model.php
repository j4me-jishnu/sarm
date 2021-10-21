<?php
Class Administration_model extends CI_Model
{
	public function getCustomerTable($param)
	{
		$arOrder = array('','cust_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('custname', $searchValue); 
        }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_customer.company_id',$company);
        }
        $this->db->where("custstatus",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->order_by('cust_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
	}
    public function getPriceCategoryTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('pcategory_name', $searchValue); 
        }
        $this->db->where("pcategory_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_pricecategory');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getSupplierTable($param)
    {
        $arOrder = array('','supplier_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('supplier_name', $searchValue); 
        }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_supplier.company_id',$company);
        }
        $this->db->where("supplier_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_supplier');
        $this->db->order_by('supplier_id', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getTaxTable($param)
    {
        $arOrder = array('','taxname');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('taxname', $searchValue); 
        }
        $this->db->where("tax_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_taxdetails');
        $this->db->order_by('tax_id', 'DESC');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getCategoryTable($param)
    {
        $arOrder = array('','category_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('category_name', $searchValue); 
        }
        $this->db->where("category_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('category_name');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getsubCategoryTable($param)
    {
        $arOrder = array('','subcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('subsubcategory_name', $searchValue); 
        }
        $this->db->where("subcategory_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_subcategory');
        $this->db->join('tbl_category','category_id = main_category_id');
        $this->db->order_by('subcategory_id','DESC');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getUnitTable($param)
    {
        $arOrder = array('','unit_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('unit_name', $searchValue); 
        }
        $this->db->where("unit_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getProductTable($param)
    {
        $arOrder = array('','product_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        $product_code =($param['product_code'])?$param['product_code']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue); 
        }
        if ($product_code) {
            $this->db->like('product_code', $product_code);
        }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_product.company_id',$company);
        }
         $this->db->where("product_status",1);
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category','maincategory_id = category_id');
        $this->db->join('tbl_subcategory','tbl_subcategory.subcategory_id = tbl_product.subcategory_id');
        $this->db->join('tbl_companyinfo','cmp_id = company_id');
        $this->db->where('tbl_product.product_type','RM');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getProductDetailscount($param);
        $data['recordsFiltered'] = $this->getProductDetailscount($param);

        return $data;
    }
    public function getProductDetailscount($param)
    {
        $arOrder = array('','product_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        $product_code =($param['product_code'])?$param['product_code']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue); 
        }
        if ($product_code) {
            $this->db->like('product_code', $product_code);
        }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_product.company_id',$company);
        }
        $this->db->where("product_status",1);
        
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->join('tbl_category','maincategory_id = category_id');
        $this->db->join('tbl_subcategory','tbl_subcategory.subcategory_id = tbl_product.subcategory_id');
        $this->db->join('tbl_companyinfo','cmp_id = company_id');
        // $this->db->where('tbl_product.product_type','RM');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getProductDetails($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
         $this->db->join('tbl_category','maincategory_id = category_id','left');
         $this->db->join('tbl_subcategory','tbl_subcategory.subcategory_id = tbl_product.subcategory_id','left');
         $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_product.company_id','left');
         $this->db->join('tbl_unit','product_unit = unit_name','left');
        // $this->db->join('tbl_openingstock','tbl_product.product_id = tbl_openingstock.item_id','left');
        $this->db->where('tbl_product.product_id',$product_id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getPriceDetails($product_id)
    {
        $this->db->select('*');
        $this->db->where('item_id',$product_id);
        $this->db->from('tbl_pricelist');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateCategoryPrice($product_id,$category,$datass)
    {
        $this->db->where('item_id',$product_id);
        $this->db->where('pcategory_id',$category);
        $this->db->update('tbl_pricelist',$datass);
    }
    public function getproductnamebyCompany($cmp_id)
    {
        $this->db->select('product_id,product_name');
        $this->db->where("product_status",1);
        $this->db->where('company_id',$cmp_id);
        $this->db->where('tbl_product.product_type','RM');
        $query = $this->db->get('tbl_product');
        return $query->result();
    }
    public function getOpenstockReport($param)
    {
        $arOrder = array('','shpname');
        $shpname =(isset($param['shpname']))?$param['shpname']:'';
      
        // if($shpname!=''){ 
        //     $this->db->where('shop_id_fk', $shpname); 
        // }
        // else{
        //     $this->db->where('shop_id_fk', 0);
        // }
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue); 
        }
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_openingstock.company_id',$company);
        }
        $this->db->where("tbl_openingstock.opening_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_openingstock');
        $this->db->join('tbl_product','tbl_product.product_id = tbl_openingstock.item_id');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_openingstock.company_id');
        $this->db->join('tbl_finyear','tbl_finyear.finyear_id = tbl_openingstock.finyr');
        $this->db->order_by('opening_id');
        $query = $this->db->get();
        
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function checkExistOpening($item,$company_id)
    {
        $fnyr = $this->General_model->fin_year();
        if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

        $this->db->select('*');
        $this->db->where('company_id',$company_id);
        $this->db->where('item_id',$item);
        $this->db->where('opening_status',1);
        $this->db->where('finyr',$fyr);
        $data = $this->db->get('tbl_openingstock')->num_rows();
        if ($data == NULL) 
        {
            return false;
        }
        else
        {
            return true;
        }    

    }
    public function getOpenstockDetails($open_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_openingstock');
        $this->db->join('tbl_product','tbl_product.product_id = tbl_openingstock.item_id');
        $this->db->join('tbl_companyinfo','tbl_companyinfo.cmp_id = tbl_openingstock.company_id');
        $this->db->where('opening_id',$open_id);
        return $query = $this->db->get()->row();
    }
    public function getSubCategorylists($category)
    {
        $this->db->select('*');
        $this->db->where('subcategory_status',1);
        $this->db->where('main_category_id',$category);
        return $this->db->get('tbl_subcategory')->result();
    }
    public function getAreaTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("area_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_area');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCountAreaTable($param);
        $data['recordsFiltered'] = $this->getCountAreaTable($param);
        return $data;
    }
    public function getCountAreaTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        
        $this->db->where("area_status",1);
        $this->db->select('*');
        $this->db->from('tbl_area');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getBankTable($param)
    {
        $arOrder = array('','pcategory_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if ($this->session->userdata['user_type'] =='C') 
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('bank_cmp',$company);
        }
        $this->db->where("bank_status",1);

        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->join('tbl_companyinfo','cmp_id = bank_cmp','left');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCountBankTable($param);
        $data['recordsFiltered'] = $this->getCountBankTable($param);
        return $data;
    }
    public function getCountBankTable($param)
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->join('tbl_companyinfo','cmp_id = bank_cmp','left');
        $this->db->where("bank_status",1);
        $query = $this->db->get();

        return $query->num_rows();
    }
    public function getBankdetails($bank_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->join('tbl_companyinfo','cmp_id = bank_cmp','left');
        $this->db->where("bank_id",$bank_id);
        $this->db->where("bank_status",1);
        return $query = $this->db->get()->result(); 
    }
}