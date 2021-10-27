<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Product</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addItem">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Product Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="product_id" value="<?php if(isset($records->product_id)) echo $records->product_id ?>" >
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Company<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <select name="company" id="company" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($company as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records->company_id)) if ($records->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              <?php } ?>
              <div class="form-group">
              <?php
              ?>
                <label for="product_name" class="col-sm-4 control-label">Supplier Name<span style="color:red">*</span></label>
                <div class="col-sm-5" id="supp_div">
                    <select class="form-control" name="supp_id" id="supp_id">
                      <option selected disabled>Select Supplier</option>
                      <?php
                      foreach ($supplier as $key) {
                      ?>
                      <option value="<?php echo $key->supplier_id; ?>" <?php if(isset($records->supplier_id)) if ($records->supplier_id == $key->supplier_id)  echo "selected" ?>><?php echo $key->supplier_name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
                <!-- <div class="col-sm-5" id="supp_section" hidden>
                 <select name="supp_id" id="supp_id" class="form-control" required>
                  </select>
                </div> -->   
              </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Main Category <span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="maincategory" class="form-control" id="maincategory" required>
                      <option></option>
                      <?php
                      foreach ($mainCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->category_id ?>" <?php if(isset($records->main_category_id)) if ($records->main_category_id == $row->category_id)  echo "selected" ?>><?php echo $row->category_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Sub Category <span style="color:red">*</span></label>
                  <div class="col-sm-5" id="subcategory_div">
                    <select name="subcategory" id="subcategory" class="form-control">
                      <option></option>
                      <?php
                      foreach ($subCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->subcategory_id ?>" <?php if(isset($records->subcategory_id)) if ($records->subcategory_id == $row->subcategory_id)  echo "selected" ?>><?php echo $row->subcategory_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <!-- <div class="col-sm-5" id="subcategory_section" hidden>
                      <select name="subcategory" id="subcategory" class="form-control" required>
                      </select>
                  </div> -->
                </div>

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Product Code<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="product_code" id="product_code"  value="<?php if(isset($records->product_code)) echo $records->product_code ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Product Name<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="product_name" id="product_name"  value="<?php if(isset($records->product_name)) echo $records->product_name ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description</label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="product_description"><?php if(isset($records->product_description)) echo $records->product_description ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Unit<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="product_unit" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($unit as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->unit_id ?>" <?php if(isset($records->product_unit)) if ($records->product_unit == $row->unit_id)  echo "selected" ?>><?php echo $row->unit_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Opening Stock<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="opening_stock" id="opening_stock"  value="<?php if(isset($records->stock)) echo $records->stock ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Minimum Stock<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="min_stock" id="min_stock"  value="<?php if(isset($records->min_stock)) echo $records->min_stock ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Product Mode<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <label class="radio-inline">
                      <input type="radio" name="p_type" value="0" <?php if (@$records->goods_or_service==0) echo "checked";?>>Goods
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="p_type" value="1" <?php if (@$records->goods_or_service==1) echo "checked";?>>Service
                  </div>
                </div>      
                <div class="form-group">
                  <center><label class="col-sm-2 control-label">Enter Price Details Here.</label></center><hr>
                </div>

                <?php for ($i=0;$i < count($price_category);$i++ ){ ?>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label"><?php echo $price_category[$i]->pcategory_name  ?><span style="color:red">*</span></label>
                  <input type="hidden" name="pcat_id[]" value="<?php echo $price_category[$i]->pcategory_id ?>">
                  <div class="col-sm-5">
                    <input type="text" name="price[]" class="form-control" value="<?php if(isset($prices)) if($price_category[$i]->pcategory_id == $prices[$i]->pcategory_id) echo $prices[$i]->item_price ?>">
                  </div>  
                </div>
              <?php }?>
                <div class="form-group">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
                </div>
            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
