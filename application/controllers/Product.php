<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        $this->load->library('excel');
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
        
	}
	public function index()
	{

	}
	public function Unit()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Product/Unit/list';
		$template['script'] = 'Administration/Product/Unit/script';
		$this->load->view('template', $template);
	}
	public function getUnit()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Administration_model->getUnitTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addUnit()
	{
		$this->form_validation->set_rules('unit_name', 'unit', 'required');
		if ($this->form_validation->run() == FALSE) {
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Administration/Product/Unit/add';
			$template['script'] = 'Administration/Product/Unit/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(
						'unit_name' => $this->input->post('unit_name'),
						'unit_description' => $this->input->post('unit_description'),
						'unit_status' => 1
						);
						$unit_id = $this->input->post('unit_id');
				if($unit_id){
					 
                     $data['unit_id'] = $unit_id;
                     $result = $this->General_model->update('tbl_unit',$data,'unit_id',$unit_id);
                     $response_text = 'Price Category  updated successfully';
                }
				else{
                     $result = $this->General_model->add('tbl_unit',$data);
                     $response_text = 'Price Category added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Unit/', 'refresh');
		}
	}
	public function unitDelete()
	{
		$unit_id = $this->input->post('unit_id');
        $updateData = array('unit_status' => 0);
        $data = $this->General_model->update('tbl_unit',$updateData,'unit_id',$unit_id);                       
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
	public function Unitedit($unit)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['records'] = $this->General_model->get_row('tbl_unit','unit_id',$unit);
		$template['body'] = 'Administration/Product/Unit/add';
		$template['script'] = 'Administration/Product/Unit/script';
		$this->load->view('template', $template);
	}


	//product
	public function Item()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['codes']=$this->General_model->getItemlist();
		$template['body'] = 'Administration/Product/Item/list';
		$template['script'] = 'Administration/Product/Item/script';
		$this->load->view('template', $template);
	}
	public function getProducts()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        $param['product_code'] = (isset($_REQUEST['product_code']))?$_REQUEST['product_code']:'';
    	$data = $this->Administration_model->getProductTable($param);
    	$json_data = json_encode($data);

    	echo $json_data;
	}

	public function ImportExcel()
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
		$template['body'] = 'Administration/Product/Item/import';
		$template['script'] = 'Administration/Product/Item/script';
		$this->load->view('template',$template);
	}

	function addImport()
	{
		// $row_count = $this->db->count_all('tbl_pricecategory');
		// print_r($row_count);die;
		if(isset($_FILES["import_excel"]["name"]))
		{
			$this->form_validation->set_rules('supplier_id', 'supplier_id', 'required');
			$this->form_validation->set_rules('company_id', 'company_id', 'required');
			$this->form_validation->set_rules('m_category', 'm_category', 'required');
			$this->form_validation->set_rules('s_category', 's_category', 'required');
			if ($this->form_validation->run() == TRUE){
			$path = $_FILES["import_excel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					
					$product_code = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					if(empty($product_code)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$product_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					if(empty($product_name)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$main_category = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					if(empty($main_category)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$sub_category = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					if(empty($sub_category)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$description = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					if(empty($description)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$company = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					if(empty($company)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$product_type = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					if(empty($product_type)){
						$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;File Validation Error&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
						redirect('/importItem/','refresh');
					}
					$data = array(
						'supplier_id'		=>	$this->input->post('supplier_id'),
						'maincategory_id'	=>	$this->input->post('m_category'),
						'subcategory_id'	=>	$this->input->post('s_category'),
						'company_id'		=>	$this->input->post('company_id'),
						'product_code'		=>	$product_code,
						'product_type'		=> 	$product_type,
						'product_name'		=>	$product_name,
						'product_description'	=>	$description,
						'product_status'	=>	1,
					);
					$result = $this->General_model->add_returnID('tbl_product',$data);
					//$this->output->enable_profiler(TRUE);

					$data2 = array(
						'item_id'	=>	$result,
						'company_id'	=>	$this->input->post('company_id'),
						'opening_status'	=>	1,
						'finyr'	=>	3,	
					);
					$result2 = $this->General_model->add('tbl_openingstock',$data2);

					$price_cat = $this->General_model->getPriceCategories();
					$count_price_cat = count($price_cat);
					$x = 1;
					for($i =0;$i < $count_price_cat;$i++){
						$data3 = array(
							'item_id'	=>	$result,
							'pcategory_id'	=> $price_cat[$i]->pcategory_id,
							'company_id'	=> $this->input->post('company_id'),
							'price_status'	=> 1,
						);
					$x++;
					$result3 = $this->General_model->add('tbl_pricelist',$data3);
					}
					

				}
			}
			
			$response_text = 'Data Imported successfully';
			if($result3){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				redirect('/Item/','refresh');
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				redirect('/importItem/','refresh');
			}
		}	
		else{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			redirect('/importItem/','refresh');
		}
	}
}

	public function getSubcategories()
	{
		$result = $this->Administration_model->getSubCategorylists($this->input->post('main_cat'));
		$json_data = json_encode($result);
    	echo $json_data;
	}
	public function getSuppliersbyCompany()
	{
		$result = $this->General_model->getSupplierbyCompanyid($this->input->post('cmp_id'));
		$json_data = json_encode($result);
    	echo $json_data;
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
            $template['body'] = 'Administration/Product/Item/add';
			$template['script'] = 'Administration/Product/Item/script';
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
						'supplier_id'=>$this->input->post('supp_id'),
						'maincategory_id'=>$this->input->post('maincategory'),
						'subcategory_id'=>$this->input->post('subcategory'),
						'product_code'=>$this->input->post('product_code'),
						'product_name'=>$this->input->post('product_name'),
						'product_unit'=>$this->input->post('product_unit'),
						'product_description'=>$this->input->post('product_description'),
						'min_stock'=>$this->input->post('min_stock'),
						'product_status'=>1,
						'company_id'=>$company,
						'product_type'=>'RM',
						'goods_or_service'=>$this->input->post('p_type'),
						'product_remark'=>$this->input->post('remark')
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
			redirect('/Item/', 'refresh');	
		}
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
	public function editProduct($product_id)
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
		//  print_r($template['records']);die();
        $template['body'] = 'Administration/Product/Item/add';
		$template['script'] = 'Administration/Product/Item/script';
		$this->load->view('template', $template);
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
			redirect('/Item/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something Went Wrong!!!&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			redirect('/Item/', 'refresh');
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
			redirect('/Item/', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something Went Wrong!!!&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			redirect('/Item/', 'refresh');
		}	
	}

	//Opening stock
	public function Openingstock()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['body'] = 'Administration/Product/Opening/list';
		$template['script'] = 'Administration/Product/Opening/script';
		$this->load->view('template', $template);
	}
	public function addOpeningstock()
	{
		$fnyr = $this->General_model->fin_year();
		if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
		$this->form_validation->set_rules('quantity', 'quantity', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['company']=$this->General_model->getCompanies();
			if ($this->session->userdata['user_type'] =='C')
			{
				$company =  $this->session->userdata['cmp_id'];
				$template['items'] = $this->Administration_model->getproductnamebyCompany($company);
			}
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Administration/Product/Opening/add';
			$template['script'] = 'Administration/Product/Opening/script';
			$this->load->view('template', $template);
		}
		else {
			if ($this->session->userdata['user_type'] =='A')
			{
				$company = $this->input->post('company');
			}
			else
			{
				$company =  $this->session->userdata['cmp_id'];
			}
			$data = array(
						'company_id' =>$company,
						'stock'=>$this->input->post('quantity'),
						'item_id'=>$this->input->post('item'),
						'opening_status' => 1,
						'finyr'=>$fyr
						);
			$open_id = $this->input->post('open_id');
			if($open_id)
			{
					 
					 $result = $this->General_model->update('tbl_openingstock',$data,'opening_id',$open_id);
                     $response_text = 'Stock Details updated successfully';
            }
			else
			{
                $res=$this->Administration_model->checkExistOpening($this->input->post('item'),$company);
                // echo $res;die(); 
                if ($res == 1)
                {
                	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Openingstock of this product is already added!!!&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
                	redirect('/Openingstock/', 'refresh');
                }
                else
                {
                	$result = $this->General_model->add('tbl_openingstock',$data);
	             	$response_text = 'Stock Details added  successfully';
                }	
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Openingstock/', 'refresh');
	       
		}
	}
	public function getItembyCompany()
	{
		header('Content-Type: application/x-json; charset=utf-8');
		$cmp_id = $this->input->post('cmp_id');
		$result = $this->Administration_model->getproductnamebyCompany($cmp_id);
		echo json_encode($result);
	}
	public function getOpenstock()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		
		// $param['shpname'] =(isset($_REQUEST['shpname']))?$_REQUEST['shpname']:'';
        
		$data = $this->Administration_model->getOpenstockReport($param);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function deleteOpenstock()
	{
		$open_id = $this->input->post('open_id');
        $updateData = array('opening_status' => 0);
        $data = $this->General_model->update('tbl_openingstock',$updateData,'opening_id',$open_id);
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
	public function editOpening($open_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['records'] = $this->Administration_model->getOpenstockDetails($open_id);
		$template['body'] = 'Administration/Product/Opening/edit';
		$template['script'] = 'Administration/Product/Opening/script';
		$this->load->view('template', $template);
	}
}