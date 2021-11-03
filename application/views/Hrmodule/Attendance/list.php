
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Attendance List</h3>
            </div>
            <!-- <div class="col-sm-2">
              <a href="<?php echo base_url();?>addCustomer" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div> -->
          </div>
        </div>
        <div class="box-body">

          <div class="row">
            <div class="form-group">
              <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">Date</button>
                  </div><!-- /btn-group -->
                  <div id="result" type="hidden"></div>
                    <input type="text" required  placeholder="Date" class="form-control" id="date" name="att_date" value="<?php echo date('d/m/Y') ?>">                </div><!-- /input-group -->
              </div>
              
              <div class="form-group">
                <div class="col-md-3">
                  <div class="input-group margin">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary nohover">Company</button>
                    </div><!-- /btn-group -->
                    <div id="result" type="hidden"></div>
                      <select name="company" id="company" class="form-control" required>
                        <option></option>
                        <?php
                        foreach ($company as $row)
                        {
                          ?>
                          <option value="<?php echo $row->cmp_id ?>"><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <table id="attendence_table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>SlNo.</th>
            <th>Employee Name</th>
            <th>Attendance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select all&nbsp;&nbsp;&nbsp;<input type="checkbox" id="pickbox_all"></th>
            <th>Date</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          </table>
          <div class="modal-footer">
          <button type="button" onclick="submit()" id="update" class="btn btn-primary option">UPDATE</button>
          </div>

        </div>
      </div>
    </section>
</div>
<!-- pop-up modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Dates</h4>
        </div>
      <form action="" name="form" method="POST">
        <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="emp">Employee</label>
            <input type="hidden" class="form-control" id="emp_ide" name="emp_id">
            <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Employee Name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="emp">Select Dates</label>
            <input type="text" required  placeholder="Date" class="form-control" id="date2" name="atte_dates[]" value="">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <button type="submit" id="submit_date" onclick="multi_submit()" class="btn btn-primary">Submit</button>
        </div>
      </div>
      </form>
    </div>
    </div>
</div>
<!-- end of pop-up modal -->