<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Advance Payment</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>PayAdvance/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Advance Payment Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="adv_id" value="<?php if(isset($records->adv_id)) echo $records->adv_id ?>">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Company</label>

                <div class="col-sm-5">
                  <input type="text" name="com_name" class="form-control" value="<?php if(isset($records->cmp_name)) echo $records->cmp_name ?>" readonly>
                  <input type="hidden" name="company" value="<?php if(isset($records->cmp_id)) echo $records->cmp_id ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Employee Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="com_name" class="form-control" value="<?php if(isset($records->emp_name)) echo $records->emp_name ?>" readonly>
                  <input type="hidden" name="emp" value="<?php if(isset($records->emp_id)) echo $records->emp_id ?>">
                </div>
              </div>
              <div class="form-group">
        
                <div class="control-label col-md-4">
                <label for="exampleInputEmail1">Month</label>
                </div>
                
                <div class="col-md-5">
                <select class="form-control" name="payroll_salmonth" id="payroll_salmonth">
                  <option>----Please Select----</option>
                  <option value="1" <?php if(isset($records->adv_month)) if ($records->adv_month == 1) echo "selected"; ?>>January</option>
                  <option value="2" <?php if(isset($records->adv_month)) if ($records->adv_month == 2) echo "selected"; ?>>February</option>
                  <option value="3" <?php if(isset($records->adv_month)) if ($records->adv_month == 3) echo "selected"; ?>>March</option>
                  <option value="4" <?php if(isset($records->adv_month)) if ($records->adv_month == 4) echo "selected"; ?>>April</option>
                  <option value="5" <?php if(isset($records->adv_month)) if ($records->adv_month == 5) echo "selected"; ?>>May</option>
                  <option value="6" <?php if(isset($records->adv_month)) if ($records->adv_month == 6) echo "selected"; ?>>June</option>
                  <option value="7" <?php if(isset($records->adv_month)) if ($records->adv_month == 7) echo "selected"; ?>>July</option>
                  <option value="8" <?php if(isset($records->adv_month)) if ($records->adv_month == 8) echo "selected"; ?>>August</option>
                  <option value="9" <?php if(isset($records->adv_month)) if ($records->adv_month == 9) echo "selected"; ?>>September</option>
                  <option value="10" <?php if(isset($records->adv_month)) if ($records->adv_month == 10) echo "selected"; ?>>October</option>
                  <option value="11" <?php if(isset($records->adv_month)) if ($records->adv_month == 11) echo "selected"; ?>>November</option>
                  <option value="12" <?php if(isset($records->adv_month)) if ($records->adv_month == 12) echo "selected"; ?>>December</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Basic Salary </label>

                  <div class="col-sm-5">
                    <input type="text" readonly id="payroll_basicpay" name="payroll_basicpay" class="form-control calc-salary" value="<?php if(isset($records->emp_salary)) echo $records->emp_salary ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Advance Salary <span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" id="payroll_ta" name="payroll_ta" class="form-control calc-salary" value="<?php if(isset($records->adv_amount)) echo $records->adv_amount ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Advance Salary Date </label>

                  <div class="col-sm-5">
                    <input type="text" placeholder="dd/mm/yyyy" id="payroll_salarydate" name="payroll_salarydate" class="form-control" value="<?php if(isset($records->adv_date)) echo $records->adv_date ?>" >
                  </div>
              </div>
              <div class="form-group">
                <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>