<?php
class Accountsreports_model extends CI_Model
{
	public function getDebitSide($company,$ledgerhead,$ledger_date)
	{
		$this->db->select('journal_inv');
		$this->db->where('company_id_fk',$company);
		$this->db->where('ledger_head_id',$ledgerhead);
		$this->db->where('journal_date',$ledger_date);
		$this->db->where('journal_status',1);
		$journal_inv = $this->db->get('tbl_journal')->result();

		// print_r($journal_inv);die();
		$k=0;
		for ($i=0; $i < count($journal_inv) ; $i++) 
		{
			$this->db->select('*');
			$this->db->from('tbl_journal');
			$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
			$this->db->where('ledger_head_id',$ledgerhead);
			$this->db->where('credit_amt !=',0);
			$resu = $this->db->get();
			$d = $resu->result();
			$res = $resu->num_rows();
			if($res != 1)
			{
				$this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\') as journal_date');
				$this->db->from('tbl_journal');
				$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
				$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
				$this->db->where('ledger_head_id !=',$ledgerhead);
				$this->db->where('credit_amt !=', 0);
				$this->db->where('journal_status',1);
				$result = $this->db->get()->result();
				// echo $this->db->last_query();
				// print_r($result);die();
				// $data=array();
				// echo count($result);die;
				if($result)
				{
					for ($z=0; $z < count($result); $z++)
					{
						if(count($result) == 1)
						{
							$this->db->select('debit_amt');
							$this->db->from('tbl_journal');
							$this->db->where('ledger_head_id',$ledgerhead);
							$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
							$amt = $this->db->get()->row()->debit_amt;
						}
						else
						{
							$amt = $result[$z]->credit_amt;
						}

						$data[$k] = array(
								             'ledger_head' => $result[$z]->ledger_head,
								             'credit_amt'   => $amt,
								             'journal_date'    => $result[$z]->journal_date
								         );
						$k=$k+1;
					}
				}
				else
				{
					return $data=NULL;
				}
			}
		}

