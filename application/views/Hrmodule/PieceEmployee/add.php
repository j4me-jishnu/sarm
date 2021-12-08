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
               <input type="hidden" name="emp_pr_edit_id" value="<?php if(isset($records[0]->emp_id)) echo $records[0]->emp_id ?>"/>
               <input type="hidden" name="emp_pr_pay_id" value="<?php if(isset($records[0]->emp_pr_pay_id)) echo $records[0]->emp_pr_pay_id ?>"/>
               <?php echo validation_errors(); ?>
               <div class="box-body">

                <div class="form-group">
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Select Employee</label>

                    <div class="col-sm-5">
                      <select name="emp_pr_id" class="form-control" required>
                        <option>SELECT</option>
                        <?php
                        foreach ($employee as $row) 
                        {
                          ?>
                          <option value="<?php echo $row->emp_id; ?>" <?php echo (@$records[0]->emp_id == $row->emp_id ) ? 'selected':'' ?>><?php echo $row->emp_name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <!-- Dynamic Table -->
                  <div class="container" style="margin-left: 10px;">
                  <button type="button" class='delete btn btn-danger'>- Delete</button>
                  <button type="button" class='addmore btn btn-success'>+ Add More</button>
                  <table  class="table table-bordered" id="supercelltable"  CELLSPACING=0 style="width:1100px;">
                    <tr>
                      <th scope="col"><input class='check_all' type='checkbox' onclick="select_all()"/></th>
                      <th scope="col">S. No</th>
                      <th scope="col">ITEM</th>
                      <th scope="col">PCS/KG</th>
                      <th scope="col">RATE</th>
                      <th scope="col">TOTAL</th>
                    </tr>
                    <?php
                    if(isset($itemlist)){
                      $i = 1;
                     foreach($itemlist as $itemlists){ ?>
                     <?php $total = $itemlists->emp_pr_kg_pcs * $itemlists->emp_pr_rate;?>
                      <tr>
                      <td><input type='checkbox' class='case'/></td>
                      <td><span id='snum'><?php echo $i; ?>.</span></td>
                      <td><input type='text' class="form-control" value="<?php echo $itemlists->emp_pr_item ?>" id='pr_item_1' name='pr_item[]'/></td>
                      <td><input type='text' class="form-control" value="<?php echo $itemlists->emp_pr_kg_pcs ?>" id='pr_pcs_kg_1' name='pr_kg_pc[]'/></td>
                      <td><input type='text' class="form-control" value="<?php echo $itemlists->emp_pr_rate ?>" id='pr_rate_1' onchange="calFun(1)" name='pr_rate[]'/></td>
                      <td><input type='text' class="form-control" value="<?php echo $total ?>" id='tot_1' onchange="totalFun(1)" name="pr_total[]"/> </td>
                      <td><input type="hidden" value="<?php echo $itemlists->emp_pr_id ?>" name="pr_table_id[]"></td>
                    </tr>
                    <?php $i++; } }else{ ?>
                    <tr>
                      <td><input type='checkbox' class='case'/></td>
                      <td><span id='snum'>1.</span></td>
                      <td><input type='text' class="form-control" id='pr_item_1' name='pr_item[]'/></td>
                      <td><input type='text' class="form-control" id='pr_pcs_kg_1' name='pr_kg_pc[]'/></td>
                      <td><input type='text' class="form-control" id='pr_rate_1' onchange="calFun(1)" name='pr_rate[]'/></td>
                      <td><input type='text' class="form-control" id='tot_1' onchange="totalFun(1)" name="pr_total[]"/> </td>
                    </tr>
                    <?php } ?>
                  </table>
                  </div>
                  <!-- End of Dynaic Table -->
                  <br>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Total <span style="color:red">*</span></label>

                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="emp_pr_total" id="emp_pr_total"  value="<?php if(isset($records[0]->emp_pr_pay_total)) echo $records[0]->emp_pr_pay_total ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Advance</label>
                        
                    <div class="col-sm-5">
                    <input type="number"  class="form-control" onchange="advanceFun()" name="emp_pr_advance" id="emp_pr_adv"  value="<?php if(isset($records[0]->emp_pr_pay_advance)) echo $records[0]->emp_pr_pay_advance ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Net Balance</label>
                    <div class="col-sm-5">
                      <input type="number"  class="form-control"  name="emp_pr_net_bal" id="emp_pr_net_bal"  value="<?php if(isset($records[0]->emp_pr_net_bal)) echo $records[0]->emp_pr_net_bal ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Paid Amount</label>

                    <div class="col-sm-5">
                      <input type="number"  class="form-control" onchange="paidFun()" name="emp_pr_paid_amt" id="emp_pr_pay_amt"  value="<?php if(isset($records[0]->emp_pr_paid_amt)) echo $records[0]->emp_pr_paid_amt ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Balance</label>

                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="emp_pr_balance" id="emp_pr_balance"  value="<?php if(isset($records[0]->emp_pr_pay_balance)) echo $records[0]->emp_pr_pay_balance ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="size_name" class="col-sm-4 control-label">Salary Date</label>

                    <div class="col-sm-5">
                      <input type="date" class="form-control" name="emp_pr_date" id="emp_pr_date"  value="<?php if(isset($records[0]->emp_pr_pay_date)) echo $records[0]->emp_pr_pay_date ?>">
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