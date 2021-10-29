<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <small class="col-md-6">Financial Year: <?php if(isset($fin_year->fin_year)){echo $fin_year->fin_year;} ?></small>
        <small id="date" class="col-md-6"></small>
        <!-- <small>Time: 4:00 PM</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon" style="color: #f25500;"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Customers</span>
              <span class="info-box-number" id="customer"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon " style="color: #04936c;"><i class="fa fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Vendor</span>
              <span class="info-box-number" id="vendor"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon" style="color: #fc0303;"><i class="fa fa-archive"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Stock</span>
              <span class="info-box-number" id="stock"></span>
            </div>
          </div>
        </div> 
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon " style="color: #f6c12f;"><i class="fa fa-male"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Employees</span>
              <span class="info-box-number" id="employee"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      <!-- /.row -->
		
			 
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       
        <!-- /.col -->

        
        <!-- /.col -->
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div





