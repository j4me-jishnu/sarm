
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
                  <th>NAME</th>
                  <th>ITEM</th>
                  <th>TOTAL</th>
                  <th>ADVANCE</th>
                  <th>NET BALANCE</th>
                  <th>PAID AMOUNT</th>
                  <th>PAYMENT BALANCE</th>
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
  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Peice Employee Lists</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ITEM</th>
                <th scope="col">PCS/KG</th>
                <th scope="col">RATE</th>
              </tr>
            </thead>
            <tbody id="lists1">
    
            </tbody>
          </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
<!-- End Modal -->