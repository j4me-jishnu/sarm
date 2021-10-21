<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ledger</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Ledger</h3>  
            </div>
            <div class="col-sm-2">
            </div>
          </div>
          <form method="post" action="<?php echo base_url(); ?>Ledger/getLedger">
          <div class="row">
            <div class="col-md-3">
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">Company</button>
                  </div><!-- /btn-group -->
                    <select name="company" id="company" class="form-control" required>
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
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Account</button>
                </div><!-- /btn-group -->
                <select class="form-control ledgerhead" name="ledgerhead" id="ledgerhead" required>
                  <?php
                  foreach ($ledgerhead as $ledgerhead) {
                  ?>
                  <option value="<?php echo $ledgerhead->ledgerhead_id; ?>" <?php if(isset($led_id)) if ($led_id == $ledgerhead->ledgerhead_id)  echo "selected" ?>><?php echo $ledgerhead->ledger_head; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Date</button>
                </div><!-- /btn-group -->
                <input type="text" name="ledger_date" id="ledger_date" class="form-control" value="<?php if(isset($led_date)) echo $led_date; else  echo date('d/m/Y') ?>">
              </div><!-- /input-group -->
            </div>
            <div class="col-sm-2">
              <input style="margin-top: 10px;" type="submit" name="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
        </div>
        </form>
        <div class="box-body">
          <table id="area_table" align="center" width="1000" class="table-bordered table-condensed">
            <thead>
              <tr>
                <th>DATE</th>
                <th>PARTICULARS</th>
                <th>AMOUNT</th>                  
                <th></th>
                <th>DATE</th>
                <th>PARTICULARS</th>
                <th>AMOUNT</th>
              </tr>
            </thead>
              <?php
              if (empty($debit) && empty($credit) && empty($balance)) 
              {
              ?>
              <tr>
                <td colspan="7">No data found</td>
              </tr>
              <?php
              }
              else
              {
                if($balance){
              ?>
                <tr>
                    <td></td>
                    <?php
                    if($balance['debit_credit'] == 0)
                    {
                      $deb_total=0;$cred_total=0;
                    }
                    else if($balance['debit_credit'] == 2)
                    {
                    ?>
                    <td>Balance b/d</td>
                    <td><?php echo $balance['balance']; ?><?php if(isset($balance['balance'])){ $deb_total=$balance['balance'];$cred_total = 0; } ?></td>
                    <?php
                    }
                    else
                    {
                    ?>
                    <td></td>
                    <td></td>
                    <?php
                    }
                    ?>
                    <td></td>
                    <td></td>
                    <?php
                    if($balance['debit_credit'] == 1)
                    {
                    ?>
                    <td>Balance b/d</td>
                    <td><?php echo $balance['balance']; ?><?php if(isset($balance['balance'])){ $cred_total=$balance['balance'];$deb_total=0; } ?></td>
                    <?php
                    }
                    else
                    {
                    ?>
                    <td></td>
                    <td></td>
                    <?php
                    }
                    ?>
                  </tr>
              <?php 
                }
                $deb_count = count($debit);
                $cre_count = count($credit);
                if ($deb_count > $cre_count) 
                {
                  $count = $deb_count;
                }
                else if($cre_count > $deb_count)
                {
                  $count = $cre_count;
                }
                else
                {
                  $count = $cre_count;
                }
                for ($i=0; $i < $count ; $i++) 
                { 
                ?>
                <tr>
                  <td><?php if(isset($debit[$i]['journal_date'])) echo  $debit[$i]['journal_date'] ?></td>
                  <td><?php if(isset($debit[$i]['ledger_head'])) echo $debit[$i]['ledger_head'] ?></td>
                  <td><?php if(isset($debit[$i]['credit_amt'])) echo $debit[$i]['credit_amt'];?></td>  

                  <td></td>

                  <td><?php if(isset($credit[$i]['journal_date'])) echo  $credit[$i]['journal_date'] ?></td>
                  <td><?php if(isset($credit[$i]['ledger_head'])) echo $credit[$i]['ledger_head'] ?></td>
                  <td><?php if(isset($credit[$i]['debit_amt'])) echo $credit[$i]['debit_amt'];?></td>
                </tr>
                <?php
                if(isset($debit[$i]['credit_amt'])){$deb_total = $deb_total + $debit[$i]['credit_amt'];}
                if(isset($credit[$i]['debit_amt'])){$cred_total = $cred_total + $credit[$i]['debit_amt'];}
                }
                if(isset($deb_total))
                {
                  if($cred_total > $deb_total)
                  {
                  ?>
                    <tr>
                      <td></td>
                      <td>Balance c/d</td>
                      <td><?php echo $cred_total-$deb_total; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><label><?php echo $cred_total; ?></label></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><label><?php echo $cred_total; ?></label></td>
                    </tr>
                  <?php
                  }
                  if($deb_total > $cred_total)
                  {
                  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Balance c/d</td>
                      <td><?php echo $deb_total-$cred_total; ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><label><?php echo $deb_total; ?></label></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><label><?php echo $deb_total; ?></label></td>
                    </tr>
                  <?php
                  }
                }
              }
              ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
  