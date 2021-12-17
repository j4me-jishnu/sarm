<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Update Stock</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>StockUpdateEdit">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Stock Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="product_ide" value="<?php if(isset($stocks[0]->product_id)) echo $stocks[0]->product_id; ?>" >
              
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Shop Name</label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="shop_name" id="shop_name"  value="<?php if(isset($stocks[0]->cmp_name)) echo $stocks[0]->cmp_name; ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Product Name</label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="product_name" id="product_name"  value="<?php if(isset($stocks[0]->product_name)) echo $stocks[0]->product_name; ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Opening Stock</label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="opening_stock" id="opening_stock"  value="<?php if(isset($stocks[0]->opening_stock)) echo $stocks[0]->opening_stock; ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Total Stock</label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="total_stock" id="total_stock"  value="<?php if(isset($total_stock)) echo $total_stock ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Available Stock<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="avail_stock" id="avail_stock"  value="<?php if(isset($stocks[0]->stock_qty)) echo $stocks[0]->stock_qty; ?>" readonly>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Damaged Stock<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="damaged_stock" id="damaged_stock"  value="<?php if(isset($stocks[0]->damaged_stock)) echo $stocks[0]->damaged_stock; ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Remark</label>

                  <div class="col-sm-5">
                  <textarea class="form-control" id="remarks" name="remarks" rows="3"><?php if(isset($stocks[0]->remark)) echo $stocks[0]->remark; ?></textarea>
                  </div>
              </div>
              <div class="form-group" style="margin-left: 55px;">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>