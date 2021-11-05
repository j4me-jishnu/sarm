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
               <input type="hidden" name="emp_pr_id" value="<?php if(isset($records[0]->emp_pr_id)) echo $records[0]->emp_pr_id ?>"/>
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
                          <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->emp_pr_cmp_id)) if ($records[0]->emp_pr_cmp_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Employee Name <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_name" id="employname"  value="<?php if(isset($records[0]->emp_pr_name)) echo $records[0]->emp_pr_name ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Address</label>

                    <div class="col-sm-5">
                      <textarea class="form-control" name="employ_pr_address"> <?php if(isset($records[0]->emp_pr_address)) echo $records[0]->emp_pr_address ?> </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_phone" id="custphone"  value="<?php if(isset($records[0]->emp_pr_phone)) echo $records[0]->emp_pr_phone ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employ_pr_email" id="custemail"  value="<?php if(isset($records[0]->emp_pr_email)) echo $records[0]->emp_pr_email ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Remark</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="employ_pr_remark" id="employsalary"  value="<?php if(isset($records[0]->emp_pr_material_ty)) echo $records[0]->emp_pr_material_ty ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Piece Rate</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="employ_pr_rate" id="employsalary"  value="<?php if(isset($records[0]->emp_pr_piece_rate)) echo $records[0]->emp_pr_piece_rate ?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Old Balance</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="old_pr_balance2" id="old_balance2"  value="<?php if(isset($records[0]->emp_pr_old_bal)) echo $records[0]->emp_pr_old_bal ?>">
                    </div>
                  </div>
                  <?php if(isset($records[0]->emp_pr_act_status)){ ?>
                  <div class="form-group" style="margin-left: 420px;">
                    <div class="col-sm-2">
                        <input type="radio" name="emp_pr_act_status" <?php echo ($records[0]->emp_pr_act_status == 0) ?  "checked" : "" ;  ?> id="active" value="0">
                        <label for="active">Active</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="radio" name="emp_pr_act_status" <?php echo ($records[0]->emp_pr_act_status == 1) ?  "checked" : "" ;  ?> id="inactive" value="1">
                        <label for="inactive">InActive</label>
                    </div>
                  </div>
                  <?php } ?>  
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