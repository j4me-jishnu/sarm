<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller {
	public $pricecat = 'tbl_pricecategory';
	public $t_category = 'tbl_category';
	public $t_subcategory = 'tbl_subcategory';
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
        $this->load->model('General_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Administration_model');
        
	}
	public function index()
	{

	}
	//price category
	public function Pricecategory()
	{
		$template['body'] = 'Administration/Category/PriceCategory/list';
		$template['script'] = 'Administration/Category/PriceCategory/script';
		$this->load->view('template', $template);
	}
	public function getPricecategory()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Administration_model->getPriceCategoryTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function AddpriceCategory()
	{
		$this->form_validation->set_rules('category_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Category/PriceCategory/add';
			$template['script'] = 'Administration/Category/PriceCategory/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(
						'pcategory_name' => $this->input->post('category_name'),
						'pcategory_description' => $this->input->post('category_description'),
						'pcategory_status' => 1
						);
						$category_id = $this->input->post('category_id');
				if($category_id){
					 
                     $data['pcategory_id'] = $category_id;
                     $result = $this->General_model->update($this->pricecat,$data,'pcategory_id',$category_id);
                     $response_text = 'Price Category  updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->pricecat,$data);
                     $response_text = 'Price Category added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Pricecategory/', 'refresh');
		}
	}
	public function priceCategoryedit($category_id)
	{
		$template['body'] = 'Administration/Category/PriceCategory/add';
		$template['script'] = 'Administration/Category/PriceCategory/script';
		$template['records'] = $this->General_model->get_row($this->pricecat,'pcategory_id',$category_id);
    	$this->load->view('template', $template);
	}
	public function priceCategoryDelete()
	{
		$category_id = $this->input->post('category_id');
        $updateData = array('pcategory_status' => 0);
        $data = $this->General_model->update($this->pricecat,$updateData,'pcategory_id',$category_id);
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
		redirect('/Pricecategory/', 'refresh');
	}
	//Prduct main Category
	public function Productcategory()
	{
		$template['body'] = 'Administration/Category/Product/Main/list';
		$template['script'] = 'Administration/Category/Product/Main/script';
		$this->load->view('template', $template);
	}
	public function getMainCategory()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Administration_model->getCategoryTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function AddmainCategory()
	{
		$this->form_validation->set_rules('category_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Category/Product/Main/add';
			$template['script'] = 'Administration/Category/Product/Main/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(
						'category_name' => $this->input->post('category_name'),
						'category_description' => $this->input->post('category_description'),
						'category_status' => 1
						);
						$category_id = $this->input->post('category_id');
				if($category_id){
					 
                     $data['category_id'] = $category_id;
                     $result = $this->General_model->update($this->t_category,$data,'category_id',$category_id);
                     $response_text = 'Category  updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->t_category,$data);
                     $response_text = 'Category added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Productcategory/', 'refresh');
		}
	}
	public function CategoryDelete()
	{
		$cat = $this->input->post('category_id');
        $updateData = array('category_status' => 0);
        $data = $this->General_model->update($this->t_category,$updateData,'category_id',$cat);                       
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
	public function Categoryedit($cat)
	{
		$template['records'] = $this->General_model->get_row($this->t_category,'category_id',$cat);
		$template['body'] = 'Administration/Category/Product/Main/add';
		$template['script'] = 'Administration/Category/Product/Main/script';
		$this->load->view('template', $template);
	}

	//SUB-CATEGORY
	public function Productsubcategory()
	{
		$template['body'] = 'Administration/Category/Product/Sub/list';
		$template['script'] = 'Administration/Category/Product/Sub/script';
		$this->load->view('template', $template);
	}
	public function getsubCategory()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Administration_model->getsubCategoryTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function AddsubCategory()
	{
		$this->form_validation->set_rules('category_name', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['mainCategory'] = $this->General_model->getMainCategorylist();
			$template['body'] = 'Administration/Category/Product/Sub/add';
			$template['script'] = 'Administration/Category/Product/Sub/script';
			$this->load->view('template', $template);
		}
		else {
			$data = array(
						'subcategory_name' => $this->input->post('category_name'),
						'subcategory_description' => $this->input->post('category_description'),
						'subcategory_status' => 1,
						'main_category_id' => $this->input->post('maincategory')
						);
						$category_id = $this->input->post('category_id');
				if($category_id){
					 
                     $data['subcategory_id'] = $category_id;
                     $result = $this->General_model->update($this->t_subcategory,$data,'subcategory_id',$category_id);
                     $response_text = 'Category  updated successfully';
                }
				else{
                     $result = $this->General_model->add($this->t_subcategory,$data);
                     $response_text = 'Category added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
	        redirect('/Productsubcategory/', 'refresh');
		}
	}
	public function subCategoryDelete()
	{
		$cat = $this->input->post('category_id');
        $updateData = array('subcategory_status' => 0);
        $data = $this->General_model->update($this->t_subcategory,$updateData,'subcategory_id',$cat);                       
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
	public function subCategoryedit($sub_cat)
	{
		$template['records'] = $this->General_model->get_row($this->t_subcategory,'subcategory_id',$sub_cat);
		$template['mainCategory'] = $this->General_model->getMainCategorylist();
		$template['body'] = 'Administration/Category/Product/Sub/add';
		$template['script'] = 'Administration/Category/Product/Sub/script';
		$this->load->view('template', $template);
	}
}