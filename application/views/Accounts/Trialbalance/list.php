<style>
  .tree-table .parent-row:hover {
  cursor: pointer;
}

.tree-table [data-parent] td:first-child {
  padding-left: 10px;
}

.tree-table [data-parent] {
  display: none;
  
}


.tree-table [data-parent].expanded {
  display: table-row;
}


</style>
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
                      <select name="company" id="company" class="form-control" >
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
              <div class="col-md-2">
                <div class="input-group margin">
                  <input type="submit" class="btn btn-primary" value="SUBMIT">
                </div>  
              </div>
                <?php } else{ ?>
                  <div class="row" style="margin-left: 90px;">
                 <div class="col-md-4">
                   <input type="text" name="justname" id="" class="form-control" value="<?php echo @$company1->cmp_name ?>" readonly>
                   <input type="hidden" name="company" id="" class="form-control" value="<?php echo $this->session->userdata('cmp_id') ?>">
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
                 <div class="col-md-2">
                   <input type="submit" name="submit" class="btn btn-primary " value="SUBMIT">
                 </div>
                 </div>
                 <?php } ?>
            </div>
          </form>
          <table id="area_table" align="center" width="800" class="tree-table table-bordered table-condensed">
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
                    $x = 17;
                    $c = 17;
                    $y=1;
                    @${'deb_total10'.$y};
                      foreach($addition_data as $group_heads) { 
                        if($group_heads->group_id == 17 ){
                    ?>
                         
                    <tr id="row-1-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($fixed); $i++) { if($group_heads->group_id == $fixed[$i]->group_id_fk){ @${'deb_total10'.$y}=@${'deb_total10'.$y}+$fixed[$i]->debit;  } } echo @${'deb_total10'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($fixed); $i++) { if($group_heads->group_id == $fixed[$i]->group_id_fk){ @${'cred_total10'.$y}=@${'cred_total10'.$y}+$fixed[$i]->credit;  } } echo @${'cred_total10'.$y} ?></b></td>
                    </tr>
                   <?php for ($i=0; $i < count($fixed); $i++) 
                    { 
                      if($group_heads->group_id == $fixed[$i]->group_id_fk){
                      ?>
                        <tr data-parent="row-1-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($fixed[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $fixed[$i]->debit; $deb_total=$deb_total+$fixed[$i]->debit; ?></td>
                          <td><?php echo $fixed[$i]->credit; $cred_total=$cred_total+$fixed[$i]->credit; ?></td>
                        </tr>
                       
                    <?php  
                     } } } 
                    $x++;
                    $c++;
                    $y++;
                    }
                }
                if(! empty($current))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT ASSETS</b></span></td>
                  </tr>
                 <?php
                  $x = 12;
                  $c = 12;
                  $y=1;
                  @${'deb_total20'.$y};
                  @${'cred_total20'.$y};
                 foreach($addition_data as $group_heads) { 
                   if($group_heads->group_id == 12 || $group_heads->group_id == 13 || $group_heads->group_id == 14 || $group_heads->group_id == 15 || $group_heads->group_id == 12){
                   ?>
                      <tr id="row-2-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($current); $i++) { if($group_heads->group_id == $current[$i]->group_id_fk){ @${'deb_total20'.$y}=@${'deb_total20'.$y}+$current[$i]->debit;  } } echo @${'deb_total20'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($current); $i++) { if($group_heads->group_id == $current[$i]->group_id_fk){ @${'cred_total20'.$y}=@${'cred_total20'.$y}+$current[$i]->credit;  } } echo @${'cred_total20'.$y} ?></b></td>
                      </tr>
                      <?php for($i=0;$i < count($current);$i++){ 
                        if($group_heads->group_id == $current[$i]->group_id_fk){ ?>
                      <tr data-parent="row-2-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($current[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $current[$i]->debit; $deb_total=$deb_total+$current[$i]->debit; ?></td>
                          <td><?php echo $current[$i]->credit; $cred_total=$cred_total+$current[$i]->credit; ?></td>
                        </tr>
                    <?php
                        }
                      }
                   }
                   $x++;
                   $c++;
                   $y++;
                 }
                 
                
                }
                if(! empty($liabilty))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>FIXED LIABILITY</b></span></td>
                  </tr>
                  <?php 
                  $x = 19;
                  $c = 19;
                  $y=1;
                  @${'deb_total30'.$y};
                  @${'cred_total30'.$y};
                    foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 19 ){
                    ?>
                      <tr id="row-3-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($liabilty); $i++) { if($group_heads->group_id == $liabilty[$i]->group_id_fk){ @${'deb_total30'.$y}=@${'deb_total30'.$y}+$liabilty[$i]->debit;  } } echo @${'deb_total30'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($liabilty); $i++) { if($group_heads->group_id == $liabilty[$i]->group_id_fk){ @${'cred_total30'.$y}=@${'cred_total30'.$y}+$liabilty[$i]->credit;  } } echo @${'cred_total30'.$y} ?></b></td>
                      </tr>
                      <?php for ($i=0; $i < count($liabilty); $i++) { 
                          if($group_heads->group_id == $liabilty[$i]->group_id_fk){
                    ?>
                      <tr data-parent="row-3-<?php echo $c ?>">
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($liabilty[$i]->ledger_head) ?></td>
                        <td></td>
                        <td><?php echo $liabilty[$i]->debit;$deb_total=$deb_total+$liabilty[$i]->debit; ?></td>
                        <td><?php echo $liabilty[$i]->credit;$cred_total=$cred_total+$liabilty[$i]->credit; ?></td>
                      </tr>
                    
                    <?php  
                  } } }
                  $x++;
                  $c++;
                  $y++;
                }
                }
                if(! empty($currentliabilty))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT LIABILITY</b></span></td>
                  </tr>
                  <?php 
                   $x = 20;
                   $c = 20;
                   $y=1;
                   @${'deb_total40'.$y};
                  @${'cred_total40'.$y};
                    foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 20 || $group_heads->group_id == 21 ){
                    ?>
                        <tr id="row-4-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($currentliabilty); $i++) { if($group_heads->group_id == $currentliabilty[$i]->group_id_fk){ @${'deb_total40'.$y}=@${'deb_total40'.$y}+$currentliabilty[$i]->debit;  } } echo @${'deb_total40'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($currentliabilty); $i++) { if($group_heads->group_id == $currentliabilty[$i]->group_id_fk){ @${'cred_total40'.$y}=@${'cred_total40'.$y}+$currentliabilty[$i]->credit;  } } echo @${'cred_total40'.$y} ?></b></td>
                      </tr>
                    <?php for ($i=0; $i < count($currentliabilty); $i++) {
                      if($group_heads->group_id == $currentliabilty[$i]->group_id_fk){
                        ?>
                        <tr data-parent="row-4-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($currentliabilty[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $currentliabilty[$i]->debit;$deb_total=$deb_total+$currentliabilty[$i]->debit; ?></td>
                          <td><?php echo $currentliabilty[$i]->credit;$cred_total=$cred_total+$currentliabilty[$i]->credit; ?></td>
                        </tr>
                        
                    <?php  
                  } } } 
                  $x++;
                  $c++;
                  $y++;
                }
                }
                if(! empty($direct_income))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT INCOME</b></span></td>
                  </tr>
                  <?php 
                   $x = 24;
                   $c = 24;
                   $y=1;
                   @${'deb_total50'.$y};
                   @${'cred_total50'.$y};
                     foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 24 || $group_heads->group_id == 25 ){
                    ?>
                        <tr id="row-5-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($direct_income); $i++) { if($group_heads->group_id == $direct_income[$i]->group_id_fk){ @${'deb_total50'.$y}=@${'deb_total50'.$y}+$direct_income[$i]->debit;  } } echo @${'deb_total50'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($direct_income); $i++) { if($group_heads->group_id == $direct_income[$i]->group_id_fk){ @${'cred_total50'.$y}=@${'cred_total50'.$y}+$direct_income[$i]->credit;  } } echo @${'cred_total50'.$y} ?></b></td>
                      </tr>
                    <?php  for ($i=0; $i < count($direct_income); $i++) 
                  { 
                    if($group_heads->group_id == $direct_income[$i]->group_id_fk){
                     ?>
                        <tr data-parent="row-5-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($direct_income[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $direct_income[$i]->debit;$deb_total=$deb_total+$direct_income[$i]->debit; ?></td>
                          <td><?php echo $direct_income[$i]->credit;$cred_total=$cred_total+$direct_income[$i]->credit; ?></td>
                        </tr>
                        
                    <?php  
                  } } } 
                  $x++;
                  $c++;
                  $y++;
                }
                }
                if(! empty($indirect_income))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT INCOME</b></span></td>
                  </tr>
                  <?php 
                  $x = 26;
                  $c = 26;
                  $y=1;
                  @${'deb_total60'.$y};
                   @${'cred_total60'.$y};
                     foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 26 ){
                    ?>
                      <tr id="row-6-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($indirect_income); $i++) { if($group_heads->group_id == $indirect_income[$i]->group_id_fk){ @${'deb_total60'.$y}=@${'deb_total60'.$y}+$indirect_income[$i]->debit;  } } echo @${'deb_total60'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($indirect_income); $i++) { if($group_heads->group_id == $indirect_income[$i]->group_id_fk){ @${'cred_total60'.$y}=@${'cred_total60'.$y}+$indirect_income[$i]->credit;  } } echo @${'cred_total60'.$y} ?></b></td>
                      </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_income); $i++) 
                  { 
                    if($group_heads->group_id == $indirect_income[$i]->group_id_fk){
                    ?>
                        <tr data-parent="row-6-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($indirect_income[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $indirect_income[$i]->debit;$deb_total=$deb_total+$indirect_income[$i]->debit; ?></td>
                          <td><?php echo $indirect_income[$i]->credit;$cred_total=$cred_total+$indirect_income[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  } } } 
                  $x++;
                  $c++;
                  $y++;
                }
                }
                if(! empty($direct_exp))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT EXPENSES</b></span></td>
                  </tr>
                  <?php 
                  $x = 27;
                  $c = 27;
                  $y=1;
                  @${'deb_total70'.$y};
                  @${'cred_total70'.$y};
                     foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 27 || $group_heads->group_id == 28 || $group_heads->group_id == 31 || $group_heads->group_id == 34 ){
                    ?>
                      <tr id="row-7-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($direct_exp); $i++) { if($group_heads->group_id == $direct_exp[$i]->group_id_fk){ @${'deb_total70'.$y}=@${'deb_total70'.$y}+$direct_exp[$i]->debit;  } } echo @${'deb_total70'.$y}; ?></b></td>
                          <td><b><?php for ($i=0; $i < count($direct_exp); $i++) { if($group_heads->group_id == $direct_exp[$i]->group_id_fk){ @${'cred_total70'.$y}=@${'cred_total70'.$y}+$direct_exp[$i]->credit;  } } echo @${'cred_total70'.$y} ?></b></td>
                      </tr>
                  <?php 
                  for ($i=0; $i < count($direct_exp); $i++) {
                    if($group_heads->group_id == $direct_exp[$i]->group_id_fk){
                    ?>
                        <tr data-parent="row-7-<?php echo $c ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($direct_exp[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo $direct_exp[$i]->debit;$deb_total=$deb_total+$direct_exp[$i]->debit; ?></td>
                          <td><?php echo $direct_exp[$i]->credit;$cred_total=$cred_total+$direct_exp[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  } } } 
                  $x++;
                  $c++;
                  $y++;
                }
                }
                if(! empty($indirect_exp))
                {
                 ?>
                  <tr>
                    <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT EXPENSES</b></span></td>
                  </tr>
                  <?php 
                  $x = 29;
                  $c = 29;
                  $y=1;
                  @${'deb_total80'.$y};
                   @${'cred_total80'.$y};
                  foreach($addition_data as $group_heads) { 
                      if($group_heads->group_id == 29 ){ ?>
                      <tr id="row-8-<?php echo $x ?>" class="parent-row">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                          <td></td>
                          <td><b><?php for ($i=0; $i < count($indirect_exp); $i++) { if($group_heads->group_id == $indirect_exp[$i]->group_id_fk){ @${'deb_total80'.$y}=@${'deb_total80'.$y}+$indirect_exp[$i]->debit;  } } echo @${'deb_total80'.$y} ?></b></td>
                          <td><b><?php for ($i=0; $i < count($indirect_exp); $i++) { if($group_heads->group_id == $indirect_exp[$i]->group_id_fk){ @${'cred_total80'.$y}=@${'cred_total80'.$y}+$indirect_exp[$i]->credit;  } } echo @${'cred_total80'.$y} ?></b></td>
                      </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_exp); $i++) 
                  { 
                    if($group_heads->group_id == $indirect_exp[$i]->group_id_fk){
                    ?>
                        <tr data-parent="row-8-<?php echo $x ?>">
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($indirect_exp[$i]->ledger_head) ?></td>
                          <td></td>
                          <td><?php echo round($indirect_exp[$i]->debit,2);$deb_total=$deb_total+$indirect_exp[$i]->debit; ?></td>
                          <td><?php echo round($indirect_exp[$i]->credit,2);$cred_total=$cred_total+$indirect_exp[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  } } } 
                  $x++;
                  $c++;
                  $y++;
                }
                }
                ?>
                
                <?php if($deb_total > $cred_total){ ?>
                  <tr>
                  <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>OPENING BALANCE DIFFERNCE <i class="fas fa-accessible-icon    "></i></b></span></td>
                </tr>
                <tr>
                  <td>DIFFRENCE</td>
                  <td></td>
                  <td></td>
                  <td><?php echo $differnce =$deb_total - $cred_total; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><label><?php echo $deb_total; ?></label></td>
                  <td><label><?php echo $deb_total; ?></label></td>
                </tr>
                <?php } else if($deb_total < $cred_total) { ?>
                  <tr>
                  <td colspan="4" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>OPENING BALANCE DIFFERNCE <i class="fas fa-accessible-icon    "></i></b></span></td>
                </tr>
                <tr>
                  <td>DIFFERENCE</td>
                  <td></td>
                  <td></td>
                  <td><?php echo $differnce =$cred_total - $deb_total; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><label><?php echo $cred_total; ?></label></td>
                  <td><label><?php echo $cred_total; ?></label></td>
                </tr>
                <?php    
              } }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>
  <script>
 function toggleRow(event) {
  var rowId = event.currentTarget.id;
  var children = document.querySelectorAll("[data-parent=" + rowId + "]")
  children.forEach(function(row) {
    if (row.classList.contains("expanded")) {
      row.classList.remove("expanded");
    } else {
      row.classList.add("expanded");
    }
  });
}

var rows = document.querySelectorAll(".parent-row")
rows.forEach(function(row) {
  row.addEventListener("click", toggleRow);
});
  </script>
  