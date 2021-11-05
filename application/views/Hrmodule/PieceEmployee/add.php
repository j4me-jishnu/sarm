<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Employee</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addPieceEmployee">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Piece Rate Employee Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <div class="form-group">
               <input type="hidden" name="emp_pr_id" value="<?php if(isset($records->emp_id)) echo $records->emp_id ?>"/>
               <?php echo validation_errors(); ?>
               <div class="box-body">

                <div class="form-group">
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Company</label>

                    <div class="col-sm-5">
                      <select name="company_pr_id" class="form-control" required>
                        <option></option>
                        <?php
                        foreach ($company as $row) 
                        {
                          ?>
                          <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records->company_id)) if ($records->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Employee Name <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_name" id="employname"  value="<?php if(isset($records->emp_name)) echo $records->emp_name ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Address</label>

                    <div class="col-sm-5">
                      <textarea class="form-control" name="employ_pr_address"> <?php if(isset($records->emp_address)) echo $records->emp_address ?> </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_phone" id="custphone"  value="<?php if(isset($records->emp_phone)) echo $records->emp_phone ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_email" id="custemail"  value="<?php if(isset($records->emp_email)) echo $records->emp_email ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Remark</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="employ_pr_remark" id="employsalary"  value="<?php if(isset($records->emp_salary)) echo $records->emp_salary ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Piece Rate</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="employ_pr_rate" id="employsalary"  value="<?php if(isset($records->emp_salary)) echo $records->emp_salary ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Old Balance</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="old_pr_balance2" id="old_balance2"  value="<?php if(isset($records->old_balance)) echo $records->old_balance ?>">
                    </div>
                  </div>
    
                  <div class="form-group" style="margin-left: 420px;">
                    <div class="col-sm-2">
                        <input type="radio" name="emp_pr_act_status" id="active" value="0">
                        <label for="active">Active</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="radio" name="emp_pr_act_status" id="inactive" value="1">
                        <label for="inactive">InActive</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <center> <button type="submit" class="btn btn-primary">Save</button></center>
                  </div>
                </div>

            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>