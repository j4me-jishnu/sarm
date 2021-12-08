
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Balancesheet</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-8">
              <h3>Balancesheet</h3>  
            </div>
            <div class="col-sm-4">
              <small class="col-md-6">Financial Year: <?php if(isset($fin_year->fin_year)){echo $fin_year->fin_year;} ?></small>
            </div>
          </div>
        </div>
        <div class="box-body">
          <form method="post" action="<?php echo base_url(); ?>Balancesheet/get">
            <div class="row">
                <?php if($this->session->userdata['user_type']!='C')
                { ?>
                <div class="col-md-3">
                  <div class="input-group margin">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary nohover">Company</button>
                    </div><!-- /btn-group -->
                      <select name="company" id="company" class="form-control" onchange="this.form.submit()">
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
                  </div>
                  <div class="col-md-6">
                    <div class="input-group margin">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-primary nohover">Date </button>
                      </div><!-- /btn-group -->
                        <input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
                        <span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
                        
                        <input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
                        <span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group margin">
                        <input type="submit" class="btn btn-primary" value="SUBMIT">
                    </div>
                  </div>
                <?php } else { ?>
                  
                  
                    <div class="col-md-4">
                    <div class="input-group margin">
                      <input type="text" class="form-control" name="justname" value="<?php echo $comapny1->cmp_name ?>" readonly>
                      <input type="hidden" class="form-control" name="company" value="<?php echo $this->session->userdata('cmp_id') ?>">  
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group margin">
                        <div class="input-group-btn">
                        <button type="button" class="btn btn-primary nohover">Date </button>
                        </div><!-- /btn-group -->
                        <input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
                        <span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
                          
                        <input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
                        <span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
                      </div>
                    </div>
                    <div class="col-md-3">
                    <div class="input-group margin">
                      <input type="submit" class="btn btn-primary" value="SUBMIT">  
                    </div>  
                    </div>                    
                  
                <?php } ?>
            </div>
          </form>
          <table id="area_table" align="center" width="1000" class="table-bordered table-condensed">
            <thead>
              <tr>
                  <th>LIABILITY</th>
                  <th>AMOUNT</th>
                  <th>ASSETS</th>
                  <th>AMOUNT</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_liability=0;$total_asset=0;
              if (empty($fixed) && empty($current) && empty($liabilty) && empty($currentliabilty)) 
              {
              ?>
                <tr>
                  <td colspan="4">NO DATA FOUND</td>
                </tr>
              <?php
              }
              else
              {
                ?>
                <tr>
                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>LONGTERM LIABILITY</b></span></td>
                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>FIXED ASSETS</b></span></td>
                </tr>
                <tr>
                <?php
                if(count($liabilty) < count($fixed))
                {
                  $count1=count($fixed);
                }
                else if(count($fixed) < count($liabilty))
                {
                  $count1=count($liabilty);
                }
                else
                {
                  $count1=count($fixed);
                }
                for ($i=0; $i < $count1; $i++) 
                { 
                ?>
                      
                     <tr>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($liabilty[$i]->ledger_head)) echo strtoupper($liabilty[$i]->ledger_head); ?></td>
                       <td><?php if(isset($liabilty[$i]->balance)) echo $liabilty[$i]->balance; if(isset($liabilty[$i]->balance)) $total_liability=$total_liability+$liabilty[$i]->balance; ?></td>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($fixed[$i]->ledger_head)) echo strtoupper($fixed[$i]->ledger_head); ?></td>
                       <td><?php if(isset($fixed[$i]->opening_bal2)) echo $fixed[$i]->opening_bal2; if(isset($fixed[$i]->opening_bal2)) $total_asset=$total_asset+$fixed[$i]->opening_bal2; ?></td>
                     </tr> 
                <?php    
                }
                ?>
                <tr>
                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>SHORT LIABILITY</b></span></td>
                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT ASSETS</b></span></td>
                </tr>
                <tr>
                <?php
                if(count($currentliabilty) < count($current))
                {
                  $count1=count($current);
                }
                else if(count($current) < count($currentliabilty))
                {
                  $count1=count($currentliabilty);
                }
                else
                {
                  $count1=count($current);
                }
                for ($i=0; $i < $count1; $i++) 
                { 
                ?>
                     <tr>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($currentliabilty[$i]->ledger_head)) echo strtoupper($currentliabilty[$i]->ledger_head); ?></td>
                       <td><?php if(isset($currentliabilty[$i]->opening_bal2)) echo $currentliabilty[$i]->opening_bal2; if(isset($currentliabilty[$i]->opening_bal2)) $total_liability=$total_liability+$currentliabilty[$i]->opening_bal2; ?></td>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($current[$i]->ledger_head)) echo strtoupper($current[$i]->ledger_head); ?></td>
                       <td><?php if(isset($current[$i]->opening_bal2)) echo $current[$i]->opening_bal2;if(isset($current[$i]->opening_bal2)) $total_asset=$total_asset+$current[$i]->opening_bal2; ?></td>
                     </tr> 
                <?php    
                }
                ?>
                <tr>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td>
                    <div class="row">
                      <div class="col-sm-6">
                        <b>CAPITAL</b><br>
                        <?php
                        if(@$profitloss[0]->profit_loss == 1)
                        {
                          //profit
                        ?>
                        <!-- Add Net profit -->
                        <b>ADD NET PROFIT</b>
                        <?php  
                        }
                        else
                        {
                        ?>
                        <!-- Less Netloss -->
                        <b>LESS NETLOSS</b>
                        <?php
                        } 
                        ?>
                      </div>
                      <div class="col-sm-6" align="right">
                        <?php if(isset($capital)) echo $capital; ?><br>
                        <?php
                        if(@$profitloss[0]->profit_loss == 1)
                        {
                          //profit
                        echo $profitloss[0]->amount; 
                        $total=$profitloss[0]->amount + $capital; 
                        }
                        else
                        {
                        echo @$profitloss[0]->amount;
                        @$total=$capital - $profitloss[0]->amount;
                        } 
                        ?>
                        <hr>
                      </div>
                    </div>
                  </td>
                  <td><br><br><br><?php echo $total; $total_liability=$total_liability+$total; ?></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><labal><?php echo $total_liability; ?></labal></td>
                  <td></td>
                  <td><labal><?php echo $total_asset; ?></labal></td>
                </tr>
                <?php
              }
              ?>  
            </tbody>
          </table>
        </div>
      </div>
    </section>
</div>

<script>
 
</script> 