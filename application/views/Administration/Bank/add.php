<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Bank</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Bank/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Bank Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="bank_id" value="<?php if(isset($records[0]->bank_id)) echo $records[0]->bank_id ?>" >
              <?php
              if ($this->session->userdata['user_type'] =='A')
              {
              ?>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Company<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="company" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($company as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->bank_cmp)) if ($records[0]->bank_cmp == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
              </div>
              <?php
              }
              ?>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Bank<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="bank_name" id="bank_name"  value="<?php if(isset($records[0]->bank_name)) echo $records[0]->bank_name ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Account Number<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="acc_no" id="acc_no"  value="<?php if(isset($records[0]->bank_accno)) echo $records[0]->bank_accno ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Branch<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="bank_branch" id="bank_branch"  value="<?php if(isset($records[0]->bank_branch)) echo $records[0]->bank_branch ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">IFSC Code<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="bank_ifsc" id="bank_ifsc"  value="<?php if(isset($records[0]->bank_ifsc)) echo $records[0]->bank_ifsc ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Opening Balance<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="opening_bal" id="oepning_bal"  value="<?php if(isset($records[0]->old_balance)) echo $records[0]->old_balance ?>">
                  </div>
              </div>
              <div class="form-group text-center">
                  <div class="col-sm-12">
                  <label class="radio-inline">
                    <input type="radio" name="bank_type" <?php if(@$records[0]->bank_debit_credit==0) echo "checked" ?> value="0">Debit
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="bank_type" <?php if(@$records[0]->bank_debit_credit==1) echo "checked" ?> value="1">Credit
                  </label>
                  </div>
              </div>
              <div class="form-group text-center">
                  <div class="col-sm-12">
                  <label class="radio-inline">
                    <input type="radio" name="bank_status" <?php if(@$records[0]->bank_act_status==0) echo "checked" ?> value="0">Active
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="bank_status" <?php if(@$records[0]->bank_act_status==1) echo "checked" ?> value="1">InActive
                  </label>
                  </div>
              </div>
              <div class="form-group">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>