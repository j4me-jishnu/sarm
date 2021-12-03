<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountsreports extends MY_Controller 
{
		public function __construct() 
		{
				parent::__construct();
	      if(! $this->is_logged_in())
	      {
	          redirect('/login');
	      }
	      $this->load->model('General_model');
				$this->load->model('Dashboard_model');
				$this->load->model('Administration_model');
				$this->load->model('Accounts_model');
				$this->load->model('Accountsreports_model');
				$this->load->model('Sale_model');    
		}
		public function getLedgerHead()
		{
			header('Content-Type: application/x-json; charset=utf-8');
			$result = $this->General_model->ledgerheadsbycompany($this->input->post('company'));
			echo json_encode($result);
		}
		public function Ledger()
		{
			if ($this->session->userdata['user_type'] =='A')
			{
				$template['ledgerhead']=$this->Accounts_model->getLedgerheadlist();
			}
			else
			{
				$cmp =  $this->session->userdata['cmp_id'];
				$template['ledgerhead']=$this->Accounts_model->getLedgerheadlistcompany($cmp);
			}
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['company']=$this->General_model->getCompanies();
			$template['balance']=NULL;$template['result']=NULL;
			$template['body'] = 'Accounts/Ledger/list';
			$template['script'] = 'Accounts/Ledger/script';
			$this->load->view('template', $template);
		}
		public function getLedger()
		{
				$date_from = $this->input->post('date_from');
				$date_from = str_replace('/', '-', $date_from);
		    	$date_from =  date("Y-m-d",strtotime($date_from));

		    	$date_to = $this->input->post('date_to');
				$date_to = str_replace('/', '-', $date_to);
		    	$date_to =  date("Y-m-d",strtotime($date_to));

		    	// $ledger_date=date("2021-06-29");
		    	// $date_from=date("2021-06-29");	

				// $template['debit'] = $this->Accountsreports_model->getDebitSide($this->input->post('company'),$this->input->post('ledgerhead'),$ledger_date);
				// $template['credit'] = $this->Accountsreports_model->getCreditSide($this->input->post('company'),$this->input->post('ledgerhead'),$ledger_date);
				$template['debit']=NULL;$template['credit']=NULL;
				$template['result']= $this->Accountsreports_model->ledger($this->input->post('company'),$this->input->post('ledgerhead'),$date_from,$date_to);
				$template['balance'] = $this->Accountsreports_model->getBalance($this->input->post('company'),$this->input->post('ledgerhead'),$date_from,$date_to);

				// print_r($template['balance']);die();

				$template['company_id'] = $this->input->post('company');
				$template['led_id'] = $this->input->post('ledgerhead');
				$template['date_from'] = $this->input->post('date_from');
				$template['date_to'] = $this->input->post('date_to');

				if($this->session->userdata('user_type')=='C'){
					$id = $this->session->userdata('id');
					$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
					}
				$template['ledgerhead']=$this->Accounts_model->getLedgerheadlist();
				$template['company']=$this->General_model->getCompanies();
				$template['body'] = 'Accounts/Ledger/list';
				$template['script'] = 'Accounts/Ledger/script';
				$this->load->view('template', $template);
		}
		public function Daybook()
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
				$template['bank_acc'] = $this->Accountsreports_model->GetDaybookheads();
				$template['company']=$this->General_model->getCompanies();
				$template['body'] = 'Accounts/Daybook/list';
				$template['script'] = 'Accounts/Daybook/script';
				$this->load->view('template', $template);
		}
		public function cashorbank()
		{
			header('Content-Type: application/x-json; charset=utf-8');
			$result = $this->General_model->cashorbank($this->input->post('company'));
			echo json_encode($result);
		}
		public function getDaybook()
		{
			$day = $this->input->post('day');
			$day = str_replace('/', '-', $day);
		    $day =  date("Y-m-d",strtotime($day));

		    $template['records'] = $this->Accountsreports_model->getDaybook($this->input->post('company'),$day,$this->input->post('ledger_head'));
		    $template['bank_acc'] = $this->Accountsreports_model->GetDaybookheads();
			$template['company']=$this->General_model->getCompanies();

			$template['company_id'] = $this->input->post('company');
			$template['ledger_head'] = $this->input->post('ledger_head');
			$template['day'] = $this->input->post('day');

			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
		  	$template['body'] = 'Accounts/Daybook/list';
			$template['script'] = 'Accounts/Daybook/script';
			$this->load->view('template', $template);

		}
		public function Profitloss()
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Profitloss/list';
			$template['script'] = 'Accounts/Profitloss/script';
			$this->load->view('template', $template);
		}
		public function getProfitloss()
		{
			if($this->session->userdata('user_type')=='A'){
				$cmp=$this->input->post('company');
			}
			else
			{
				$cmp=$this->session->userdata('cmp_id');
			}
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			$template['company_id'] = $this->input->post('company');

			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

			$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        	$end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
			if($start_date){
				$start_date = str_replace('/', '-', $start_date);
				$start_date =  date("Y-m-d",strtotime($start_date));
			}
		   
			if($end_date){
				$end_date = str_replace('/', '-', $end_date);
				$end_date =  date("Y-m-d",strtotime($end_date));
			}
			//purchase
			// $template['purchase'] = $this->Accountsreports_model->getTotalPurchases($cmp,$fyr);
			// print_r($template['purchase']);die;

			// $template['purchaseret'] = $this->Accountsreports_model->getTotalPurchaseret($cmp,$fyr);

			//sales
			// $template['sales'] = $this->Accountsreports_model->getTotalSales($cmp,$fyr);
			// $template['salesret'] = $this->Accountsreports_model->getTotalSalesret($cmp,$fyr);

			// //direct expenses
			// $template['direct_exp'] = $this->Accountsreports_model->getAllDirectexp($cmp,$fyr);

			// //direct income
			// $template['direct_income'] = $this->Accountsreports_model->getAllDirectincome($cmp);

			// //indirect expense
			// $template['indirect_exp'] = $this->Accountsreports_model->getAllinDirectexp($cmp);

			// //indirect income
			// $template['indirect_income'] = $this->Accountsreports_model->getAllinDirectincome($cmp);

			//all direct income
			$template['direct_income'] = $this->Accountsreports_model->getAllDirectincomes($cmp,$fyr,$start_date,$end_date);
			// print_r($template['direct_income']);die();

			//all indirect income
			$template['indirect_income'] = $this->Accountsreports_model->getAllinDirectincomes($cmp,$fyr,$start_date,$end_date);

			//all direct expense
			$template['direct_exp'] = $this->Accountsreports_model->getAllDirectexpenses($cmp,$fyr,$start_date,$end_date);

			//all indirect expense
			$template['indirect_exp'] = $this->Accountsreports_model->getAllinDirectexpenses($cmp,$fyr,$start_date,$end_date);

			// $template['opening'] = $this->Accountsreports_model->get_opening($cmp,$fyr);
			$template['closing'] = $this->Accountsreports_model->get_closingstock($cmp,$fyr,$start_date,$end_date);
			// print_r($template['direct_income']);die;
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['body'] = 'Accounts/Profitloss/list';
			$template['script'] = 'Accounts/Profitloss/script';
			$this->load->view('template', $template);
		
		}
		public function Trialbalance()
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			if($this->session->userdata('user_type')=='C'){
				$comp_id = $this->session->userdata('cmp_id');
				$template['company1'] = $this->General_model->get_row('tbl_companyinfo','cmp_id',$comp_id);
			}	
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Trialbalance/list';
			$template['script'] = 'Accounts/Trialbalance/script';
			$this->load->view('template', $template);
		}
		public function getTrialbalance()
		{
			if($this->session->userdata('user_type')=='C'){
				$comp_id = $this->session->userdata('cmp_id');
				$template['company1'] = $this->General_model->get_row('tbl_companyinfo','cmp_id',$comp_id);
			}	
			
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			if($this->session->userdata('user_type')=='A'){
				$cmp=$this->input->post('company');	
			}
			else
			{
				$cmp=$this->session->userdata('cmp_id');
			}
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}

			$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        	$end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
			if($start_date){
				$start_date = str_replace('/', '-', $start_date);
				$start_date =  date("Y-m-d",strtotime($start_date));
			}
		   
			if($end_date){
				$end_date = str_replace('/', '-', $end_date);
				$end_date =  date("Y-m-d",strtotime($end_date));
			}

			//long term assets or fixed asset
			$template['fixed'] = $this->Accountsreports_model->getFixedAssetsDetails($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']); die;

			//short term assets or current assets
			$template['current'] = $this->Accountsreports_model->getCurrentAssetsDetails($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['current']); die;

			//longterm liability
			$template['liabilty'] = $this->Accountsreports_model->getFixedLiabiltyDetails($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['liabilty']); die;

			//current liability
			$template['currentliabilty'] = $this->Accountsreports_model->getCurrentLiabiltyDetails($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['currentliabilty']); die;

			//all direct income
			$template['direct_income'] = $this->Accountsreports_model->getAllDirectincomes($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['direct_income']); die;

			//all indirect income
			$template['indirect_income'] = $this->Accountsreports_model->getAllinDirectincomes($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['indirect_income']); die;

			//all direct expense
			$template['direct_exp'] = $this->Accountsreports_model->getAllDirectexpenses($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['direct_exp']); die;

			//all indirect expense
			$template['indirect_exp'] = $this->Accountsreports_model->getAllinDirectexpenses($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['indirect_exp']); die;
			
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['addition_data'] = $this->Accountsreports_model->getGroupsList();
			//var_dump($template['addition_data']);die();
			$template['body'] = 'Accounts/Trialbalance/list';
			$template['script'] = 'Accounts/Trialbalance/script';
			$this->load->view('template', $template);
		}
		public function Balancesheet()
		{
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			if($this->session->userdata('user_type')=='C'){
				$cmp_ide = $this->session->userdata('cmp_id');
				$template['comapny1'] = $this->General_model->get_row('tbl_companyinfo','cmp_id',$cmp_ide);
			}	
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Balancesheet/list';
			$template['script'] = 'Accounts/Balancesheet/script';
			$this->load->view('template', $template);
		}
		public function getBalancesheet()
		{
			if($this->session->userdata('user_type')=='C'){
				$cmp = $this->session->userdata('cmp_id');
				$template['comapny1'] = $this->General_model->get_row('tbl_companyinfo','cmp_id',$cmp);
			}
			else{
				$cmp=$this->input->post('company');	
			}	
			
			$template['company_id'] = $this->input->post('company');
			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
			$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        	$end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
			if($start_date){
				$start_date = str_replace('/', '-', $start_date);
				$start_date =  date("Y-m-d",strtotime($start_date));
			}
		   
			if($end_date){
				$end_date = str_replace('/', '-', $end_date);
				$end_date =  date("Y-m-d",strtotime($end_date));
			}

			//long term assets or fixed 
			$template['fixed'] = $this->Accountsreports_model->getFixedAssets($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']);die;
			$hello = $this->db->last_query();
			//short term assets or current assetsasset
			$template['current'] = $this->Accountsreports_model->getCurrentAssets($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']);die;
			// print_r($template['current']);die();

			//longterm liability
			$template['liabilty'] = $this->Accountsreports_model->getFixedLiabilty($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']);die;
			//current liability
			$template['currentliabilty'] = $this->Accountsreports_model->getCurrentLiabilty($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']);die;
			@$template['capital'] = $this->Accountsreports_model->getCapital($cmp,$start_date,$end_date);
			//var_dump($template['fixed']);die; 
			//print_r($template['capital']);die();
			
			$template['profitloss'] = $this->Accountsreports_model->getProfitloss($cmp,$fyr,$start_date,$end_date);
			//var_dump($template['fixed']);die;
			if($this->session->userdata('user_type')=='C'){
				$id = $this->session->userdata('id');
				$template['color_change'] = $this->General_model->get_row('tbl_color','company_id_fk',$id);
				}
			$template['fin_year']  = $this->General_model->fin_year();
			$template['company']=$this->General_model->getCompanies();
			$template['body'] = 'Accounts/Balancesheet/list';
			$template['script'] = 'Accounts/Balancesheet/script';
			$this->load->view('template', $template);
		}
		public function addProfit()
		{
			$profit=$this->input->post('profit');
			$loss=$this->input->post('loss');
			$cmp=$this->input->post('cmp');

			$fnyr = $this->General_model->fin_year();
			if(isset($fnyr->finyear_id)){ $fyr = $fnyr->finyear_id; } else{ $fyr = 0;}
			if($profit != 0 || $loss != 0)
			{
				if($profit != 0)
				{
					$check=$this->Accountsreports_model->checkProfitexist($cmp,$fyr);
					$data=array(
						'cmp_id_fk'=> $cmp,
						'amount' => $profit,
						'profit_loss' => 1,
						'fin_year' => $fyr
					);
					if ($check == 0) 
					{
						$this->General_model->add('tbl_profit',$data);
					}
					else
					{
						$this->General_model->updat('tbl_profit',$data,'cmp_id_fk',$cmp,'fin_year',$fyr);
					}
				}
				else
				{
					$check=$this->Accountsreports_model->checkProfitexist($cmp,$fyr);
					$data=array(
						'cmp_id_fk'=> $cmp,
						'amount' => $loss,
						'profit_loss' => 2,
						'fin_year' => $fyr
					);
					if ($check == 0) 
					{
						$this->General_model->add('tbl_profit',$data);
					}
					else
					{
						$this->General_model->updat('tbl_profit',$data,'cmp_id_fk',$cmp,'fin_year',$fyr);
					}
				}
			}
		}
}