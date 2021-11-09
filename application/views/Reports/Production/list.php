
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Production Report
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Expense/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Production Details</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
	<div class="row">
	<div class="input-group margin col-md-8">
		<div class="input-group-btn">
		<button type="button" class="btn btn-primary nohover">Start Date</button>
		</div><!-- /btn-group -->
		<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-4 form-control" placeholder="dd/mm/yyyy" >
		<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
		
		<div class="input-group-btn">
		<button type="button" class="btn btn-primary nohover">End Date</button>
		</div><!-- /btn-group -->    
		<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-4 form-control" placeholder="dd/mm/yyyy" >
		<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
		
		<div class="col-sm-8">
		<div class="input-group-btn">
      <div class="row">
        
      <button type="button" id="search" class="btn btn-primary nohover" >Search</button>
      
      <button type="button" id="print" class="btn btn-primary nohover" onclick="showTableData()" >Print</button>
      </div>
		

		</div>
	</div>

	</div>
	</div>
      <div class="row">
		<div class="box">
		
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="raw_material" class="table table-bordered table-striped">
              <center>RAW MATERIAL</center>
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>COMPANY NAME</th>
                  <th>AREA NAME</th>
                  <th>PRODUCT CODE</th>
                  <th>RAW MATERIAL</th>
                  <th>USED QTY</th>
                  <th>DATE</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <table id="output_product" class="table table-bordered table-striped">
                <center>OUTPUT PRODUCT</center>
                <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>COMAPANY NAME</th>
                    <th>AREA NAME</th>
                    <th>PRODUCT CODE</th>
                    <th>OUTPUT PRODUCT</th>
                    <th>OUTPUT QTY</th>
                    <th>DATE</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
     </div>
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






