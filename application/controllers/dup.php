<?php
for ($i=0; $i < $count ; $i++) 
			{
				// echo $ledgerhead[$i];
				$debit = $this->Accountsreports_model->getDebitSide($this->input->post('company'),$ledgerhead[$i],$journal_date);
				$credit = $this->Accountsreports_model->getCreditSide($this->input->post('company'),$ledgerhead[$i],$journal_date);
				$balance = $this->Accountsreports_model->getBalance($this->input->post('company'),$ledgerhead[$i],$journal_date);

				$company=$this->input->post('company');
				if (isset($debit) == NULL && isset($credit) == NULL) 
				{
					$array=array(
								'company_id_fk'=>$company,
								'ledgerhead_id_fk'=>$ledgerhead[$i],
								'date'=>$journal_date,
								'balance'=>0,
								'debit_credit'=>0,
								'ledgerbalance_status'=>1
							);
					$this->db->insert('tbl_ledgerbalance',$array);
				}
				else
				{
					$deb_count = count($debit);
	                $cre_count = count($credit);
	                if ($deb_count > $cre_count) 
	                {
	                	$counts = $deb_count;
	                }
	                else if($cre_count > $deb_count)
	                {
	                    $counts = $cre_count;
	                }
	                else
	                {
	                    $counts = $cre_count;
	                }


	                if($balance['debit_credit'] == 0)
                  {
                    $deb_total=0;$cred_total=0;
                  }
                  else if($balance['debit_credit'] == 2)
                  {
                  	if(isset($balance['balance']))
                  	{ 
                  		$deb_total=$balance['balance'];
                  		$cred_total = 0; 
                  	}
                  }
                  else if($balance['debit_credit'] == 1)
                  {
                  	if(isset($balance['balance']))
                  	{ 
                  		$cred_total=$balance['balance'];
                  		$deb_total=0; 
                  	}
                  }


	                for ($k=0; $k < $counts ; $k++) 
	                { 
	                	if(isset($debit[$k]['credit_amt'])){$deb_total = $deb_total + $debit[$k]['credit_amt'];}
                  		if(isset($credit[$k]['debit_amt'])){$cred_total = $cred_total + $credit[$k]['debit_amt'];}

                  		if($cred_total > $deb_total)
                  		{
                  			$array=array(
												'company_id_fk'=>$company,
												'ledgerhead_id_fk'=>$ledgerhead[$i],
												'date'=>$journal_date,
												'balance'=>$cred_total-$deb_total,
												'debit_credit'=>1,
												'ledgerbalance_status'=>1
												);
                  			$check_res= $this->Accounts_model->checkInledgerBalance($company,$ledgerhead[$i],$journal_date);
                  			if($check_res == 0)
                  			{
                  				$response = $this->General_model->add('tbl_ledgerbalance',$array);
                  			}
                  			else
                  			{
                  				$response = $this->General_model->upda('tbl_ledgerbalance',$array,'date',$journal_date,'ledgerhead_id_fk',$ledgerhead[$i],'company_id_fk',$company);
                  			}
                  		}
                  		else if($deb_total > $cred_total)
                  		{
                  			$array=array(
												'company_id_fk'=>$company,
												'ledgerhead_id_fk'=>$ledgerhead[$i],
												'date'=>$journal_date,
												'balance'=>$deb_total-$cred_total,
												'debit_credit'=>2,
												'ledgerbalance_status'=>1
												);
												$check_res= $this->Accounts_model->checkInledgerBalance($company,$ledgerhead[$i],$journal_date);
                  			if($check_res == 0)
                  			{
                  				$response = $this->General_model->add('tbl_ledgerbalance',$array);
                  			}
                  			else
                  			{
                  				$response = $this->General_model->upda('tbl_ledgerbalance',$array,'date',$journal_date,'ledgerhead_id_fk',$ledgerhead[$i],'company_id_fk',$company);
                  			} 
                  		}
	                }
				}
				// echo $i;
			}