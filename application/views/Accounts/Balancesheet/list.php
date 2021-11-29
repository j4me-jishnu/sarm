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
                <?php } else { ?>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="justname" value="<?php echo $comapny1->cmp_name ?>">
                      <input type="hidden" class="form-control" name="company" value="<?php echo $this->session->userdata('cmp_id') ?>">  
                    </div>
                    <div class="col-md-3">
                      <input type="submit" class="btn btn-primary" value="SUBMIT">  
                    </div>                    
                  </div>
                <?php } ?>
              </div>
            </div>
          </form>
          <table id="area_table" align="center" width="1000" class="table-bordered table-condensed">
            <thead>
              <tr>
                  <th>Liability</th>
                  <th>Amount</th>
                  <th>Assets</th>
                  <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total_liability=0;$total_asset=0;
              if (empty($fixed) && empty($current) && empty($liabilty) && empty($currentliabilty)) 
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
                  <td colspan="2"><span style="font-style: italic;font-size: 15px;">Longterm Liability</span></td>
                  <td colspan="2"><span style="font-style: italic;font-size: 15px;">Fixed Assets</span></td>
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
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($liabilty[$i]->ledger_head)) echo $liabilty[$i]->ledger_head; ?></td>
                       <td><?php if(isset($liabilty[$i]->balance)) echo $liabilty[$i]->balance; if(isset($liabilty[$i]->balance)) $total_liability=$total_liability+$liabilty[$i]->balance; ?></td>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($fixed[$i]->ledger_head)) echo $fixed[$i]->ledger_head; ?></td>
                       <td><?php if(isset($fixed[$i]->balance)) echo $fixed[$i]->balance; if(isset($fixed[$i]->balance)) $total_asset=$total_asset+$fixed[$i]->balance; ?></td>
                     </tr> 
                <?php    
                }
                ?>
                <tr>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td colspan="2"><span style="font-style: italic;font-size: 15px;">Short Liability</span></td>
                  <td colspan="2"><span style="font-style: italic;font-size: 15px;">Current Assets</span></td>
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
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($currentliabilty[$i]->ledger_head)) echo $currentliabilty[$i]->ledger_head; ?></td>
                       <td><?php if(isset($currentliabilty[$i]->balance)) echo $currentliabilty[$i]->balance; if(isset($currentliabilty[$i]->balance)) $total_liability=$total_liability+$currentliabilty[$i]->balance; ?></td>
                       <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($current[$i]->ledger_head)) echo $current[$i]->ledger_head; ?></td>
                       <td><?php if(isset($current[$i]->balance)) echo $current[$i]->balance;if(isset($current[$i]->balance)) $total_asset=$total_asset+$current[$i]->balance; ?></td>
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
                        Capital<br>
                        <?php
                        if($profitloss[0]->profit_loss == 1)
                        {
                          //profit
                        ?>
                        Add Net profit
                        <?php  
                        }
                        else
                        {
                        ?>
                        Less Netloss
                        <?php
                        } 
                        ?>
                      </div>
                      <div class="col-sm-6" align="right">
                        <?php if(isset($capital)) echo $capital; ?><br>
                        <?php
                        if($profitloss[0]->profit_loss == 1)
                        {
                          //profit
                        echo $profitloss[0]->amount; 
                        $total=$profitloss[0]->amount + $capital; 
                        }
                        else
                        {
                        echo $profitloss[0]->amount;
                        $total=$capital - $profitloss[0]->amount;
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

          