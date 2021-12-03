
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Stock Report
        <!-- <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url();?>Expense/add"><i class="fa fa-dashboard"></i> Back to Add</a></li>
        <li class="active">Stock Details</li>
      </ol>
    </section>

     <!-- Main content -->
    <section class="content">
    <div class="row">
		<div class="form-group">
			<div class="col-md-6">
			<div class="input-group margin">
				<div class="input-group-btn">
					<button type="button" class="btn btn-primary nohover">Item Name</button>
				</div><!-- /btn-group -->
					<input type="text" class="form-control" id="item_name" name="item_name" Placeholder="Item Name">
			</div><!-- /input-group -->	
			</div>
			<div class="col-md-6 ">
				<div class="input-group margin">
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
		
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="expense_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>ITEM CODE</th>
                  <th>ITEM NAME</th>
                  <th>FINANCIAL YEAR</th>
                  <th>STOCK</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
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






