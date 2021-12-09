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
          <!-- table 1 -->
          <table id="area_table" style="float: left" width="450" class="tree-table table-bordered table-condensed">
          <thead>
              <th colspan="2">LIABILITY</th>
              <th>AMOUNT</th>
          </thead>
            <body>
            <?php $total_liability=0;$total_asset=0; $total=0;
                if (empty($liabilty) && empty($currentliabilty)) 
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
                <td colspan="2" style="background: #e6ecf5;"></td>
            </tr>
                <tr>
                    <td colspan="2">LIABILITY</td>
                    <td></td>
                </tr>
                <?php
                    for ($i=0; $i < count($liabilty); $i++) 
                    {
                ?>
            <tr>
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($liabilty[$i]->ledger_head)) echo strtoupper($liabilty[$i]->ledger_head); ?></td>
                <td colspan="1"><?php if(isset($liabilty[$i]->balance)) echo $liabilty[$i]->balance; if(isset($liabilty[$i]->balance)) $total_liability=$total_liability+$liabilty[$i]->balance; ?></td>
            </tr>
            <?php    
                }
            ?>
            <tr>
                <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>SHORT LIABILITY</b></span></td>
                <td colspan="2" style="background: #e6ecf5;"></td>
            </tr>
            <?php 
                 $x = 10;
                 $c = 10;
                   foreach($addition_data as $group_heads) { 
                     if($group_heads->group_id == 20 || $group_heads->group_id == 21){
            ?>
            <tr>
                <td colspan="2" id="row-1-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                <td></td>
            </tr>
            <?php 
                for ($i=0; $i < count($currentliabilty); $i++) 
                { 
                    if($group_heads->group_id == $currentliabilty[$i]->group_id_fk){
            ?>    
            <tr data-parent="row-1-<?php echo $c ?>">
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($currentliabilty[$i]->ledger_head)) echo strtoupper($currentliabilty[$i]->ledger_head); ?></td>
                <td colspan="1"><?php if(isset($currentliabilty[$i]->opening_bal2)) echo $currentliabilty[$i]->opening_bal2; if(isset($currentliabilty[$i]->opening_bal2)) $total_liability=$total_liability+$currentliabilty[$i]->opening_bal2; ?></td>
            </tr> 
            <?php
                } } } 
                $c++;
                $x++;
            }
            ?>
            <tr>
                <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CAPITAL</b></span></td>
                <td colspan="2" style="background: #e6ecf5;"><?php if(isset($capital)) echo $capital; ?><br></td>
            </tr>
            <?php
                if(@$profitloss[0]->profit_loss == 1)
                {
            ?>
            <tr>
                <td colspan="1">ADD NET PROFIT</td>
                <td><?php  echo $profitloss[0]->amount; $total=$profitloss[0]->amount + $capital;  ?></td>
            </tr>
            <?php 
                }
            ?>
            </body>        
            <?php
                }
            ?>  
            <tr>
                <td colspan="2"></td>
                <td colspan="1"><?php echo $total; $total_liability=$total_liability+$total; ?></td>
            </tr> 
            <tr>
                <td colspan="2"></td>
                <td colspan="1"><?php echo $total_liability; ?></td>
            </tr> 
          </table>
          <!-- table 2 -->
          <table id="area_table" style="float: left" width="450" class="tree-table table-bordered table-condensed">
          <head>
              <th colspan="2">ASSETS</th>
              <TH>AMOUNT</TH>
          </head>
          <body>
          <?php 
                $total_liability=0;$total_asset=0;
                if (empty($fixed) && empty($current)) 
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
                <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>FIXED ASSETS</b></span></td>
                <td colspan="2" style="background: #e6ecf5;"></td>
            </tr>
            <?php 
                 $x = 20;
                 $c = 20;
                   foreach($addition_data as $group_heads) { 
                     if($group_heads->group_id == 17){
            ?>
            <tr>
                <td colspan="2" id="row-2-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                <td></td>
            </tr>
            <?php 
                for ($i=0; $i < count($fixed); $i++) 
                { 
                    if($group_heads->group_id == $fixed[$i]->group_id_fk){
            ?>
            <tr data-parent="row-2-<?php echo $c ?>">
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($fixed[$i]->ledger_head)) echo strtoupper($fixed[$i]->ledger_head); ?></td>
                <td colspan="1"><?php if(isset($fixed[$i]->opening_bal2)) echo $fixed[$i]->opening_bal2; if(isset($fixed[$i]->opening_bal2)) $total_asset=$total_asset+$fixed[$i]->opening_bal2; ?></td>
            </tr>
            <?php
                } } } 
                $c++;
                $x++;
            }
            ?>
            <tr>
                <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>CURRENT ASSETS</b></span></td>
                <td colspan="2" style="background: #e6ecf5;"></td>
            </tr>
            <?php 
                 $x = 30;
                 $c = 30;
                   foreach($addition_data as $group_heads) { 
                     if($group_heads->group_id == 12 || $group_heads->group_id == 13 || $group_heads->group_id == 14 || $group_heads->group_id == 15 || $group_heads->group_id == 16){
            ?>
            <tr>
                <td colspan="2" id="row-3-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>
                <td></td>
            </tr>
            <?php 
                for ($i=0; $i < count($current); $i++) 
                { 
                    if($group_heads->group_id == $current[$i]->group_id_fk){
            ?>
            <tr data-parent="row-3-<?php echo $c ?>">
                <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($current[$i]->ledger_head)) echo strtoupper($current[$i]->ledger_head); ?></td>
                <td colspan="1"><?php if(isset($current[$i]->opening_bal2)) echo $current[$i]->opening_bal2;if(isset($current[$i]->opening_bal2)) $total_asset=$total_asset+$current[$i]->opening_bal2; ?></td>
            </tr>
            <?php 
                } } } 
                $c++;
                $x++;
            }
            if(@$profitloss[0]->profit_loss == 1){
            ?>
             <tr>
                <td colspan="1">LESS NETLOSS</td>
                <td><?php echo @$profitloss[0]->amount;@$total=$capital - $profitloss[0]->amount ?></td>
            </tr>
            <?php 
            }
            ?>
            <tr>
                <td colspan="2"></td>
                <td colspan="1"><?php echo $total_asset; ?></td>
            </tr>
          </body>
           <?php } ?> 
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
  