<?php
Class Manufacturing_model extends CI_Model
{
	public function getProductTable($param)
    {
        $arOrder = array('','product_name');
        $searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('product_name', $searchValue); 
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
        $this->db->where('tbl_product.product_type','MP');
        $query = $this->db->get();

        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;
    }
    public function getRawmaterials($product_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_rawmaterials');
        $this->db->join('tbl_product','tbl_product.product_id = tbl_rawmaterials.raw_itemid');
        $this->db->where('prod_id',$product_id);
        $this->db->where('raw_status',1);
        return $this->db->get()->result();
    }
    public function deleteRaw($product_id)
    {
        $this->db->set('raw_status',0);
        $this->db->where('prod_id',$product_id);
        $this->db->update('tbl_rawmaterials');
    }
    public function getAvailableQty($product_id)
    {
        $this->db->select('stock');
        $this->db->where('item_id',$product_id);
        $this->db->where('stock_status',1);
        $stock = $this->db->get('tbl_stock')->row()->stock;

        $this->db->select('stock');
        $this->db->where('item_id',$product_id);
        $this->db->where('opening_status',1);
        $opening = $this->db->get('tbl_openingstock')->row()->stock;

        return $stock+$opening;
    }
    public function getProductionReport($param)
    {
        $company =(isset($param['company']))?$param['company']:'';
        $area =(isset($param['area']))?$param['area']:'';
        if ($area) {
            $this->db->where('tbl_production.area_id_fk', $area);
        }
        if($company){
            $this->db->where('tbl_production.company_id_fk', $company); 
        }
        $this->db->where("production_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
            $this->db->limit($param['length'],$param['start']);
        }
        $this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as production_date');
        $this->db->from('tbl_production');
        $this->db->join('tbl_companyinfo','cmp_id = company_id_fk','left');
        $this->db->join('tbl_area','area_id = area_id_fk','left');
        $this->db->order_by('production_id','DESC');
        $query=$this->db->get();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->Recordscount($param);
        $data['recordsFiltered'] = $this->Recordscount($param);
        return $data;
    }
    public function Recordscount($param)
    {
        $company =(isset($param['company']))?$param['company']:'';
       
        if($company){
            $this->db->where('tbl_production.company_id_fk', $company); 
        }
        $this->db->where("production_status",1);
        
        $this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as production_date');
        $this->db->from('tbl_production');
        $this->db->join('tbl_companyinfo','cmp_id = company_id_fk','left');
        $this->db->join('tbl_area','area_id = area_id_fk','left');
        $this->db->order_by('production_id','DESC');
        $query=$this->db->get();
        $data['data'] = $query->result();
        return $query->num_rows();
    }
    public function getProductionbyID($production_id)
    {
        $this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as production_date');
        $this->db->from('tbl_production');
        $this->db->join('tbl_companyinfo','cmp_id = company_id_fk','left');
        $this->db->join('tbl_area','area_id = area_id_fk','left');
        $this->db->where('production_id',$production_id);
        return $query=$this->db->get()->result();
    }
    public function getProductionInputsbyID($production_id)
    {
       $this->db->select('*');
       $this->db->from('tbl_productioninput');
       $this->db->join('tbl_product','tbl_product.product_id = tbl_productioninput.product_id');
       $this->db->where('production_id_fk',$production_id);
       return $query=$this->db->get()->result(); 
    }
    public function getProductionOutputsbyID($production_id)
    {
       $this->db->select('*');
       $this->db->from('tbl_productionoutput');
       $this->db->join('tbl_product','tbl_product.product_id = tbl_productionoutput.product_id');
       $this->db->where('production_id_fk',$production_id);
       return $query=$this->db->get()->result();
    }
    public function getStocks()
    {
       $this->db->select('*,tbl_openingstock.stock as opening,tbl_stock.stock as stock');
       $this->db->from('tbl_stock');
       $this->db->join('tbl_openingstock','tbl_openingstock.item_id = tbl_stock.item_id','left');
       $this->db->where('tbl_stock.stock_status',1);
       return $this->db->get()->result(); 
    }
    public function UpdateProductionDetails($production_id)
    {
        $this->db->where('production_id',$production_id)->delete('tbl_production');
        $this->db->where('production_id_fk',$production_id)->delete('tbl_productioninput');
        $this->db->where('production_id_fk',$production_id)->delete('tbl_productionoutput');
        return true;
    }
    public function getArealslist()
    {
        $this->db->select('*');
        $this->db->where('area_status',1);
        return $this->db->get('tbl_area')->result();
    }
}