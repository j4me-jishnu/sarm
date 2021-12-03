<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profit&Loss Account</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-8">
              <h3>Trading&Profit&Loss Account</h3>  
            </div>
            <div class="col-sm-4">
              <small class="col-md-6">Financial Year: <?php if(isset($fin_year->fin_year)){echo $fin_year->fin_year;} ?></small>
            </div>
          </div>
        </div>
        <div class="box-body">
          <form method="post" action="<?php echo base_url(); ?>Profitloss/get">
            <div class="row">
              <div class="col-md-3">
                <?php if($this->session->userdata['user_type']!='C')
                { ?>
                  <div class="input-group margin">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary nohover">Company</button>
                    </div><!-- /btn-group -->
                      <select name="company" id="company" class="form-control" onchange="this.form.submit()">
                        <!-- <option></option> -->
                        <?php
                        foreach ($company as $row) 
                        {
                          ?>
                          <option value="<?php echo $row->cmp_id ?>" <?php if(isset($company_id)) if ($company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                <?php } ?>
              </div>
              <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button class="btn btn-primary nohover">Date From</button>
                  </div>
                    <input type="date" class="form-control" name="start_date">
                </div>
              </div>
              
              <div class="col-md-3" style="margin-left: 50px;">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button class="btn btn-primary nohover">Date To</button>
                  </div>
                    <input type="date" class="form-control" name="end_date">
                </div>
              </div>
              <div class="col-md-2">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <input type="submit" class="form-control btn btn-primary" name="submit" value="SUBMIT">
                  </div>
                </div>
              </div>
            </div>
          </form>
          <table id="area_table" align="center" width="800" class="table-bordered table-condensed">
            <thead>
              <tr>
                  <th>Particulars</th>
                  <th>Amount</th>
                  <th>Particulars</th>
                  <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (empty($purchase) && empty($sales) && empty($direct_income) && empty($indirect_income) && empty($direct_exp) && empty($indirect_exp)) 
              {
              ?>
                <tr>
                  <td colspan="4">Nodata found</td>
                </tr>
              <?php
              }
              else
              { $total_pur=0;$total_sale=0;
                ?>
                <tr>
                  <td colspan="2"><span style="font-style: italic;font-size: 15px;">Direct expenses</span></td>
                  <td><span style="font-style: italic;font-size: 15px;">Direct Income</span></td>
                </tr>
                <tr>
                <?php
                if(! empty($purchase))
                {
                  if (! empty($purchaseret)) 
                  {
                   ?>
                      <td>
                        <div class="row">
                          <div class="col-sm-6">
                            To <?php if(isset($purchase[0]->ledger_head)) echo $purchase[0]->ledger_head ?>
                            <br>
                            To <?php if(isset($purchaseret[0]->ledger_head)) echo $purchaseret[0]->ledger_head ?>
                          </div>
                          <div class="col-sm-6" align="right">
                            <?php if(isset($purchase[0]->sum_deb)) echo $purchase[0]->sum_deb; ?>
                            <br>
                            <?php if(isset($purchaseret[0]->sum_cr)) echo $purchaseret[0]->sum_cr; ?>
                            <hr>
                          </div>
                        </div>   
                      </td>
                      <td>
                        <br><br>
                        <?php echo $total_pur=$purchase[0]->sum_deb-$purchaseret[0]->sum_cr; ?>
                      </td>
                   <?php 
                  }
                  else
                  {
                    ?>
                      <td>
                        <div class="row">
                          <div class="col-sm-6">
                            To <?php if(isset($purchase[0]->ledger_head)) echo $purchase[0]->ledger_head ?>
                            <br>
                          </div>
                          <div class="col-sm-6" align="right">
                            <?php if(isset($purchase[0]->sum_deb)) echo $purchase[0]->sum_deb; ?>
                            <br>
                            <hr>
                          </div>
                        </div>   
                      </td>
                      <td>
                        <br><br>
                        <?php echo $total_pur=$purchase[0]->sum_deb; ?>
                      </td>
                   <?php
                  }
                }
                if(! empty($sales))
                {
                  if(! empty($salesret))
                  {
                    ?>
                      <td>
                      <div class="row">
                        <div class="col-sm-6">
                           <?php if(isset($sales[0]->ledger_head)) echo $sales[0]->ledger_head ?>
                          <br>
                           <?php if(isset($salesret[0]->ledger_head)) echo $salesret[0]->ledger_head ?>
                        </div>
                        <div class="col-sm-6" align="right">
                          <?php if(isset($sales[0]->sum_cr)) echo $sales[0]->sum_cr; ?>
                          <br>
                          <?php if(isset($salesret[0]->sum_deb)) echo $salesret[0]->sum_deb; ?>
                          <hr>
                        </div>
                      </div>
                      </td>
                      <td>
                        <br><br>
                        <?php if(isset($salesret[0]->sum_deb) && isset($sales[0]->sum_cr)) echo $total_sale=$sales[0]->sum_cr-$salesret[0]->sum_deb; ?>
                      </td>
                   <?php
                  }
                  else
                  {
                    ?>
                    <td>
                      <div class="row">
                        <div class="col-sm-6">
                           <?php if(isset($sales[0]->ledger_head)) echo $sales[0]->ledger_head ?>
                          <br>
                        </div>
                        <div class="col-sm-6" align="right">
                          <?php if(isset($sales[0]->sum_cr)) echo $sales[0]->sum_cr; ?>
                          <br>
                          <hr>
                        </div>
                      </div>
                      </td>
                      <td>
                        <br><br>
                        <?php echo $total_sale=$sales[0]->sum_cr; ?>
                      </td>
                   <?php
                  }
                }
                ?>
                </tr>
                <?php
                if (!empty($direct_exp) || !empty($direct_income)) 
                {
                  $direct_exp_count = count($direct_exp);
                  $direct_income_count = count($direct_income);
                  if ($direct_exp_count > $direct_income_count) 
                  {
                    $count = $direct_exp_count;
                  }
                  else if($direct_income_count > $direct_exp_count)
                  {
                    $count = $direct_income_count;
                  }
                  else
                  {
                    $count=$direct_exp_count;
                  }

                  for ($i=0; $i < $count; $i++) 
                  { 
                  ?>
                  <tr>
                    <td>To <?php if(isset($direct_exp[$i]->ledger_head)) echo $direct_exp[$i]->ledger_head; ?></td>
                    <td><?php if(isset($direct_exp[$i]->debit)) echo round($direct_exp[$i]->debit,2); ?></td>
                    <td> <?php if(isset($direct_income[$i]->ledger_head)) echo $direct_income[$i]->ledger_head;?></td>
                    <td><?php if(isset($direct_income[$i]->credit)) echo round($direct_income[$i]->credit,2); ?></td>
                  </tr>
                  <?php
                  if(isset($direct_exp[$i]->debit)){$total_pur = $total_pur + $direct_exp[$i]->debit;}
                  if(isset($direct_income[$i]->credit)){$total_sale = $total_sale + $direct_income[$i]->credit;} 
                  }
                }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td> <?php echo $closing['ledgerhead'] ?></td>
                  <td><?php echo $closing['amount'];$total_sale = $total_sale + $closing['amount']; ?></td>
                </tr>
                <?php
                if($total_sale > $total_pur)
                {
                ?>
                  <tr>
                    <td><label>To Gross profit</label></td>
                    <td><?php echo $profit=$total_sale-$total_pur ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $total_sale; ?></td>
                    <td></td>
                    <td><?php echo $total_sale; ?></td>
                  </tr>
                <?php
                }
                else if($total_pur > $total_sale)
                {
                ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><label> Gross loss</label></td>
                    <td><?php echo $loss=$total_pur-$total_sale ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $total_pur; ?></td>
                    <td></td>
                    <td><?php echo $total_pur; ?></td>
                  </tr>
                <?php 
                }
                ?>
                  <tr>
                    <td colspan="4" style="height: 50px;"></td>
                  </tr>

                <?php
                if(isset($profit))
                {
                ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td> Gross profit b/d</td>
                    <td><?php echo $profit;$loss=0; ?></td>
                  </tr>
                <?php
                }
                else if(isset($loss))
                {
                ?>
                  <tr>
                    <td>To Gross loss b/d</td>
                    <td><?php echo $loss;$profit=0; ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="2"><span style="font-style: italic;font-size: 15px;">Indirect expenses</span></td>
                    <td><span style="font-style: italic;font-size: 15px;">Indirect Income</span></td>
                </tr>
                <?php
                if (!empty($indirect_exp) || !empty($indirect_income)) 
                {
                  $indirect_exp_count = count($indirect_exp);
                  $indirect_income_count = count($indirect_income);
                  if ($indirect_exp_count > $indirect_income_count) 
                  {
                    $count = $indirect_exp_count;
                  }
                  else if($indirect_income_count > $indirect_exp_count)
                  {
                    $count = $indirect_income_count;
                  }
                  else
                  {
                    $count = $indirect_income_count;
                  }
                  $netprofit=$profit;
                  $netloss=$loss;
                  for ($i=0; $i < $count; $i++) 
                  { 
                  ?>
                  <tr>
                    <td>To <?php if(isset($indirect_exp[$i]->ledger_head)) echo $indirect_exp[$i]->ledger_head; ?></td>
                    <td><?php if(isset($indirect_exp[$i]->debit)) echo round($indirect_exp[$i]->debit,2); ?></td>
                    <td> <?php if(isset($indirect_income[$i]->ledger_head)) echo $indirect_income[$i]->ledger_head;?></td>
                    <td><?php if(isset($indirect_income[$i]->credit)) echo round($indirect_income[$i]->credit,2); ?></td>
                  </tr>
                  <?php
                  // if(isset($indirect_exp[$i]['debit_amt'])){$profit = $profit + $direct_exp[$i]['debit_amt'];}
                  // if(isset($indirect_income[$i]['credit_amt'])){$loss = $loss + $direct_income[$i]['credit_amt'];}
                  if(isset($indirect_exp[$i]->debit)){$netloss = $netloss + $indirect_exp[$i]->debit;}
                  if(isset($indirect_income[$i]->credit)){$netprofit = $netprofit  + $indirect_income[$i]->credit;}

                  }
                }
                // echo $netprofit;echo "-";echo $netloss;
                if($netprofit < $netloss)
                {
                ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><label> Net loss c/d</label></td>
                    <td><?php echo $netloss-$netprofit; ?><input type="hidden" name="loss" id="loss" value="<?php echo $netloss-$netprofit; ?>"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $netloss; ?></td>
                    <td></td>
                    <td><?php echo $netloss; ?></td>
                  </tr>
                <?php  
                }
                else
                {
                ?>
                  <tr>
                    <td><label>To Net Profit c/d</label></td>
                    <td><?php echo $netprofit-$netloss; ?><input type="hidden" name="profit" id="profit" value="<?php echo $netprofit-$netloss; ?>"></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $netprofit; ?></td>
                    <td></td>
                    <td><?php echo $netprofit; ?></td>
                  </tr>
                <?php
                }
              
              } 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
</div>
