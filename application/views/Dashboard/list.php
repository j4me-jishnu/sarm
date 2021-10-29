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
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #17a2b8;color:#f8f9fa;">
              <div class="inner">
                <h3 id="customer"></h3>
                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion-ios-people"></i>
              </div>
              <a href="<?php echo base_url() ?>Customer" class="small-box-footer">More info <i class="ion-android-arrow-dropright-circle"></i></a>
            </div>
          </div>
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#28a745;color:#f8f9fa;">
              <div class="inner">
                <h3 id="vendor"></h3>
                <p>Vendor</p>
              </div>
              <div class="icon">
                <i class="ion-android-cart"></i>
              </div>
              <a href="<?php echo base_url() ?>Supplier" class="small-box-footer">More info <i class="ion-android-arrow-dropright-circle"></i></a>
            </div>
          </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#fd7e14;color:#f8f9fa;">
              <div class="inner">
                <h3 id="stock"></h3>
                <p>Stock</p>
              </div>
              <div class="icon">
                <i class="ion-ios-box"></i>
              </div>
              <a href="<?php echo base_url() ?>Stock" class="small-box-footer">More info <i class="ion-android-arrow-dropright-circle"></i></a>
            </div>
          </div>
        <!-- /.col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#dc3545;color:#f8f9fa;">
              <div class="inner">
                <h3 id="employee"></h3>
                <p>Employees</p>
              </div>
              <div class="icon">
                <i class="ion-man"></i>
              </div>
              <a href="<?php echo base_url() ?>Employee" class="small-box-footer">More info <i class="ion-android-arrow-dropright-circle"></i></a>
            </div>
          </div>
      </div>   
    </section>
    <!-- /.content -->
  </div