		if (isset($data)) {
			
			return $data;
		}
		else
		{
			return $data=array();
		}
		
	}
	public function getCreditSide($company,$ledgerhead,$ledger_date)
	{
		$this->db->select('journal_inv');
		$this->db->where('company_id_fk',$company);
		$this->db->where('ledger_head_id',$ledgerhead);
		$this->db->where('journal_date',$ledger_date);
		$this->db->where('journal_status',1);
		$journal_inv = $this->db->get('tbl_journal')->result();
		$k=0;
		for ($i=0; $i < count($journal_inv) ; $i++) 
		{
			$this->db->select('*');
			$this->db->from('tbl_journal');
			$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
			$this->db->where('ledger_head_id',$ledgerhead);
			$this->db->where('debit_amt !=',0);
			$resu = $this->db->get();
			$res = $resu->num_rows();
			if($res != 1)
			{ 
				$this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\') as journal_date');
				$this->db->from('tbl_journal');
				$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
				$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
				$this->db->where('ledger_head_id !=',$ledgerhead);
				$this->db->where('debit_amt !=', 0);
				$this->db->where('journal_status',1);
				$result = $this->db->get()->result();
				
				if($result)
				{
					for ($z=0; $z < count($result); $z++)
					{
						if(count($result) == 1)
						{
							$this->db->select('credit_amt');
							$this->db->from('tbl_journal');
							$this->db->where('ledger_head_id',$ledgerhead);
							$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
							$amt = $this->db->get()->row()->credit_amt;
						}
						else
						{
							$amt = $result[$z]->debit_amt;
						}

						$data[$k] = array(
								             'ledger_head' => $result[$z]->ledger_head,
								             'debit_amt'   => $amt,
								             'journal_date'=> $result[$z]->journal_date
								         );
						$k=$k+1;
					}
				}
				else
				{
					return $data=NULL;
				}
			}
		}
		if (isset($data)) {
			
			return $data;
		}
		else
		{
			return $data=array();
		}
		
	}
	public function getBalance($company,$ledgerhead,$date_from,$date_to)
	{
		$yesterday = date("Y-m-d",strtotime ( '-1 day' , strtotime ( $date_from ) )) ;
		$this->db->select('*');
		$this->db->from('tbl_ledgerbalance');
		$this->db->where('date',$yesterday);
        $this->db->where('ledgerbalance_status',1);
        $this->db->where('ledgerhead_id_fk',$ledgerhead);
        $this->db->where('company_id_fk',$company);
        $data = $this->db->get()->result();
        if ($data == null) 
        {
        	$this->db->select('date');
			$this->db->from('tbl_ledgerbalance');
			$this->db->where('company_id_fk',$company);
			$this->db->where('ledgerhead_id_fk',$ledgerhead);
			$this->db->where('ledgerbalance_status',1);
			$this->db->where('date <',$date_from);
			$this->db->order_by('date', 'desc');
			$this->db->limit(1);
			$yesterday = $this->db->get()->result();
			// echo $this->db->last_query();die();
			// $yesterday = $yesterday[0]->date;die;
			if( $yesterday == null)
			{
				return $result = array('balance'=> '0','debit_credit'=> '0');
			}
			else if( $yesterday[0]->date == $date_from)
			{
				return $result = array('balance'=> '0','debit_credit'=> '0');
			}
			else
			{
				$yesterday = $yesterday[0]->date;

				$this->db->select('*');
				$this->db->where('date',$yesterday);
		        $this->db->where('ledgerbalance_status',1);
		        $this->db->where('ledgerhead_id_fk',$ledgerhead);
		        $this->db->where('company_id_fk',$company);
		        $data = $this->db->get('tbl_ledgerbalance')->result();
		        if($data == null)
		        {
		        	return $result = array('balance'=> '0','debit_credit'=> '0');
		        }
		        else
		        {
		        	return $result = array('balance'=>$data[0]->balance,'debit_credit'=>$data[0]->debit_credit);
		        }
			}
        }
        else
        {
        	return $result = array('balance'=>$data[0]->balance,'debit_credit'=>$data[0]->debit_credit);
        }	
	}
	
	public function GetBankheads()
	{
		$this->db->select('*');
		$this->db->where('group_id_fk',12);
		return $this->db->get('tbl_ledgerhead')->result();
	}
	public function GetDaybookheads()
	{
		$array = array(12,13);
		$this->db->select('*');
		$this->db->where_in('group_id_fk',$array);
		return $this->db->get('tbl_ledgerhead')->result();
	}
	public function getDaybook($company,$ledger_date,$ledgerhead)
	{
		$this->db->select('journal_inv');
		$this->db->where('company_id_fk',$company);
		$this->db->where('ledger_head_id',$ledgerhead);
		$this->db->where('journal_date',$ledger_date);
		$this->db->where('journal_status',1);
		$journal_inv = $this->db->get('tbl_journal')->result();
		$k=0;
		for ($i=0; $i < count($journal_inv) ; $i++) 
		{
			$this->db->select('*');
			$this->db->from('tbl_journal');
			$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
			$this->db->where('ledger_head_id',$ledgerhead);
			$result = $this->db->get()->result();
			
			if ($result[0]->debit_amt == 0) 
			{
				//credit entry
				$this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\') as journal_date');
				$this->db->from('tbl_journal');
				$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
				$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
				$this->db->where('ledger_head_id !=',$ledgerhead);
				$this->db->where('debit_amt !=',0);
				$this->db->where('journal_status',1);
				$query = $this->db->get()->result();
				if($query)
				{
					$data[$k] = array(
					             'ledger_head' => $query[0]->ledger_head,
					             'debit_amt'   => $query[0]->credit_amt,
					             'credit_amt'  => $result[0]->credit_amt,
					             'journal_date'=> $query[0]->journal_date
								);
				}
			}
			else if ($result[0]->credit_amt == 0) 
			{
				// debit entry
				$this->db->select('*,DATE_FORMAT(journal_date,\'%d/%m/%Y\') as journal_date');
				$this->db->from('tbl_journal');
				$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
				$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
				$this->db->where('ledger_head_id !=',$ledgerhead);
				$this->db->where('credit_amt !=',0);
				$this->db->where('journal_status',1);
				$response = $this->db->get()->result();
				if($response)
				{
					$data[$k] = array(
					             'ledger_head' => $response[0]->ledger_head,
					             'debit_amt'   => $result[0]->debit_amt,
					             'credit_amt'  => $response[0]->debit_amt,
					             'journal_date'=> $response[0]->journal_date
								);
				}
			}
			$k=$k+1;
		}		
		if(isset($data))
		{
			return $data;
		}
		else
		{
			return $data=NULL;
		}
	}

	public function getExpenseReport($cmp)
	{
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
	}
	public function getExpgroups()
	{
		$this->db->select('group_id');
		$this->db->where('type_id_fk',4);//expense
		$this->db->where('group_parent_id',0);
		return $this->db->get('tbl_groups')->result();
	}
	public function getExpsubgroups($sub)
	{
		$this->db->select('group_id');
		$this->db->where('type_id_fk',4);//expense
		$this->db->where('group_parent_id',$sub);
		return $this->db->get('tbl_groups')->result();
	}
	public function getLedgerheadss($subgroups,$cmp)
	{
		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$subgroups);
		return $this->db->get()->result();
	}
	public function getJournalsData($ledgerhead_id,$cmp)
	{
		$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',$ledgerhead_id);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('journal_status',1);
		$this->db->where('debit_amt !=',0);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}
	public function totalSalesret($cmp)
	{
		$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',11);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('journal_status',1);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}

	public function getTotalPurchases($cmp,$fyr)
	{
		$purchase_head = $this->config->item('purchasehead');

		$this->db->select('*,SUM(debit_amt) as sum_deb');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',$purchase_head);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('tbl_journal.fin_year',$fyr);
		$this->db->where('journal_status',1);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}
	public function getTotalPurchaseret($cmp,$fyr)
	{
		$purchaseret = $this->config->item('purchaseret');

		$this->db->select('*,SUM(credit_amt) as sum_cr');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',$purchaseret);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('tbl_journal.fin_year',$fyr);
		$this->db->where('journal_status',1);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}
	public function getTotalSales($cmp,$fyr)
	{
		$salehead = $this->config->item('salehead');

		$this->db->select('*,SUM(credit_amt) as sum_cr');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',$salehead);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('tbl_journal.fin_year',$fyr);
		$this->db->where('journal_status',1);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}
	public function getTotalSalesret($cmp,$fyr)
	{
		$saleheadret = $this->config->item('saleheadret');

		$this->db->select('*,SUM(debit_amt) as sum_deb');
		$this->db->from('tbl_journal');
		$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
		$this->db->where('ledger_head_id',$saleheadret);
		$this->db->where('tbl_journal.company_id_fk',$cmp);
		$this->db->where('tbl_journal.fin_year',$fyr);
		$this->db->where('journal_status',1);
		$this->db->group_by('ledger_head_id');
		return $response = $this->db->get()->result();
	}
	public function getAllDirectexp($cmp,$fyr)
	{
		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('group_id_fk',27);//direct exp
		$led = $this->db->get()->result();
		$z=0;$data=array();
		for ($i=0; $i < count($led); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$led[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$result = $this->db->get()->result();
			if($result)
			{
				for ($k=0; $k < count($result) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $result[$k]->ledger_head,
						             'debit_amt'   => $result[$k]->sum_deb,
									);
					$z=$z+1;
				}
			}	
		}
		return $data;
	}
	public function getAllinDirectexp($cmp)
	{
		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('group_id_fk',29);//indirect exp
		$led = $this->db->get()->result();
		$z=0;
		for ($i=0; $i < count($led); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$led[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$result = $this->db->get()->result();
			if($result)
			{
				for ($k=0; $k < count($result) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $result[0]->ledger_head,
						             'debit_amt'   => $result[0]->sum_deb,
									);
					$z=$z+1;
				}
				return $data;
			}
			else
			{
				return $data=array();
			}
			
		}
	}
	public function getAllDirectincome($cmp)
	{
		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('group_id_fk',25);//direct income
		$led = $this->db->get()->result();
		$z=0;
		for ($i=0; $i < count($led); $i++) 
		{ 
			$this->db->select('*,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$led[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$result = $this->db->get()->result();
			if($result)
			{
				for ($k=0; $k < count($result) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $result[0]->ledger_head,
						             'credit_amt'   => $result[0]->sum_cr,
									);
					$z=$z+1;
				}
				return $data;
			}
			else
			{
				return $data=array();
			}
		}
	}
	public function getAllinDirectincome($cmp)
	{
		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('group_id_fk',26);//indirect income
		$led = $this->db->get()->result();
		$z=0;
		for ($i=0; $i < count($led); $i++) 
		{ 
			$this->db->select('*,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$led[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$result = $this->db->get()->result();
			if($result)
			{
				for ($k=0; $k < count($result) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $result[0]->ledger_head,
						             'credit_amt'   => $result[0]->sum_cr,
									);
					$z=$z+1;
				}
				return $data;
			}
			else
			{
				return $data=array();
			}
		}
	}
	public function getFixedAssetsDetails($cmp,$fyr)
	{
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where('group_id_fk',17);//17 fixed assest
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
				
			}
		}
		return $data;
	}
	public function getCurrentAssetsDetails($cmp,$fyr)
	{
		$array = array(12,13,14,15,16);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current assets
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die;
		$z=0;
		$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
		}
		return $data;
	}
	public function getCurrentLiabiltyDetails($cmp,$fyr)
	{
		$array = array(20,21);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current liability
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
				
			}
		}
		return $data;
	}
	public function getFixedLiabiltyDetails($cmp,$fyr)
	{
		$array = array(19);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current liability
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
		}
		return $data;
	}
	public function getAllDirectincomes($cmp,$fyr)
	{
		$array = array(24,25);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current liability
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
		}
		return $data;
	}
	public function getAllinDirectincomes($cmp,$fyr)
	{
		$array = array(26);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current liability
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
		}
		return $data;	
	}
	public function getAllDirectexpenses($cmp,$fyr)
	{
		// $array = array(27,28);
		$array=array();
		$this->db->select('group_id');
		$this->db->where('group_parent_id',10);//direcr exp
		$group_by=$this->db->get('tbl_groups')->result();
		if($group_by)
		{
			for ($p=0; $p < count($group_by) ; $p++) 
			{ 
				$array[$p]=$group_by[$p]->group_id;	
			}
		}
		// print_r($array);die;

		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);die;
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
			else
			{
				$maxdate=$this->db->select_max('date')->where('ledgerhead_id_fk',$result[$i]->ledgerhead_id)->get('tbl_ledgerbalance')->row()->date;
				$this->db->select('*');
				$this->db->from('tbl_ledgerbalance');
				$this->db->join('tbl_ledgerhead','ledgerhead_id_fk = ledgerhead_id');
				$this->db->where('ledgerhead_id_fk',$result[$i]->ledgerhead_id);
				$this->db->where('tbl_ledgerbalance.company_id_fk',$cmp);
				$this->db->where('tbl_ledgerbalance.date',$maxdate);
				$this->db->where('tbl_ledgerbalance.ledgerbalance_status',1);
				$abc=$this->db->get()->result();
				if($abc)
				{
					for ($m=0; $m < count($abc) ; $m++) 
					{ 
						$data[$z] = array(
						             'ledger_head' => $abc[$m]->ledger_head,
						             'debit_amt' => $abc[$m]->balance,
						             'credit_amt'   => 0,
									);
						$z=$z+1;
					}
				}	
			}
		}
		return $data;
	}
	public function getAllinDirectexpenses($cmp,$fyr)
	{
		$array = array(29);
		$this->db->select('*');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('company_id_fk',$cmp);
		$this->db->where_in('group_id_fk',$array);//current liability
		$this->db->where('ledgerhead_status',1);
		$result = $this->db->get()->result();
		// print_r($result);die();
		$z=0;$data=array();
		for ($i=0; $i < count($result); $i++) 
		{ 
			$this->db->select('*,SUM(debit_amt) as sum_deb,SUM(credit_amt) as sum_cr')->from('tbl_journal');
			$this->db->join('tbl_ledgerhead','ledger_head_id = ledgerhead_id');
			$this->db->where('ledger_head_id',$result[$i]->ledgerhead_id);
			$this->db->where('tbl_journal.company_id_fk',$cmp);
			$this->db->where('tbl_journal.fin_year',$fyr);
			$this->db->where('journal_status',1);
			$this->db->group_by('ledger_head_id');
			$response = $this->db->get()->result();
			// echo $this->db->last_query();
			// print_r($response);
			if($response)
			{
				for ($k=0; $k < count($response) ; $k++) 
				{ 
					$data[$z] = array(
						             'ledger_head' => $response[$k]->ledger_head,
						             'debit_amt' => $response[$k]->sum_deb,
						             'credit_amt'   => $response[$k]->sum_cr,
									);
					$z=$z+1;
				}
			}
		}
		return $data;
	}
	public function getFixedAssets($cmp,$fyr)
	{
		$result=array();

		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where('group_id_fk',17);//17 fixed assest
		$this->db->where('ledgerhead_status',1);
		$ledgerhead_id = $this->db->get()->result();
		if ($ledgerhead_id) 
		{
			$k=0;
			for ($i=0; $i < count($ledgerhead_id); $i++) 
			{ 
				$this->db->select_max('date');
				$this->db->from('tbl_ledgerbalance');
				$this->db->where('company_id_fk',$cmp);
				$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
				$date=$this->db->get()->row()->date;
				if ($date) 
				{
					$this->db->select('tbl_ledgerhead.ledger_head,tbl_ledgerbalance.balance');
					$this->db->from('tbl_ledgerbalance');
					$this->db->join('tbl_ledgerhead','tbl_ledgerhead.ledgerhead_id=tbl_ledgerbalance.ledgerhead_id_fk','left');
					$this->db->where('tbl_ledgerbalance.company_id_fk',$cmp);
					$this->db->where('date',$date);
					$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
					$response = $this->db->get()->row();
					if($response)
					{
						$result[$k]=$response;
					}
				}
				$k=$k+1;
			}
		}
		
		return $result;
	}
	public function getCurrentAssets($cmp,$fyr)
	{
		$result=array();
		$array = array(12,13,14,15,16);

		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where_in('group_id_fk',$array);
		$this->db->where('ledgerhead_status',1);
		$ledgerhead_id = $this->db->get()->result();
		if ($ledgerhead_id) 
		{
			$k=0;
			for ($i=0; $i < count($ledgerhead_id); $i++) 
			{ 
				$this->db->select_max('date');
				$this->db->from('tbl_ledgerbalance');
				$this->db->where('company_id_fk',$cmp);
				$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
				$date=$this->db->get()->row()->date;
				if ($date) 
				{
					$this->db->select('tbl_ledgerhead.ledger_head,tbl_ledgerbalance.balance');
					$this->db->from('tbl_ledgerbalance');
					$this->db->join('tbl_ledgerhead','tbl_ledgerhead.ledgerhead_id=tbl_ledgerbalance.ledgerhead_id_fk','left');
					$this->db->where('tbl_ledgerbalance.company_id_fk',$cmp);
					$this->db->where('date',$date);
					$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
					$response = $this->db->get()->row();
					if($response)
					{
						$result[$k]=$response;
					}
				}
				$k=$k+1;
			}
		}
		return $result;
		
	}
	public function getFixedLiabilty($cmp,$fyr)
	{
		$result=array();
		// $array = array(19);

		// $this->db->select('ledgerhead_id');
		// $this->db->from('tbl_ledgerhead');
		// $this->db->where_in('group_id_fk',$array);
		// $ledgerhead_id = $this->db->get()->result();
		// if ($ledgerhead_id) 
		// {
		// 	$k=0;
		// 	for ($i=0; $i < count($ledgerhead_id); $i++) 
		// 	{ 
		// 		$this->db->select_max('date');
		// 		$this->db->from('tbl_ledgerbalance');
		// 		$this->db->where('company_id_fk',$cmp);
		// 		$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
		// 		$date=$this->db->get()->row()->date;
		// 		if ($date) 
		// 		{
		// 			$this->db->select('tbl_ledgerhead.ledger_head,tbl_ledgerbalance.balance');
		// 			$this->db->from('tbl_ledgerbalance');
		// 			$this->db->join('tbl_ledgerhead','tbl_ledgerhead.ledgerhead_id=tbl_ledgerbalance.ledgerhead_id_fk','left');
		// 			$this->db->where('tbl_ledgerbalance.company_id_fk',$cmp);
		// 			$this->db->where('date',$date);
		// 			$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
		// 			$response = $this->db->get()->row();
		// 			if($response)
		// 			{
		// 				$result[$k]=$response;
		// 			}
		// 		}
		// 		$k=$k+1;
		// 	}
		// }
		
		return $result;
		
	}
	public function getCurrentLiabilty($cmp,$fyr)
	{
		$result=array();
		$array = array(20,21);

		$this->db->select('ledgerhead_id');
		$this->db->from('tbl_ledgerhead');
		$this->db->where_in('group_id_fk',$array);
		$this->db->where('ledgerhead_status',1);
		$ledgerhead_id = $this->db->get()->result();
		if ($ledgerhead_id) 
		{
			$k=0;
			for ($i=0; $i < count($ledgerhead_id); $i++) 
			{ 
				$this->db->select_max('date');
				$this->db->from('tbl_ledgerbalance');
				$this->db->where('company_id_fk',$cmp);
				$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
				$date=$this->db->get()->row()->date;
				if ($date) 
				{
					$this->db->select('tbl_ledgerhead.ledger_head,tbl_ledgerbalance.balance');
					$this->db->from('tbl_ledgerbalance');
					$this->db->join('tbl_ledgerhead','tbl_ledgerhead.ledgerhead_id=tbl_ledgerbalance.ledgerhead_id_fk','left');
					$this->db->where('tbl_ledgerbalance.company_id_fk',$cmp);
					$this->db->where('date',$date);
					$this->db->where('ledgerhead_id_fk',$ledgerhead_id[$i]->ledgerhead_id);
					$response = $this->db->get()->row();
					if($response)
					{
						$result[$k]=$response;
					}
				}
				$k=$k+1;
			}
		}
		return $result;
	}
	public function checkProfitexist($cmp,$fyr)
	{
		$this->db->select('*');
		$this->db->where('cmp_id_fk',$cmp);
		$this->db->where('fin_year',$fyr);
		return $this->db->get('tbl_profit')->num_rows();
	}
	public function getCapital($cmp)
	{
		$this->db->select('opening_bal');
		$this->db->where('group_id_fk',19);//capital
		$this->db->where('company_id_fk',$cmp);
		return $this->db->get('tbl_ledgerhead')->row()->opening_bal;
	}
	public function getProfitloss($cmp,$fyr)
	{
		$this->db->select('*');
		$this->db->where('cmp_id_fk',$cmp);
		$this->db->where('fin_year',$fyr);
		return $this->db->get('tbl_profit')->result();
	}
	public function ledger($company,$ledgerhead,$date_from,$date_to)
	{
		$response=array();$z=0;

		$this->db->select('journal_inv,debit_amt,credit_amt');
		$this->db->where('company_id_fk',$company);
		$this->db->where('ledger_head_id',$ledgerhead);
		$this->db->where('journal_date >=',$date_from);
		$this->db->where('journal_date <=',$date_to);
		$this->db->where('journal_status',1);
		$journal_inv = $this->db->get('tbl_journal')->result();

		// echo $this->db->last_query();die;
		if($journal_inv)
		{
			for ($i=0; $i < count($journal_inv) ; $i++) 
			{
				$this->db->select('*');
				$this->db->from('tbl_journal');
				$this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
				$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
				$this->db->where('ledger_head_id !=',$ledgerhead);
				$data=$this->db->get();
				$count=$data->num_rows();
				$datas=$data->result();
				if($count == 1)
				{
					
					// for ($k=0; $k < count($data); $k++) 
					// { 
						$response[$z]=array('ledgerhead'=>$datas[0]->ledger_head,'debit'=>$journal_inv[$i]->debit_amt,'credit'=>$journal_inv[$i]->credit_amt,'journal_inv'=>$datas[0]->journal_inv,'date'=>$datas[0]->journal_date);
						$z=$z+1;
					/*}*/
					
				}
				else
				{
					if($journal_inv[$i]->credit_amt != 0)
					{
						$this->db->select('*');
						$this->db->from('tbl_journal');
						$this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
						$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
						$this->db->where('debit_amt !=',0);
						$details=$this->db->get()->result();

						$response[$z]=array('ledgerhead'=>$details[0]->ledger_head,'debit'=>$journal_inv[$i]->debit_amt,'credit'=>$journal_inv[$i]->credit_amt,'journal_inv'=>$details[0]->journal_inv,'date'=>$details[0]->journal_date);
						$z=$z+1;
					}
					else if($journal_inv[$i]->debit_amt != 0)
					{
						$this->db->select('*');
						$this->db->from('tbl_journal');
						$this->db->join('tbl_ledgerhead','ledgerhead_id = ledger_head_id');
						$this->db->where('journal_inv',$journal_inv[$i]->journal_inv);
						$this->db->where('credit_amt !=',0);
						$detailss=$this->db->get()->result();

						$response[$z]=array('ledgerhead'=>$detailss[0]->ledger_head,'debit'=>$journal_inv[$i]->debit_amt,'credit'=>$journal_inv[$i]->credit_amt,'journal_inv'=>$detailss[0]->journal_inv,'date'=>$detailss[0]->journal_date);
						$z=$z+1;
					}
				}
			}
			return $response;
		}
		else
		{
			return $response;
		}

	}
	// public function get_opening($cmp,$fyr)
	// {
	// 	$this->db->select('*');
	// 	$this->db->where('company_id_fk',$cmp);
	// 	$this->db->where()
	// }
	public function get_closingstock($cmp,$fyr)
	{
		$this->db->select('ledgerhead_id');
		$this->db->where('group_id_fk',14);
		$this->db->where('ledgerhead_status',1);
		$ledgerhead_id=$this->db->get('tbl_ledgerhead')->row()->ledgerhead_id;
		// echo $ledgerhead_id;die();

		$this->db->select('*');
		$this->db->from('tbl_ledgerbalance');
		$this->db->join('tbl_ledgerhead','ledgerhead_id_fk = ledgerhead_id');
		$this->db->where('ledgerhead_id_fk',$ledgerhead_id);
		$this->db->where('ledgerbalance_status',1);
		$result = $this->db->get()->result();
		if($result)
		{
			return $array=array('ledgerhead'=>$result[0]->ledger_head,'amount'=>$result[0]->balance);
		}
		else
		{
			$this->db->select('ledger_head');
			$this->db->where('group_id_fk',14);
			$ledgerhead=$this->db->get('tbl_ledgerhead')->row()->ledger_head;
			return $array=array('ledgerhead'=>$ledgerhead,'amount'=>0);
		}
	}
}