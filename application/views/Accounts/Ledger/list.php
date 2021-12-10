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
            <div class="col-md-5">
              <div class="col-md-6">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">From</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="date_from" id="date_from" class="form-control" value="<?php if(isset($date_from)) echo $date_from; else  echo date('d/m/Y') ?>">
                </div><!-- /input-group -->
              </div>
              <div class="col-md-6">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">To</button>
                  </div><!-- /btn-group -->
                  <input type="text" name="date_to" id="date_to" class="form-control" value="<?php if(isset($date_to)) echo $date_to; else  echo date('d/m/Y') ?>">
                </div><!-- /input-group -->
              </div>
            </div>
            <div class="col-sm-1">
              <input style="margin-top: 10px;" type="submit" name="submit" value="Submit" class="btn btn-warning">
            </div>
          </div>
        </div>
        </form>
        <div class="box-body">
          <table id="area_table" align="center" width="800" class="table-bordered table-condensed">
            <thead>
              <tr>
                <th>DATE</th>
                <th style="width: 10%;">JOUNAL ID</th>
                <th>PARTICULARS</th>
                <th>DEBIT</th>                  
                <th>CREDIT</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $debit_total=0;
              $credit_total=0;
              if (!$balance && !$result) 
              {
              ?>
              <td colspan="5">No data found</td>
              <?php
              }
              else
              {
                if($balance)
                {
                  if($balance['debit_credit'] == 1)
                  {
                  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Balance b/d</td>
                      <td></td>
                      <td><?php echo $balance['balance']; $credit_total=$credit_total+$balance['balance']; ?></td>
                    </tr>
                  <?php  
                  }
                  elseif($balance['debit_credit'] == 2)
                  {
                  ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>Balance b/d</td>
                      <td><?php echo $balance['balance'];$debit_total=$debit_total+$balance['balance']; ?></td>
                      <td></td>
                    </tr>
                  <?php
                  }  
                }
                if($result)
                {
                  for ($i=0; $i < count($result); $i++) 
                  { 
                  ?>
                  <tr>
                    <td><?php echo $result[$i]['date']; ?></td>
                    <td><?php echo $result[$i]['journal_inv']; ?></td>
                    <td><?php echo $result[$i]['ledgerhead']; ?></td>
                    <td><?php echo $result[$i]['debit'];$debit_total=$debit_total+$result[$i]['debit']; ?></td>
                    <td><?php echo $result[$i]['credit'];$credit_total=$credit_total+$result[$i]['credit']; ?></td>
                  </tr>
                  <?php
                  }
                }
                ?>
                <tr>
                  <td colspan="5"></td>
                </tr>
                <?php 
                  if($debit_total > $credit_total){
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align:right;"></td>
                  <td><label><?php echo $debit_total; ?></label></td>
                  <td><label><?php echo $debit_total; ?></label></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b><?php echo $debit_total - $credit_total?></b></td>
                  <td></td>
                </tr>
                <?php
              }
            else {
            ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td style="text-align:right;"></td>
                  <td><label><?php echo $credit_total; ?></label></td>
                  <td><label><?php echo $credit_total; ?></label></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><b><?php echo $credit_total - $debit_total ?></b></td>
                </tr>
            <?php 
                  }
            }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>