<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Purchase</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Purchase List</h3>
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>addPurchase" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Invoice</button>
                </div><!-- /btn-group -->
                <input type="text" name="invoice_number" id="invoice_numbers" class="form-control">
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Supplier</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id" name="supplier_id" id="supplier_id">
                  <option selected disabled>Select Supplier</option>
                  <?php
                  foreach ($supplier as $key) {
                  ?>
                  <option value="<?php echo $key->supplier_id; ?>"><?php echo $key->supplier_name; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover">Date</button>
                </div><!-- /btn-group -->
                <input type="text" name="purchase_date" id="purchase_date" class="form-control">
              </div><!-- /input-group -->
            </div>
          </div>
        </div>
        <div class="box-body">

          <table id="purchase_table" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>SINO</th>
                <th>INVOICE</th>
                <th>VENDOR.NAME</th>
                <th>PURCHASE.DATE</th>
                <th>ITEM.COUNT</th>
                <th>TOTAL.PRICE</th>
                <th>VIEW/INVOICE</th>
                <th>UPDATE.STOCK</th>
                <th>EDIT/DELETE</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

        </div>
      </div>
    </section>
</div>
