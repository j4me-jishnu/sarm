<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Overtime</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Overtime Details</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>Overtime/add" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table id="product_table" class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>S.NO</th>
                <th>COMPANY</th>
                <th>EMPLOYEE NAME</th>
                <!-- <th>MONTH</th> -->
                <th>DATE</th>
                <th>AMOUNT</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </section>
</div>
