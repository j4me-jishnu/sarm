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
                        <option></option>
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
              if (empty($purchase)) 
              {
              ?>
                <tr>
                  <td colspan="4">Nodata found</td>
                </tr>
              <?php
              }
              else
              {
              ?>
                <tr>
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
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                        By <?php if(isset($sales[0]->ledger_head)) echo $sales[0]->ledger_head ?>
                        <br>
                        By <?php if(isset($salesret[0]->ledger_head)) echo $salesret[0]->ledger_head ?>
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

                  for ($i=0; $i < count($count); $i++) 
                  { 
                  ?>
                  <tr>
                    <td>To <?php if(isset($direct_exp[$i]['ledger_head'])) echo $direct_exp[$i]['ledger_head']; ?></td>
                    <td><?php if(isset($direct_exp[$i]['debit_amt'])) echo $direct_exp[$i]['debit_amt']; ?></td>
                    <td>By <?php if(isset($direct_income[$i]['ledger_head'])) echo $direct_income[$i]['ledger_head'];?></td>
                    <td><?php if(isset($direct_income[$i]['credit_amt'])) echo $direct_income[$i]['credit_amt']; ?></td>
                  </tr>
                  <?php
                  if(isset($direct_exp[$i]['debit_amt'])){$total_pur = $total_pur + $direct_exp[$i]['debit_amt'];}
                  if(isset($direct_income[$i]['credit_amt'])){$total_sale = $total_sale + $direct_income[$i]['credit_amt'];} 
                  }
                }
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
                    <td><label>By Gross loss</label></td>
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
                    <td>By Gross profit b/d</td>
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

                  for ($i=0; $i < count($count); $i++) 
                  { 
                  ?>
                  <tr>
                    <td>To <?php if(isset($indirect_exp[$i]['ledger_head'])) echo $indirect_exp[$i]['ledger_head']; ?></td>
                    <td><?php if(isset($indirect_exp[$i]['debit_amt'])) echo $indirect_exp[$i]['debit_amt']; ?></td>
                    <td>By <?php if(isset($indirect_income[$i]['ledger_head'])) echo $indirect_income[$i]['ledger_head'];?></td>
                    <td><?php if(isset($indirect_income[$i]['credit_amt'])) echo $indirect_income[$i]['credit_amt']; ?></td>
                  </tr>
                  <?php
                  if(isset($indirect_exp[$i]['debit_amt'])){$profit = $profit + $direct_exp[$i]['debit_amt'];}
                  if(isset($indirect_income[$i]['credit_amt'])){$loss = $loss + $direct_income[$i]['credit_amt'];} 
                  }
                }
                if($profit > $loss)
                {
                ?>
                  <tr>
                    <td><label>To Net Profit c/d</label></td>
                    <td><?php echo $profit-$loss; ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $profit; ?></td>
                    <td></td>
                    <td><?php echo $profit; ?></td>
                  </tr>
                <?php  
                }
                else
                {
                ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td><label>By Net loss c/d</label></td>
                    <td><?php echo $loss-$profit; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $loss; ?></td>
                    <td></td>
                    <td><?php echo $loss; ?></td>
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

        