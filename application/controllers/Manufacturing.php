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
		$this->load->model('Inventory_model');   
	}
	public function Production()
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['company']=$this->General_model->getCompanies();
		$template['areas'] = $this->Manufacturing_model->getArealslist();
		$template['body'] = 'Manufacturing/Production/list';
		$template['script'] = 'Manufacturing/Production/script';
		$this->load->view('template', $template);
	}
	public function addProduction()
	{
		$this->form_validation->set_rules('company', 'company Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['areas'] = $this->Manufacturing_model->getArealslist();
			$template['body'] = 'Manufacturing/Production/add';
			$template['script'] = 'Manufacturing/Production/script';
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
			$production_date = str_replace('/', '-', $this->input->post('production_date'));
			$production_date =  date("Y-m-d",strtotime($production_date));

			$area = $this->input->post('area');

			$data = array(
				'company_id_fk'=> $company,
				'area_id_fk' => $area,
				'fin_year' => $fyr,
				'date' => $production_date,
				'production_status'=> 1
			);
			$result = $this->General_model->add('tbl_production',$data);
			$insert_id = $this->db->insert_id();

			$code = $this->input->post('product_code');
			$name = $this->input->post('product_id_fk');
			$used = $this->input->post('used');
			$rawcount = $this->input->post('raw_id');
			for ($i=0; $i < $rawcount ; $i++) 
			{ 
				$rawdata=array(
					'production_id_fk'=> $insert_id,
					'product_code' => $code[$i],
					'product_id' => $name[$i],
					'used_quantity' => $used[$i],
					'input_status' => 1
				);
				$result = $this->General_model->add('tbl_productioninput',$rawdata);

				//stock updation
				$stok[$i] = $this->Inventory_model->get_stk($name[$i]);
	            $nwstk = $stok[$i][0]->stock - $used[$i];
				$updateData = array(
				'stock' =>$nwstk);			
				$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$name[$i]);
			}
			$codes = $this->input->post('product_codes');
			$names = $this->input->post('products_id');
			$useds = $this->input->post('produced');
			$outcount = $this->input->post('output_id');
			for ($i=0; $i < $outcount ; $i++) 
			{ 
				$outdata=array(
					'production_id_fk'=> $insert_id,
					'product_code' => $codes[$i],
					'product_id' => $names[$i],
					'produced_quantity' => $useds[$i],
					'output_status' => 1
				);
				$result = $this->General_model->add('tbl_productionoutput',$outdata);
				//stock updation
				$stok[$i] = $this->Inventory_model->get_stk($names[$i]);
	            $nwstk = $stok[$i][0]->stock + $useds[$i];
				$updateData = array(
				'stock' =>$nwstk);			
				$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$names[$i]);
			}
			if($result)
			{
					
	        	$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;Production details added successfully&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
	        	
			}
			else
			{
	        	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Production/', 'refresh');
		}
	}
	public function getItems()
	{
		$data = $this->General_model->getItemlist();
		echo json_encode($data);
	}
	public function getProductName()
	{
		$data=$this->General_model->getProductnames($this->input->post('product_code'));
		echo json_encode($data);
	}
	public function getAvailable()
	{
		$data=$this->Manufacturing_model->getAvailableQty($this->input->post('product_id'));
		echo json_encode($data);
	}
	public function getProduction()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		if ($this->session->userdata['user_type'] =='C')
		{
			$company =  $this->session->userdata['cmp_id'];
			$param['company'] =$company;
		}
		$param['area'] = (isset($_REQUEST['area']))?$_REQUEST['area']:'';
        // $param['company'] = (isset($_REQUEST['company']))?$_REQUEST['company']:'';
			
		$data = $this->Manufacturing_model->getProductionReport($param);
		$json_data = json_encode($data);
    	echo $json_data;
	}
	public function viewProduction($production_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['basic_details'] = $this->Manufacturing_model->getProductionbyID($production_id);
		$template['input'] = $this->Manufacturing_model->getProductionInputsbyID($production_id);
		$template['output'] = $this->Manufacturing_model->getProductionOutputsbyID($production_id);
		$template['body'] = 'Manufacturing/Production/view';
		$template['script'] = 'Manufacturing/Production/script';
		$this->load->view('template', $template);
	}
	public function deleteProduction()
	{
		$production_id = $this->input->post('production_id');
		$input = $this->Manufacturing_model->getProductionInputsbyID($production_id);
		$output = $this->Manufacturing_model->getProductionOutputsbyID($production_id);

		foreach ($input as $key) 
		{
			//stock updation
			$stok = $this->Inventory_model->get_stk($key->product_id);
            $nwstk = $stok[0]->stock + $key->used_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$key->product_id);
		}
		foreach ($output as $value) {
			//stock updation
			$stok = $this->Inventory_model->get_stk($value->product_id);
            $nwstk = $stok[0]->stock - $value->produced_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$value->product_id);
		}

        $updateData = array('production_status' => 0);
        $updateDatas = array('input_status' => 0);
        $updateDatass = array('output_status' => 0);
        $data = $this->General_model->update('tbl_production',$updateData,'production_id',$production_id);
        $data = $this->General_model->update('tbl_productioninput',$updateDatas,'production_id_fk',$production_id);
        $data = $this->General_model->update('tbl_productionoutput',$updateDatass,'production_id_fk',$production_id);
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
	public function editProduction($production_id)
	{
		if($this->session->userdata('user_type')=='C'){
			$id = $this->session->userdata('id');
			$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
			}
		$template['areas'] = $this->Manufacturing_model->getArealslist();
		$template['company']=$this->General_model->getCompanies();
		$template['basic_details'] = $this->Manufacturing_model->getProductionbyID($production_id);
		$template['input'] = $this->Manufacturing_model->getProductionInputsbyID($production_id);
		$template['output'] = $this->Manufacturing_model->getProductionOutputsbyID($production_id);
		$template['stock'] = $this->Manufacturing_model->getStocks();
		$template['result'] = $this->General_model->getItemlist();
		$template['body'] = 'Manufacturing/Production/edit';
		$template['script'] = 'Manufacturing/Production/script';
		$this->load->view('template', $template);
	}
	public function updateProduction()
	{
		$production_id = $this->input->post('production_id');
		$input = $this->Manufacturing_model->getProductionInputsbyID($production_id);
		$output = $this->Manufacturing_model->getProductionOutputsbyID($production_id);

		foreach ($input as $key) 
		{
			//stock updation
			$stok = $this->Inventory_model->get_stk($key->product_id);
            $nwstk = $stok[0]->stock + $key->used_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$key->product_id);
		}
		foreach ($output as $value) {
			//stock updation
			$stok = $this->Inventory_model->get_stk($value->product_id);
            $nwstk = $stok[0]->stock - $value->produced_quantity;
			$updateData = array(
			'stock' =>$nwstk);			
			$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$value->product_id);
		}

		$delete = $this->Manufacturing_model->UpdateProductionDetails($production_id);
		if ($delete == 1) 
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
			$production_date = str_replace('/', '-', $this->input->post('production_date'));
			$production_date =  date("Y-m-d",strtotime($production_date));

			$area = $this->input->post('area');

			$data = array(
				'company_id_fk'=> $company,
				'area_id_fk' => $area,
				'fin_year' => $fyr,
				'date' => $production_date,
				'production_status'=> 1
			);
			$result = $this->General_model->add('tbl_production',$data);
			$insert_id = $this->db->insert_id();

			$code = $this->input->post('product_code');
			$name = $this->input->post('product_id_fk');
			$used = $this->input->post('used');
			$rawcount = $this->input->post('raw_id');
			for ($i=0; $i < $rawcount ; $i++) 
			{ 
				$rawdata=array(
					'production_id_fk'=> $insert_id,
					'product_code' => $code[$i],
					'product_id' => $name[$i],
					'used_quantity' => $used[$i],
					'input_status' => 1
				);
				$result = $this->General_model->add('tbl_productioninput',$rawdata);

				//stock updation
				$stok[$i] = $this->Inventory_model->get_stk($name[$i]);
	            $nwstk = $stok[$i][0]->stock - $used[$i];
				$updateData = array(
				'stock' =>$nwstk);			
				$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$name[$i]);
			}
			$codes = $this->input->post('product_codes');
			$names = $this->input->post('products_id');
			$useds = $this->input->post('produced');
			$outcount = $this->input->post('output_id');
			for ($i=0; $i < $outcount ; $i++) 
			{ 
				$outdata=array(
					'production_id_fk'=> $insert_id,
					'product_code' => $codes[$i],
					'product_id' => $names[$i],
					'produced_quantity' => $useds[$i],
					'output_status' => 1
				);
				$result = $this->General_model->add('tbl_productionoutput',$outdata);
				//stock updation
				$stok[$i] = $this->Inventory_model->get_stk($names[$i]);
	            $nwstk = $stok[$i][0]->stock + $useds[$i];
				$updateData = array(
				'stock' =>$nwstk);			
				$data = $this->General_model->update('tbl_stock',$updateData,'item_id',$names[$i]);
			}
			if($result)
			{
					
	        	$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;Production details updated successfully&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
	        	
			}
			else
			{
	        	$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
		}
		else
		{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
		redirect('/Production/', 'refresh');
	}
}