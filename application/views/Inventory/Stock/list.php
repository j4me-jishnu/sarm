<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Stock</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Stock List</h3>  
            </div>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Supplier</button>
                </div>
                <select id="supplier" class="form-control"> 
                  <!-- <option selected disabled>Select Supplier</option> -->
                  <?php
                  foreach ($supplier as $key) {
                  ?>
                  <option value="<?php echo $key->supplier_id; ?>"><?php echo $key->supplier_name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Category</button>
                </div>
                <select id="mainCategory" class="form-control">
                  <?php
                  foreach ($mainCategory as $row) 
                  {
                    ?>
                    <option value="<?php echo $row->category_id ?>"><?php echo $row->category_name; ?></option>
                    <?php
                  }
                  ?>  
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Sub Category</button>
                </div>
                <select id="subcategory" class="form-control">  
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <button style="margin-top: 10px;" type="button" class="btn btn-md btn-primary" id="search_button">Search</button>&nbsp;<button style="margin-top: 10px;" type="button" class="btn btn-primary nohover" id="refresh">Refresh</button>
            </div>
          </div>
            <div class="box-body table-responsive">
              <table id="stock_table" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>SINO</th>
                    <th>SHOP NAME</th>
                    <th>PRODUCT</th>
                    <th>OPENING STOCK</th>
                    <th>AVAILABLE STOCK</th>
                    <th>UPDATE STOCK</th>
                    <th><center>STATUS</center></th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
 </div>
