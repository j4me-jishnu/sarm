<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Payroll</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Payroll/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Add Payroll Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Company</label>

                <div class="col-sm-5">
                  <select name="company" id="company" class="form-control" required>
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
                <label for="size_name" class="col-sm-4 control-label">Employee Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <select class="form-control" id="emp" name="emp"></select>
                </div>
              </div>

              <div class="form-group">

                <div class="control-label col-md-4">
                  <label for="exampleInputEmail1">Month</label>
                </div>

                <div class="col-md-5">
                  <select class="form-control" name="payroll_salmonth" id="payroll_salmonth">
                    <option>----Please Select----</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Basic Salary </label>

                  <div class="col-sm-5">
                    <input type="text" readonly id="payroll_basicpay" name="payroll_basicpay" class="form-control calc-salary" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Advance Amount</label>

                  <div class="col-sm-5">
                    <input type="text" value="0"  id="payroll_balance" name="payroll_balance" class="form-control" >
                  </div>
              </div>

              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Leave Deductions</label>

                  <div class="col-sm-5">
                    <input type="text" readonly id="payroll_leaveamt" name="payroll_leaveamt" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Overtime</label>

                  <div class="col-sm-5">
                    <input type="text" readonly id="overtime_amt" name="overtime_amt" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label"></label>

                  <div class="col-sm-5">
                    <button type="button" class="calc-salary" >Calculate</button>
                  </div>
              </div>

              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Salary </label>

                  <div class="col-sm-5">
                    <input type="text" readonly id="payroll_salary" name="payroll_salary" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                        <label for="size_name" class="col-sm-4 control-label">Salary Date </label>

                        <div class="col-sm-5">
                          <input type="text" placeholder="dd/mm/yyyy" id="payroll_salarydate" name="payroll_salarydate" class="form-control" >
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