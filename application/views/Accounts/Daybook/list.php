<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daybook Cash/Bank</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
              <div class="col-sm-3">
                <h3>Daybook Cash/Bank</h3>  
              </div>
          </div>
          <div class="row">
            <form method="post" action="<?php echo base_url(); ?>Daybook/get">
            <div class="col-md-3">
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
                <div class="input-group margin" style="margin-top:20px;">
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
            <div class="col-sm-3">
              <label></label>
              <select class="form-control ledgerhead" name="ledger_head" id="ledger_head" required>
                <option></option>
                <?php
                foreach ($bank_acc as $key) {
                ?>
                <option value="<?php echo $key->ledgerhead_id ?>" <?php if(isset($ledger_head)) if ($ledger_head == $key->ledgerhead_id)  echo "selected" ?>><?php echo $key->ledger_head ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-sm-3">
              <br>
              <label class="col-sm-4" align="right">Date</label>
              <div class="col-sm-8">
                <input type="text" name="day" id="day" value="<?php if(isset($day)) echo $day  ?>" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-3">
              <br>
              <input type="submit" name="btn" class="btn btn-primary btn-md" value="Search">
            </div>
            </form>
          </div>
        </div>
        <div class="box-body">

          <table id="area_table" align="center" width="800" class="table-bordered table-condensed table-striped">
               <thead>
                <tr>
                  <th>DATE</th>
                  <th>ACCOUNT</th>
                  <th>DEBIT AMOUNT</th>                  
                  <th>CREDIT AMOUNT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (empty($records)) 
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
                  for($i=0 ; $i< count($records) ; $i++)
                  {
                  ?>
                    <tr>
                      <td><?php echo $records[$i]['journal_date'] ?></td>
                      <td><?php echo $records[$i]['ledger_head'] ?></td>
                      <td><?php echo $records[$i]['debit_amt'];
                          $deb_total=$deb_total+$records[$i]['debit_amt'] ?>
                      </td>
                      <td><?php echo $records[$i]['credit_amt']; 
                          $cred_total=$cred_total+$records[$i]['credit_amt'] ?>    
                      </td>
                    </tr>
                  <?php
                  }  
                }
                ?>
                <tr>
                  <td colspan="4"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><?php if(isset($deb_total)) echo $deb_total; ?></td>
                  <td><?php if(isset($cred_total)) echo $cred_total; ?></td>
                </tr>
                </tbody>
          </table>

        </div>
      </div>
    </section>
</div>
