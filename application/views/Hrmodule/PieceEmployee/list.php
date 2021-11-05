
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee Piece Rate</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6">
              <h3>Employee Piece Rate List</h3>  
            </div>
            <div class="col-sm-2" style="float: right; margin-top:20px; margin-right:30px;">
              <a href="<?php echo base_url();?>addPieceEmployee" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add Piece Rate Employee</a>
            </div>  
          </div>
        </div>
        <div class="box-body">
            <table id="employee_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SlNO.</th>
                  <th>COMPANY NAME</th>
                  <th>NAME</th>
                  <th>ADDRESS</th>
                  <th>PHONE</th>
                  <th>EMAIL</th>
                  <th>REMARK</th>
                  <th>RATE</th>
                  <th>STATUS</th>
                  <th>EDIT/DELETE</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
      </div>
    </section>
</div>