
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Trial Balance</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-8">
              <h3>Trial Balance</h3>  
            </div>
            <div class="col-sm-4">
              <small class="col-md-6">Financial Year: <?php if(isset($fin_year->fin_year)){echo $fin_year->fin_year;} ?></small>
            </div>
          </div>
        </div>
        <div class="box-body">
          <form method="post" action="<?php echo base_url(); ?>Trialbalance/get">
            <div class="row">
                <?php if($this->session->userdata['user_type']!='C')
                { ?>
                <div class="col-md-3">
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
                  </div>
              <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button class="btn btn-primary nohover">Date From</button>
                  </div>
                    <input type="date" name="start_date" class="form-control">
                </div>  
              </div>
              <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button class="btn btn-primary nohover">Date To</button>
                  </div>
                    <input type="date" name="end_date" class="form-control">
                </div>  
              </div>
              <div class="col-md-2">
                <div class="input-group margin">
                  <input type="submit" class="btn btn-primary" value="SUBMIT">
                </div>  
              </div>
                <?php } else{ ?>
                  <div class="row" style="margin-left: 90px;">
                 <div class="col-md-8">
                   <input type="text" name="justname" id="" class="form-control" value="<?php echo @$company1->cmp_name ?>" readonly>
                   <input type="hidden" name="company" id="" class="form-control" value="<?php echo $this->session->userdata('cmp_id') ?>">
                 </div>
                 <div class="col-md-2">
                   <input type="submit" name="submit" class="btn btn-primary " value="SUBMIT">
                 </div>
                 </div>
                 <?php } ?>
            </div>
          </form>
          <table id="area_table" align="center" width="800" class="table-bordered table-condensed">
            <thead>
              <tr style="font-family: Arial Narrow;">
                <th>PARTICULARS</th>
                <th>LF</th>
                <th>AMOUNT Dr</th>
                <th>AMOUNT Cr</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(empty($fixed) && empty($current) && empty($liabilty) && empty($currentliabilty) && empty($direct_income) && empty($indirect_income) && empty($direct_exp) && empty($indirect_exp))
              {
              ?>
              <tr>
                <td colspan="4">No Data Found</td>
              </tr>
              <?php  
              }
              else
              {
                $deb_total=0;$cred_total=0;
                if(! empty($fixed))
                {
                    ?>
                    <tr>
                      <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>FIXED ASSETS<b></span></td>
                    </tr>
                    
                    <?php
                    for ($i=0; $i < count($fixed); $i++) 
                    { 
                      foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == $fixed[$i]->group_id_fk){
                    ?>
                         
                    <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="collapse" href="#collapseFixedAsset<?php echo $i ?>" role="button" aria-expanded="false" aria-controls="collapseFixedAsset<?php echo $i ?>" style="color: green;">+</a>&nbsp;&nbsp;&nbsp;&nbsp;FIXED ASSETS</td>
                          <td></td>
                          <td></td>
                          <td></td>
                    </tr>
                        <tr class="collapse" id="collapseFixedAsset<?php echo $i ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($fixed[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $fixed[$i]->debit; $deb_total=$deb_total+$fixed[$i]->debit; ?></td>
                          <td><?php echo $fixed[$i]->credit; $cred_total=$cred_total+$fixed[$i]->credit; ?></td>
                        </tr>
                       
                    <?php  
                     } } }
                }
                if(! empty($current))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT ASSETS</b></span></td>
                  </tr>
                 <?php
                  $x = 1;
                  $c = 0;
                 foreach($addition_data as $group_heads) { 
                   if($group_heads->group_id == 12 || $group_heads->group_id == 13 || $group_heads->group_id == 14 || $group_heads->group_id == 15 || $group_heads->group_id == 12){
                   ?>
                      <tr >
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a ></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $group_heads->group_name ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <?php for($i=0;$i < count($current);$i++){ 
                        if($group_heads->group_id == $current[$i]->group_id_fk){ ?>
                      <tr >
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($current[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $current[$i]->debit; $deb_total=$deb_total+$current[$i]->debit; ?></td>
                          <td><?php echo $current[$i]->credit; $cred_total=$cred_total+$current[$i]->credit; ?></td>
                        </tr>
                    <?php
                        }
                      }
                   }
                 }
                 $x++;
                 $c++;
                }
                if(! empty($liabilty))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>FIXED LIABILITY</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($liabilty); $i++) 
                  { 
                    ?>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($liabilty[$i]->ledger_head) ?></td>
                        <td></td>
                        <td><?php echo $liabilty[$i]->debit;$deb_total=$deb_total+$liabilty[$i]->debit; ?></td>
                        <td><?php echo $liabilty[$i]->credit;$cred_total=$cred_total+$liabilty[$i]->credit; ?></td>
                      </tr>
                    
                    <?php  
                  } 
                }
                if(! empty($currentliabilty))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT LIABILITY</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($currentliabilty); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($currentliabilty[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $currentliabilty[$i]->debit;$deb_total=$deb_total+$currentliabilty[$i]->debit; ?></td>
                          <td><?php echo $currentliabilty[$i]->credit;$cred_total=$cred_total+$currentliabilty[$i]->credit; ?></td>
                        </tr>
                        
                    <?php  
                  } 
                }
                if(! empty($direct_income))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT INCOME</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($direct_income); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($direct_income[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $direct_income[$i]->debit;$deb_total=$deb_total+$direct_income[$i]->debit; ?></td>
                          <td><?php echo $direct_income[$i]->credit;$cred_total=$cred_total+$direct_income[$i]->credit; ?></td>
                        </tr>
                        
                    <?php  
                  } 
                }
                if(! empty($indirect_income))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT INCOME</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_income); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($indirect_income[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $indirect_income[$i]->debit;$deb_total=$deb_total+$indirect_income[$i]->debit; ?></td>
                          <td><?php echo $indirect_income[$i]->credit;$cred_total=$cred_total+$indirect_income[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  } 
                }
                if(! empty($direct_exp))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT EXPENSES</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($direct_exp); $i++) 
                  { 
                   
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($direct_exp[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $direct_exp[$i]->debit;$deb_total=$deb_total+$direct_exp[$i]->debit; ?></td>
                          <td><?php echo $direct_exp[$i]->credit;$cred_total=$cred_total+$direct_exp[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  }
                }
                if(! empty($indirect_exp))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT EXPENSES</b></span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_exp); $i++) 
                  { 
                    
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($indirect_exp[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo round($indirect_exp[$i]->debit,2);$deb_total=$deb_total+$indirect_exp[$i]->debit; ?></td>
                          <td><?php echo round($indirect_exp[$i]->credit,2);$cred_total=$cred_total+$indirect_exp[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  }
                }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td><label><?php echo $deb_total; ?></label></td>
                  <td><label><?php echo $cred_total; ?></label></td>
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
  
 