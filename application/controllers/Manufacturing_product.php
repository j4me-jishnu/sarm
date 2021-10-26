<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manufacturing extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
		$this->load->model('Manufacturing_model');   
	}
	public function productList()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Manufacturing/Product/list';
		$template['script'] = 'Manufacturing/Product/script';
		$this->load->view('template', $template);
	}
	public function addItem()
	{	
		$this->form_validation->set_rules('product_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['category']=$this->General_model->getPriceCategories();
			$template['company']=$this->General_model->getCompanies();
			$template['mainCategory'] = $this->General_model->getMainCategorylist();
			$template['subCategory'] = $this->General_model->getSubCategorylist();
			$template['unit'] = $this->General_model->getUnitlist();
			$template['price_category'] = $this->General_model->getPriceCategories();
			$template['supplier'] = $this->General_model->getSuppliers();
            $template['body'] = 'Manufacturing/Product/add';
			$template['script'] = 'Manufacturing/Product/script';
			$this->load->view('template', $template);
		}
		else 
		{
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
			$item=array(
						'maincategory_id'=>$this->input->post('maincategory'),
						'subcategory_id'=>$this->input->post('subcategory'),
						'product_code'=>$this->input->post('product_code'),
						'product_name'=>$this->input->post('product_name'),
						'product_unit'=>$this->input->post('product_unit'),
						'product_description'=>$this->input->post('product_description'),
						'min_stock'=>$this->input->post('min_stock'),
						'product_status'=>1,
						'company_id'=>$company,
						'product_type'=>'MP'
					);
			$stock=array(
						'finyear'=>$fyr,
						'stock'=>0,
						'company_id'=>$company,
						'stock_status'=>1
					);
			$opening = array(
						'company_id' =>$company,
						'stock'=>$this->input->post('opening_stock'),
						'opening_status' => 1,
						'finyr'=>$fyr
						);
			$product_id = $this->input->post('product_id');
			if($product_id)
			{
				$data['product_id'] = $product_id;
                $result = $this->General_model->update('tbl_product',$item,'product_id',$product_id);

                $opening['item_id'] = $product_id;
				$this->General_model->upda('tbl_openingstock',$opening,'item_id',$product_id,'company_id',$company,'finyr',$fyr);

                $category=$this->input->post('pcat_id');
				$price=$this->input->post('price');
				for ($i=0; $i < count($category) ; $i++) 
				{ 
				 	$datass=array(
				 				'item_price'=>$price[$i],
				 				);
				 	$this->Administration_model->updateCategoryPrice($product_id,$category[$i],$datass);
				}
				$this->Manufacturing_model->deleteRaw($product_id);
				$prod = $this->input->post('rawproduct');
				$qty = $this->input->post('rawproduct');
				for ($i=0; $i < count($prod) ; $i++) 
				{ 
					$raw = array(
						'prod_id'=>$product_id,
						'raw_itemid'=>$prod[$i],
						'raw_quantity'=>$qty[$i],
						'raw_status'=>1
					);
					$this->General_model->add('tbl_rawmaterials',$raw);	
				}
				$response_text = 'Product Details updated successfully';
			}
			else
			{
				$result = $this->General_model->add('tbl_product',$item);
				$insert_id = $this->db->insert_id();

				$stock['item_id'] = $insert_id;
				$this->General_model->add('tbl_stock',$stock);

				$opening['item_id'] = $insert_id;
				$this->General_model->add('tbl_openingstock',$opening);
				//price & category
				$category=$this->input->post('pcat_id');
				$price=$this->input->post('price');
				for ($i=0; $i < count($category) ; $i++) 
				{ 
				 	$datass=array(

				 				'item_id'=>$insert_id,
				 				'pcategory_id'=>$category[$i],
				 				'item_price'=>$price[$i],
				 				'company_id'=>$company,
				 				'price_status'=>1
				 				);
				 	$this->General_model->add('tbl_pricelist',$datass);
				}

				$prod = $this->input->post('rawproduct');
				$qty = $this->input->post('rawproduct');

				for ($i=0; $i < count($prod) ; $i++) 
				{ 
					$raw = array(
						'prod_id'=>$insert_id,
						'raw_itemid'=>$prod[$i],
						'raw_quantity'=>$qty[$i],
						'raw_status'=>1
					);
					$this->General_model->add('tbl_rawmaterials',$raw);	
				}
				$response_text = 'Product Details added  successfully';
			}
			if($result)
			{
	        	$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else
			{
	        	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ManufacturingProducts/', 'refresh');
		}
	}
	public function getProducts()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Manufacturing_model->getProductTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function activeProduct($product_id,$company_id)
	{
		$fnyr = $this->General_model->fin_year();
		if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

		$status=array('active_status'=>1);
		$this->General_model->updat('tbl_product',$status,'product_id',$product_id,'company_id',$company_id);

		$res=$this->db->affected_rows();
		if ($res == 1) 
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Product Activated successfully&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;success&quot;}');
			redirect('/ManufacturingProducts/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something Went Wrong!!!&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			redirect('/ManufacturingProducts/', 'refresh');
		}
	}
	public function deactiveProduct($product_id,$company_id)
	{
		$fnyr = $this->General_model->fin_year();
		if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

		$status=array('active_status'=>0);
		$this->General_model->updat('tbl_product',$status,'product_id',$product_id,'company_id',$company_id);
		$res=$this->db->affected_rows();
		if ($res == 1) 
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Product Deactivated successfully&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;success&quot;}');
			redirect('/ManufacturingProducts/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something Went Wrong!!!&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			redirect('/ManufacturingProducts/', 'refresh');
		}	
	}
	public function editProducts($product_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['category']=$this->General_model->getPriceCategories();
		$template['company']=$this->General_model->getCompanies();
		$template['mainCategory'] = $this->General_model->getMainCategorylist();
		$template['subCategory'] = $this->General_model->getSubCategorylist();
		$template['unit'] = $this->General_model->getUnitlist();
		$template['price_category'] = $this->General_model->getPriceCategories();
		$template['records'] = $this->Administration_model->getProductDetails($product_id);
		$template['prices'] = $this->Administration_model->getPriceDetails($product_id);
		$template['supplier'] = $this->General_model->getSuppliers();
		$template['itemlist'] = $this->General_model->getItemlist();
		$template['raw'] = $this->Manufacturing_model->getRawmaterials($product_id);
		// print_r($template['raw']);die();
        $template['body'] = 'Manufacturing/Product/add';
		$template['script'] = 'Manufacturing/Product/script';
		$this->load->view('template', $template);
	}
	public function itemDelete()
	{
		$product_id = $this->input->post('product_id');
        $updateData = array('product_status' => 0);
        $data = $this->General_model->update('tbl_product',$updateData,'product_id',$product_id);
		$update = array('stock_status' => 0);
		$data = $this->General_model->update('tbl_stock',$update,'item_id',$product_id);
		$updates = array('price_status' => 0);  
		$data = $this->General_model->update('tbl_pricelist',$updates,'item_id',$product_id);
		$updata = array('raw_status'=>0);
		$data = $this->General_model->update('tbl_rawmaterials',$updata,'prod_id',$product_id);
        if($data) {
            $response['text'] = 'Deleted successfully';
            $response['type'] = 'success';
        }
        else{
            $response['text'] = 'Something went wrong';
            $response['type'] = 'error';
        }
        $response['layout'] = 'topRight';
        $data_json = json_encode($response);
        echo $data_json;
	}
}
