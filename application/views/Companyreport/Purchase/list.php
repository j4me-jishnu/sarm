<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Report
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Purchase/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Purchase Report</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-3">
			   <div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Invoice No.</button>
					</div><!-- /btn-group -->
					<input type="text" name="purchase_invoice_no" placeholder="Invoice No" id="purchase_invoice_no" class="form-control">
				</div><!-- /input-group -->
			</div>
			<!-- <div class="col-md-3">
			   <div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Customer Name</button>
					</div>
					<input type="text"  class="form-control"  id="product"  placeholder="Customer Name">
				</div>
			</div> -->
			<div class="col-md-4">
				<div class="input-group margin">
					<div class="input-group-btn">
					<button type="button" class="btn btn-primary nohover">Date </button>
					</div><!-- /btn-group -->
					<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
						
					<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
				</div>
			</div>
					
			<div class="col-sm-1">
					<div class="input-group">
						<button type="button" id="search" class="btn btn-primary btn-flat margin" onclick="">Search</button>
					</div>
			</div>
			<div class="col-sm-1">
				<div class="input-group">
					<a href="<?php echo base_url();?>purchaseReport"><button class="btn btn-primary btn-flat margin" >Refresh</button></a>
				</div>
			</div>
		</div>
		<div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title"></h2> </div>
			  
			  <!--<div class="col-md-2">
                  <a href="<?php echo base_url();?>index.php/sale/" class="btn btn-success"><i class="glyphicon glyphicon-user"></i>Sale List</a>
              </div>-->
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="sale_details_table" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>SINO</th>
					<th>INVOICE NO</th>
                    <th>REFERENCE NO</th>
					<th>CUSTOMER NAME</th>
					<th>PURCHASE DATE</th>
					<th>PURCHASE QTY</th>
					<th>PRICE</th>
					<th>TAX</th>
                    <th>FREIGHT</th>
                    <th>PACKING</th>
                    <th>TOTAL</th>
                    <th>NET TOTAL</th>
                    <th>OLD BALANCE</th>
                    <th>NET BALANCE</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
	</div>
   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->






