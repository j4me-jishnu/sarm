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
                <th>LF</th>
                <th>Amount Dr</th>
                <th>Amount Cr</th>
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
                      <td colspan="4"><span style="font-style: italic;font-size: 15px;">Fixed Assets</span></td>
                    </tr>
                    <?php
                    for ($i=0; $i < count($fixed); $i++) 
                    { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fixed[$i]->ledger_head ?></td>
                          <td></td>
                          <td><?php echo $fixed[$i]->debit; $deb_total=$deb_total+$fixed[$i]->debit; ?></td>
                          <td><?php echo $fixed[$i]->credit; $cred_total=$cred_total+$fixed[$i]->credit; ?></td>
                        </tr>
                    <?php  
                    } 
                }
                if(! empty($current))
                {
                 ?>
                  <tr>
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Current Assets</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($current); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $current[$i]->ledger_head ?></td>
                          <td></td>
                          <td><?php echo $current[$i]->debit;$deb_total=$deb_total+$current[$i]->debit ?></td>
                          <td><?php echo $current[$i]->credit;$cred_total=$cred_total+$current[$i]->credit ?></td>
                        </tr>
                    <?php  
                  } 
                }
                if(! empty($liabilty))
                {
                 ?>
                  <tr>
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Fixed Liability</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($liabilty); $i++) 
                  { 
                    ?>
                      <tr>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $liabilty[$i]->ledger_head ?></td>
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
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Current Liability</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($currentliabilty); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $currentliabilty[$i]->ledger_head ?></td>
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
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Direct Income</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($direct_income); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $direct_income[$i]->ledger_head ?></td>
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
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Indirect Income</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_income); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $indirect_income[$i]->ledger_head ?></td>
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
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Direct Expenses</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($direct_exp); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $direct_exp[$i]->ledger_head ?></td>
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
                    <td colspan="4"><span style="font-style: italic;font-size: 15px;">Indirect Expenses</span></td>
                  </tr>
                  <?php 
                  for ($i=0; $i < count($indirect_exp); $i++) 
                  { 
                    ?>
                        <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $indirect_exp[$i]->ledger_head ?></td>
                          <td></td>
                          <td><?php echo $indirect_exp[$i]->debit;$deb_total=$deb_total+$indirect_exp[$i]->debit; ?></td>
                          <td><?php echo $indirect_exp[$i]->credit;$cred_total=$cred_total+$indirect_exp[$i]->credit; ?></td>
                        </tr>
                    <?php  
                  }
                }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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
          