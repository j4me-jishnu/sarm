

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Reports
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>index.php/purchase/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Purchase Reports</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-3">
			   <div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Invoice No.</button>
					</div>
					<input type="text" name="purchase_invoice_no" placeholder="Invoice No" id="purchase_invoice_no" class="form-control">
				</div>
			</div>
			
                        <div class="col-md-3">
			   <div class="input-group margin">
					<div class="input-group-btn">
						<button type="button" class="btn btn-primary nohover">Name</button>
					</div>
                                        <input type="text" name="vendor_name" placeholder="Vendor Name" id="vendor_name" class="form-control">
				</div>
			</div>
                        <div class="col-md-4">
				<div class="input-group margin">
					<div class="input-group-btn">
					<button type="button" class="btn btn-primary nohover">Date </button>
					</div>
					<input id="pmsDateStart" type="text" data-validation-optional="true" data-pms-max-date="today" data-pms-type="date" name="start_date" data-pms-date-to="pmsDateEnd" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
						
					<input id="pmsDateEnd" type="text" data-validation-optional="true" data-pms-type="date" name="end_date" data-pms-date-from="pmsDateStart" class="col-md-5 form-control" placeholder="dd/mm/yyyy" >
					<span tabindex="-1" class="input-group-btn select-calendar date-range"><button type="button" tabindex="-1" class="btn btn-default"><i class=" fa fa-calendar"></i></button></span>
				</div>
			</div>
					
			<div class="col-sm-1">
					<div class="input-group">
						<button type="button" id="search" class="btn bg-orange btn-flat margin" onclick="<?php if(isset($values->mainhead_id))echo $values->mainhead_id;?>">Search</button>
					</div>
			</div>
			<div class="col-sm-1">
				<div class="input-group">
					<a href="<?php echo base_url();?>index.php/purchase"><button class="btn bg-navy btn-flat margin" >Refresh</button></a>
				</div>
			</div>
		</div>
		
      <div class="row">
        <div class="box">
            <div class="box-header">
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
              <div class="col-md-8"><h2 class="box-title">Purchase Reports</h2> </div>
			  
			  <!--<div class="col-md-2">
                  <a href="<?php echo base_url();?>index.php/sale/" class="btn btn-success"><i class="glyphicon glyphicon-user"></i>Sale List</a>
              </div>-->
			  
              <!--<div class="col-md-2">
                  <a href="<?php echo base_url();?>index.php/purchase/add" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Add Purchase</a>
              </div>
			  
			  <div class="btn-group">
                      <button type="button" class="btn btn-success">Action</button>
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url();?>index.php/product">Products</a></li>
						<li><a href="<?php echo base_url();?>index.php/sale">Sale</a></li>
                                                <li><a href="<?php echo base_url();?>index.php/PurchaseReturns">Purchase Return</a></li>
						<li><a href="<?php echo base_url();?>index.php/stock">Stock Management </a></li>
                        
                      </ul>
                    </div>-->
            </div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="product_reports_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl No.</th>
                    <th>Invoice No</th>
                    <th>Vendor Name</th>
                    <th>Phone Number</th>
                    <th>Mail Id</th>
                    <th>Purchase Date</th>
                    <th>Product count</th>
                    <th>Total Price</th>
                    <th>View / Invoice</th>
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="col-lg-3 col-xs-6 pull-right" >
				  <!-- small box -->
				  <div class="small-box bg-aqua">
					
					<div class="inner">
					  <h3 id="page_amount"></h3>

					  <p>Page Amount</p>
					</div>
					
					<div class="icon">
					  <i class="fa fa-rupee"></i>
					</div>
					<a class="small-box-footer" href="#"></a>
				  </div>
			</div>
            <!-- /.box-body -->
        </div>
	</div>
   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
