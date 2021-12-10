<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Item</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <form id="multiple" action="<?php echo base_url();?>editMultipleItems" method="post">
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-8">
              <h3>Item List</h3>  
            </div>
            <div class="row">
                <div class="col-md-1">
                  <a href="<?php echo base_url();?>addItem" class="btn btn-sm common-btn" data-inline="true"><i class="fa fa-plus-square"></i> Add New</a>
                </div>
                <div class="col-md-1">
                  <a href="<?php echo base_url();?>importItem" class="btn btn-sm common-btn" data-inline="true"><i class="fa fa-plus-square"></i> Import</a>
                </div> 
                <div class="col-md-1">
                  <!-- <a href="<?php echo base_url();?>editMultipleItems" class="btn btn-sm common-btn"  data-inline="true"><i class="fa fa-edit"></i> Edit Multiple</a> -->
                  <input type="submit" class="btn btn-sm btn-primary" value="Edit Multiple">
                </div>  
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Code</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id" name="product_code" id="product_code">
                  <option selected disabled>Select Code</option>
                  <?php
                  foreach ($codes as $key) {
                  ?>
                  <option value="<?php echo $key->product_code; ?>"><?php echo $key->product_code; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div><!-- /input-group -->
            </div>
          </div>
        </div>
        <div class="box-body">
            <table id="product_table" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>SI.NO</th>
                    <th>SELECT</th>
                    <th>PRODUCT CODE</th>
                    <th>PRODUCT NAME</th>
                    <th>MAIN CATEGORY</th>
                    <th>SUB CATEGORY</th>
                    <th>DESCRIPTION</th>
                    <th>COMPANY</th>
                    <th>EDIT/DELETE</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>         
                </tbody>
            </table>
        </div>
      </div>
    </section>
    </form>
</div>
