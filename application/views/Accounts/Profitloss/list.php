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

              

                <?php if($this->session->userdata['user_type']!='C')

                { ?>

                <div class="col-md-3">

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

                  <div class="input-group-btn">

                    <input type="submit" class="form-control btn btn-primary" name="submit" value="SUBMIT">

                  </div>

                </div>

              </div>

                <?php } else { ?>

              

              <div class="col-md-3">

                    <div class="input-group margin">

                      <input type="text" class="form-control" name="justname" value="<?php echo @$company1->cmp_name ?>" readonly>

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

              <div class="col-md-2">

                <div class="input-group margin">

                  <div class="input-group-btn">

                    <input type="submit" class="form-control btn btn-primary" name="submit" value="SUBMIT">

                  </div>

                </div>

              </div>

              <?php } ?>

            </div>

          </form>

          <table id="area_table" width="450" class="tree-table table-bordered table-condensed" style="float: left;"> 

             <head>

              <tr>

                <th colspan="2">PARTICULARS</th>

                <TH>AMOUNT</TH>

              </tr>

             </head> 

             <body>

             <?php

              if (empty($direct_exp) && empty($indirect_exp)) 

              {

              ?>

                <tr>

                  <td colspan="4">NO DATA FOUND</td>

                </tr>

              <?php

              }

              else

              { 

                $total_pur = 0; $total_sale = 0;  $netprofit = 0; $netloss = 0;

              ?>

               <tr>

                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT EXPENSES</b></span></td>

                  <td style="background: #e6ecf5;"></td>

                </tr>

                <?php

                $x = 1;

                $c = 1;

                $y = 1;

                @${'deb_total10'.$y};

                foreach($addition_data as $group_heads){

                  if($group_heads->group_id == 27 || $group_heads->group_id == 28 || $group_heads->group_id == 31 || $group_heads->group_id == 35 || $group_heads->group_id == 36){

                 

                ?>

                <tr>

                  <td colspan="2" id="row-1-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo($group_heads->group_name)?$group_heads->group_name:'' ?></b></td>

                  <td><b><?php for ($i=0; $i < count($direct_exp); $i++) { if($group_heads->group_id == $direct_exp[$i]->group_id_fk){ @${'deb_total10'.$y}=@${'deb_total10'.$y}+$direct_exp[$i]->debit;  } } echo @${'deb_total10'.$y} ?></b></td>

                </tr>

                <?php 

                 for ($i=0; $i < count($direct_exp); $i++) 

                 {   

                    if($direct_exp[$i]->group_id_fk == $group_heads->group_id)

                    {

                ?>

                <tr data-parent="row-1-<?php echo $c ?>">

                  <td colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;To <?php if(isset($direct_exp[$i]->ledger_head)) echo strtoupper($direct_exp[$i]->ledger_head); ?></td>

                  <td><?php if(isset($direct_exp[$i]->debit)) echo round($direct_exp[$i]->debit,2); ?></td>

                </tr>

                <?php

                  } } }

                  $x++;

                  $c++;

                  $y++;

                }

                for($i=0; $i < count($direct_exp); $i++){

                  if(isset($direct_exp[$i]->debit)){$total_pur = $total_pur + $direct_exp[$i]->debit;}

                }   

                for($i=0; $i < count($direct_income); $i++){

                  if(isset($direct_income[$i]->credit)){$total_sale = $total_sale + $direct_income[$i]->credit;} 

                }

                $total_sale = $total_sale + $closing['amount'];

                ?>

                <tr>

                  <td style="opacity:0;">hello</td>

                </tr>

                <?php if($total_sale > $total_pur){ ?>

                <tr>

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>TO GROSS PROFIT</b></td>

                  <td><?php echo $profit=$total_sale-$total_pur ?></td>

                </tr>

                <tr>

                  <td colspan="2"></td>

                  <td><?php echo $total_sale; ?></td>

                </tr>

                <?php } else { ?>

                  <tr>

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>TO GROSS LOSS</b></td>

                  <td><?php echo $loss=$total_pur-$total_sale ?></td>

                </tr>

                <?php } ?>  

                <tr>

                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT EXPENSES</b></span></td>

                  <td style="background: #e6ecf5;"></td>

                </tr>

                <?php

                $x=29;

                $c=29;

                $y=1;

                @${'deb_total30'.$y};

                  foreach($addition_data as $group_heads){

                    if($group_heads->group_id == 29 || $group_heads->group_id == 34 ){

                ?>

                <tr>

                  <td colspan="2" id="row-2-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>

                  <td><b><?php for ($i=0; $i < count($indirect_exp); $i++) { if($group_heads->group_id == $indirect_exp[$i]->group_id_fk){ @${'deb_total30'.$y}=@${'deb_total30'.$y}+$indirect_exp[$i]->debit;  } } echo @${'deb_total30'.$y} ?></b></td>

                </tr>

                <?php

                  for($i=0; $i< count($indirect_exp); $i++ )

                  {

                    if($indirect_exp[$i]->group_id_fk == $group_heads->group_id)

                    {

                ?>

                <tr data-parent="row-2-<?php echo $c ?>">

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;To <?php if(isset($indirect_exp[$i]->ledger_head)) echo strtoupper($indirect_exp[$i]->ledger_head); ?></td>

                  <td><?php if(isset($indirect_exp[$i]->debit)) echo round($indirect_exp[$i]->debit,2); ?></td>

                </tr>

            <?php

                  } } } 

                  $x++;

                  $c++;

                  $y++;

                }

                  $total_pur5 = 0;

                  $total_sale5 = 0;

                  $profit5 = 0;

                  $loss5 = 0;

                  for($i=0; $i < count($direct_exp); $i++){

                    if(isset($direct_exp[$i]->debit)){$total_pur5 = $total_pur5 + $direct_exp[$i]->debit;}

                  }   

                  for($i=0; $i < count($direct_income); $i++){

                    if(isset($direct_income[$i]->credit)){$total_sale5 = $total_sale5 + $direct_income[$i]->credit;} 

                  }

                  $total_sale5 = $total_sale5 + $closing['amount'];

                  $profit5=$total_sale5-$total_pur5;

                  $loss5=$total_pur5-$total_sale5;

                  if($profit5 > $loss5){

                  $profit5=$total_sale5-$total_pur5;

                  $loss5 = 0;

                  }

                  else{

                  $loss5=$total_pur5-$total_sale5;

                  $profit = 0;

                  }



                  $netprofit = $profit5;

                  $netloss = $loss5;

                  for($i=0;$i<count($indirect_exp);$i++){

                    if(isset($indirect_exp[$i]->debit)){$netloss = $netloss + $indirect_exp[$i]->debit;}

                  }

                  for($i=0;$i<count($indirect_income);$i++){

                    if(isset($indirect_income[$i]->credit)){$netprofit = $netprofit  + $indirect_income[$i]->credit;}

                  }

                  if($netprofit > $netloss)

                {

            ?>      

                  <tr>

                    <td colspan="2"><label>TO NET PROFIT C/D</label></td>

                    <td><?php echo $netprofit-$netloss; ?><input type="hidden" name="profit" id="profit" value="<?php echo $netprofit-$netloss; ?>"></td>

                  </tr>

                  <tr>

                    <td colspan="2"></td>

                    <td><?php echo $netprofit; ?></td>

                  </tr>

            <?php        

                }

                else {

           ?>   

                <tr>

                  <td colspan="2"></td>

                  <td><?php echo $netloss; ?></td>

                </tr>    

           <?php       

               } }     

            ?>

             </body>

          </table>

          <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          <table id="area_table"  width="450" class="tree-table table-bordered table-condensed" style="float: left;">

              <head>

                <tr>

                  <th colspan="2">PARTICULARS</th>

                  <TH>AMOUNT</TH>

                </tr>

              </head>

              <body>

              <?php

              if (empty($direct_income) && empty($indirect_income)) 

              {

              ?>

                <tr>

                  <td colspan="4">NO DATA FOUND</td>

                </tr>

              <?php

              }

              else

              { 

                $total_pur2 = 0; $total_sale2 = 0; $total_sale3 = 0; $netloss2 = 0

              ?>

                <tr>

                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>DIRECT INCOME</b></span></td>

                  <td style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>AMOUNT</b></span></td>

                </tr>

                <?php

                $x=1;

                $c=1;

                $y=1;

                @${'deb_total20'.$y};

                  foreach($addition_data as $group_heads){

                    if($group_heads->group_id == 24 || $group_heads->group_id == 25){

                ?>

                <tr>

                  <td colspan="2" id="row-3-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>

                  <td><b><?php for ($i=0; $i < count($direct_income); $i++) { if($group_heads->group_id == $direct_income[$i]->group_id_fk){ @${'deb_total20'.$y}=@${'deb_total20'.$y}+$direct_income[$i]->debit;  } } echo @${'deb_total20'.$y} ?></b></td>

                </tr>

                <?php 

                  for($i=0; $i < count($direct_income); $i++)

                  {

                    if($group_heads->group_id == $direct_income[$i]->group_id_fk){

                ?>

                <tr data-parent="row-3-<?php echo $c ?>">

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($direct_income[$i]->ledger_head)) echo strtoupper($direct_income[$i]->ledger_head); ?></td>

                  <td><?php if(isset($direct_income[$i]->debit)) echo round($direct_income[$i]->debit,2); ?></td>

                </tr>

                <?php

                  } } } 

                  $x++;

                  $c++;

                  $y++;

                }

                  for($i=0; $i < count($direct_exp); $i++){

                    if(isset($direct_exp[$i]->debit)){$total_pur2 = $total_pur2 + $direct_exp[$i]->debit;}

                  }   

                  for($i=0; $i < count($direct_income); $i++){

                    if(isset($direct_income[$i]->credit)){$total_sale3 = $total_sale3 + $direct_income[$i]->credit;} 

                  }

                ?>

                <tr>

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $closing['ledgerhead'] ?></b></td>

                  <td><?php echo $closing['amount'];$total_sale3 = $total_sale3 + $closing['amount']; ?></td>

                </tr>

                <tr>

                  <td style="opacity:0;">hello</td>

                </tr>

               <?php if($total_pur2 > $total_sale3) { ?>

                <tr>

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>TO GROSS LOSS</b></td>

                  <td><?php echo $loss=$total_pur2-$total_sale3 ?></td>

                </tr>

                <tr>

                  <td colspan="2"></td>

                  <td><?php echo $total_pur2; ?></td>

                </tr>

                <?php } else{ ?>

                <tr>

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;<b>TO GROSS LOSS</b></td>

                  <td><?php echo $profit2=$total_sale3-$total_pur2 ?></td>

                </tr>  

                <?php } ?>

                <tr>

                  <td colspan="2" style="background: #e6ecf5;"><span style="font-family: Arial Narrow;font-size: 14px;"><b>INDIRECT INCOME</b></span></td>

                  <td style="background: #e6ecf5;"></td>

                </tr>

                <?php

                $x=40;

                $c=40;

                $y=1;

                @${'deb_total40'.$y};

                  foreach($addition_data as $group_heads){

                    if($group_heads->group_id == 26){

                ?>

                <tr>

                  <td colspan="2" id="row-4-<?php echo $x ?>" class="parent-row">&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $group_heads->group_name ?></b></td>

                  <td><b><?php for ($i=0; $i < count($indirect_income); $i++) { if($group_heads->group_id == $indirect_income[$i]->group_id_fk){ @${'deb_total40'.$y}=@${'deb_total40'.$y}+$indirect_income[$i]->debit;  } } echo @${'deb_total40'.$y} ?></b></td>

                </tr>

                <?php

                  for($i=0; $i < count($indirect_income); $i++){

                    if($group_heads->group_id == $indirect_income[$i]->group_id_fk){

                ?>

                <tr data-parent="row-4-<?php echo $c ?>">

                  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($indirect_income[$i]->ledger_head)) echo strtoupper($indirect_income[$i]->ledger_head); ?></td>

                  <td><?php if(isset($indirect_income[$i]->debit)) echo round($indirect_income[$i]->debit,2); ?></td>

                </tr>

              <?php

                  } } } 

                  $x++;

                  $c++;

                  $y++;

                }

                  $total_pur6 = 0;

                  $total_sale6 = 0;

                  $profit6 = 0;

                  $loss6 = 0;

                  for($i=0; $i < count($direct_exp); $i++){

                    if(isset($direct_exp[$i]->debit)){$total_pur6 = $total_pur6 + $direct_exp[$i]->debit;}

                  }   

                  for($i=0; $i < count($direct_income); $i++){

                    if(isset($direct_income[$i]->credit)){$total_sale6 = $total_sale6 + $direct_income[$i]->credit;} 

                  }

                  $total_sale6 = $total_sale6 + $closing['amount'];

                  $profit6=$total_sale6-$total_pur6;

                  $loss6=$total_pur6-$total_sale6;

                  if($profit6 > $loss6){

                  $profit6=$total_sale6-$total_pur6;

                  $loss6 = 0;

                  }

                  else{

                  $loss6=$total_pur6-$total_sale6;

                  $profit6 = 0;

                  }



                  $netprofit2 = $profit6;

                  $netloss2 = $loss6;

                  for($i=0;$i<count($indirect_exp);$i++){

                   if(isset($indirect_exp[$i]->debit)){$netloss2 = $netloss2 + $indirect_exp[$i]->debit;}

                  }

                  for($i=0;$i<count($indirect_income);$i++){

                    if(isset($indirect_income[$i]->credit)){$netprofit2 = $netprofit2  + $indirect_income[$i]->credit;}

                  }

                  if($netprofit2 < $netloss2)

                  {

              ?>

                  <tr>

                    <td><label><b>NET LOSS C/D <b></label></td>

                    <td><?php echo $netloss2-$netprofit2; ?><input type="hidden" name="loss" id="loss" value="<?php echo $netloss2-$netprofit2; ?>"></td>

                  </tr>

              <?php

                  } else {

              ?>    

                  <tr>

                    <td colspan="2"></td>

                    <td><?php echo $netprofit2 ?></td>

                  </tr>

              <?php    

              }  }

              ?>

              </body>    

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