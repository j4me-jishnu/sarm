<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<section class="content-header">
      <h1>
       Attendance Report
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

        <!--<li><a href="<?php echo base_url();?>product/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>-->
        <li class="active">Attendance Report</li>
      </ol>
    </section>

     <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="form-group">
			<div class="col-md-3">
			<div class="input-group margin">
				<div class="input-group-btn">
					<button type="button" class="btn btn-primary nohover">Employee Name</button>
				</div><!-- /btn-group -->
					<input type="text" class="form-control" id="emp_name" name="emp_name" Placeholder="Employee Name">
			</div><!-- /input-group -->	
			</div>
			<div class="col-md-8">
				<div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Start Date</button>
					</div><!-- /btn-group -->
						<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-4 form-control" placeholder="dd/mm/yyyy" value="<?php echo date('01/m/Y'); ?>">
						<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
					
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">End Date</button>
					</div><!-- /btn-group -->  
						<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-4 form-control" placeholder="dd/mm/yyyy" value="<?php $a_date = date('Y-m-d'); echo date("t-m-Y", strtotime($a_date)); ?>">
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
					<div class="col-sm-7">
					</div>
					<div class="col-sm-1">
					<div class="input-group-btn">
						<button type="button" id="search" class="btn btn-primary nohover" >Search</button>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
      <div class="row">
	  <div class="box">
            <div class="box-header"> 
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
			  <div class="col-md-1"><h2 class="box-title"></h2> </div>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			
              <table id="attendance_table" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>SINO</th>
					          <th>DATE</th>
                    <th>EMPLOYEE NAME</th>
                    <!--<th>STATUS</th>
                    <th><center>EDIT/DELETE</center></th>-->
				        </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
			<center><h4><strong>ABSENTEES DETAILS</strong></h4></center>
			  <table id="absent_table" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>SINO</th>
					<th>DATE</th>
                    <th>EMPLOYEE NAME</th>
                    <!--<th>STATUS</th>
                    <th><center>EDIT/DELETE</center></th>-->
				</tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div><!-- /.box-body -->
			
	</div>
          <!-- /.box -->
	</div>

</section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->






