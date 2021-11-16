
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employee</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-6">
              <h3>Employee List</h3>  
            </div>
            <div class="col-sm-4" style="float:right">
              <div class="row">
                <div class="col-md-4">
                  <a href="<?php echo base_url();?>addEmployee" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i> Add Employee</a>
                </div>
                <div class="col-md-4">
                <button class="btn btn-sm common-btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-money"></i> Peice Rate</button>
                </div>
              </div>
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
                  <th>TYPE</th>
                  <th>SALARY</th>
                  <th>STATUS</th>
                  <th>DATE OF JOINING</th>
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

<!-- Pop Up Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Peice Rate</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="date_pr">Salary Date</label>
            <input type="date" class="form-control" id="date_pr" aria-describedby="date_pr" placeholder="Select Date">
          </div>
           <div class="form-group">
              <label for="exampleFormControlSelect1">Example select</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>SELECT</option>
                <option>Manohar</option>
                <option>Roshan</option>
              </select>
            </div>
          <div class="form-group">
            <label for="quantity_pr">Choose Quantity</label>
            <input type="text" class="form-control" id="quantity_pr" placeholder="Select">
          </div>
          <div class="form-group">
            <label for="item_pr">Rate</label>
            <input type="text" class="form-control" id="item_pr" >
          </div>
          <div class="form-group">
            <label for="total_pr">Total Rate</label>
            <input type="text" class="form-control" id="total_pr" >
          </div>
          <div class="form-group">
            <label for="advance_pr">Advance</label>
            <input type="text" class="form-control" id="advance_pr" >
          </div>
          <div class="form-group">
            <label for="net_total_pr">Net Total</label>
            <input type="text" class="form-control" id="net_total_pr" >
          </div>
          <div class="form-group">
            <label for="Paid_pr">Paid</label>
            <input type="text" class="form-control" id="Paid_pr" >
          </div>
          <div class="form-group">
            <label for="Balance_pr">Balance</label>
            <input type="text" class="form-control" id="Balance_pr" >
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End -->