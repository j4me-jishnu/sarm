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
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addEmployee">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Employee Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <div class="form-group">
               <input type="hidden" name="emp_id" value="<?php if(isset($records->emp_id)) echo $records->emp_id ?>"/>
               <?php echo validation_errors(); ?>
               <div class="box-body">

                <div class="form-group">
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Company</label>

                    <div class="col-sm-5">
                      <select name="company" class="form-control" required>
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
                  <!-- <div class="form-group" style="text-align:center">
                    <input type="checkbox" class="form-check-input" id="Piece_rate" data-toggle="modal" data-target="#myModal">
                    <label class="form-check-label" for="Piece_rate" >is Piece Rate Employee</label>
                  </div> -->
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Employee Name <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employname" id="employname"  value="<?php if(isset($records->emp_name)) echo $records->emp_name ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Address</label>

                    <div class="col-sm-5">
                      <textarea class="form-control" name="employaddress"> <?php if(isset($records->emp_address)) echo $records->emp_address ?> </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employphone" id="custphone"  value="<?php if(isset($records->emp_phone)) echo $records->emp_phone ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Email</label>

                    <div class="col-sm-5">
                      <input type="text"  required  class="form-control" name="employemail" id="custemail"  value="<?php if(isset($records->emp_email)) echo $records->emp_email ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Date of Joining</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="dob" id="date"  value="<?php if(isset($records->emp_date)){ $date = new DateTime($records->emp_date); echo $date->format('d/m/Y');} ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                    <label class="radio-inline">
                      <input type="radio" id="wages_rate1" onclick="WagesCheck()" name="salary_mode" <?php echo (@$records->emp_mode==0) ? "checked":"" ?> value="0">Wages
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="salary_rate1" onclick="SalaryCheck()" name="salary_mode" <?php echo (@$records->emp_mode==1) ? "checked":"" ?> value="1">Salary
                    </label>
                    <label class="radio-inline">
                      <input type="radio" id="piece_rate1" onclick="peiceRateCheck()" name="salary_mode" <?php echo (@$records->emp_mode==2) ? "checked":"" ?> value="2">Peice Rate
                    </label>
                    </div>
                  </div>      

                  <div class="form-group" id="basic_salary">
                    <label for="size_name" class="col-sm-4 control-label">Basic Salary</label>

                    <div class="col-sm-5" >
                      <input type="text"    class="form-control" name="employsalary" id="employsalary"  value="<?php if(isset($records->emp_salary)) echo $records->emp_salary ?>">
                    </div>
                  </div>
                  
                  <!-- Dynamic Table -->
                  <div class="col-sm-6" id="pr_table" style="display:none; margin-left:250px;">
                  
                    <input type="button" id="add" class="btn btn-success" value="Add Row" onclick="addRow('subscriptionTable')" />

                    <input type="button" id="subtract" class="btn btn-danger" value="Delete Row" onclick="deleteRow('subscriptionTable')" />
                                     
                  <table class="table table-bordered" id="subscriptionTable" width="700px">
                    
                      <tr>
                        <th scope="col">ROW</th>
                        <th scope="col">SR.NO</th>
                        <th scope="col">ITEM</th>
                        <th scope="col">KG/PCS</th>
                        <th scope="col">RATE</th>
                      </tr>
                        <?php if(isset($pr_records)) { ?>
                        <?php foreach($pr_records as $records2) { ?>  
                          <?php echo '<tr><td><input type="checkbox" name="chk" /></td>
                          <td> 1 </td>
                          <td> <input type="text" name="pr_item[]" value="'.$records2->emp_pr_item.'" /> </td>
                          <td> <input type="text" name="pr_kg_pc[]" value="'.$records2->emp_pr_kg_pcs.'" /> </td>
                          <td> <input type="text" name="pr_rate[]" value="'.$records2->emp_pr_rate.'" /> </td></tr>
                          <td><input type="hidden" name="pr_ide[]" value="'.$records2->emp_pr_id.'"></input></td>' ?>
                        <?php } } else { ?>
                      <tr>
                          <td><input type="checkbox" name="chk" /></td>
                          <td> 1 </td>
                          <td> <input type="text" name="pr_item[]" /> </td>
                          <td> <input type="text" name="pr_kg_pc[]"/> </td>
                          <td> <input type="text" name="pr_rate[]"/> </td>
                        <?php } ?>  
                      </tr>                  
                  </table>
                  </div>
                  <!-- End of Dynaic Table -->

                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                    <label class="radio-inline">
                      <input type="radio" name="debit_or_credit" <?php echo (@$records->debit_or_credit==0) ? "checked":"" ?> value="0">Debit
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="debit_or_credit" <?php echo (@$records->debit_or_credit==1) ? "checked":"" ?> value="1">Credit
                    </label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Opening Balance</label>

                    <div class="col-sm-5">
                      <input type="text"    class="form-control" name="old_balance2" id="old_balance2"  value="<?php if(isset($records->old_balance)) echo $records->old_balance ?>">
                    </div>
                  </div>

                  <?php if(isset($records->emp_act_status)){ ?>
                  <div class="form-group">
                    <div class="col-sm-12 text-center">
                    <label class="radio-inline">
                      <input type="radio" name="act_status" <?php echo (@$records->emp_act_status==0) ? "checked":"" ?> value="0">Active
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="act_status" <?php echo (@$records->emp_act_status==1) ? "checked":"" ?> value="1">InActive
                    </label>
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

      <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> -->
    
      <!-- Modal content-->
      <!-- <div class="modal-content" style="border-radius: 5px !important;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Piece Rate Employee Details</h4>
        </div>
        <div class="modal-body" style="margin-left: 30px;">
        <form>
          <div class="form-group col-md-12">
            <label for="emp_name_1">Employee Name</label>
            <input type="text" class="form-control" id="emp_name_1" >
          </div>
          <div class="form-group col-md-12">
            <label for="emp_add_1">Address</label>
            <textarea class="form-control" id="emp_add_1" rows="3"></textarea>
          </div>
          <div class="form-group col-md-12">
          <label for="emp_phone_1">Phone</label>
            <input type="text" class="form-control" id="emp_phone_1">
          </div>
          <div class="form-group col-md-12">
          <label for="emp_email_1">Email</label>
            <input type="text" class="form-control" id="emp_email_1">
          </div>
          <div class="form-group col-md-12">
          <label for="emp_salary_1">Basic Salary</label>
            <input type="text" class="form-control" id="emp_salary_1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div> -->
      
    <!-- </div>
  </div> -->

  </form>
</div>