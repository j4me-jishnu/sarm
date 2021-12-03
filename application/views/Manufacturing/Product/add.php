<style type="text/css">
  .select2-container {
    width: 200px !important;
  }
</style>
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
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>ManufacturingProducts/addItem">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Product Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="product_id" value="<?php if(isset($records->product_id)) echo $records->product_id ?>" >

                <ul class="nav nav-tabs" id="mytabs">
                  <li class="active"><a data-toggle="tab" href="#menu_0">Basic Details</a></li>
                  <li><a data-toggle="tab" href="#menu_1">Price Details</a></li>
                  <li><a data-toggle="tab" href="#menu_2">Raw Materials</a></li>
                </ul>

                <div class="tab-content">
                  <div id="menu_0" class="tab-pane fade in active">
                      <div class="form-group"></div>
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
                            <select name="subcategory" class="form-control">
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
                          <div class="col-sm-5" id="subcategory_section" hidden>
                              <select name="subcategory" id="subcategory" class="form-control" required>
                              </select>
                          </div>
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
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-8"></div>
                          <div class="col-sm-2">
                            <a href="#" class="changetabbuttonright" id="changetabbutton_0"><i style="font-size: 50px;" class="glyphicon glyphicon-arrow-right"></i></a>
                          </div>
                        </div>
                        
                  </div>

                  <div id="menu_1" class="tab-pane fade">
                    
                    <div class="form-group">
                      <center><label class="col-sm-2 control-label">Enter Price Details Here.</label></center><hr>
                    </div>

                    <?php for ($i=0;$i < count($price_category);$i++ ){ ?>
                    <div class="form-group">
                      <label for="size_name" class="col-sm-4 control-label"><?php echo $price_category[$i]->pcategory_name  ?><span style="color:red">*</span></label>
                      <input type="hidden" name="pcat_id[]" value="<?php echo $price_category[$i]->pcategory_id ?>">
                      <div class="col-sm-5">
                        <input type="text" name="price[]" data-pms-required="true" class="form-control" value="<?php if(isset($prices)) if($price_category[$i]->pcategory_id == $prices[$i]->pcategory_id) echo $prices[$i]->item_price ?>">
                      </div>  
                    </div>
                  <?php }?>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <a href="#" id="changetabbuttonleft_1" class="changetabbuttonleft"><i style="font-size: 50px;" class="glyphicon glyphicon-arrow-left"></i></a>
                    </div>
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2">
                      <a href="#" class="changetabbuttonright" id="changetabbutton_1"><i style="font-size: 50px;" class="glyphicon glyphicon-arrow-right"></i></a>
                    </div>
                  </div>

                  </div>
                  <div id="menu_2" class="tab-pane fade">
                    <div class="form-group"></div>
                    <?php
                    if($this->uri->segment(1)=="editProducts")
                    {
                    ?>
                        <div class="form-group" align="center">
                          <div class="col-sm-3"></div>
                          <input type="hidden" name="raw_id" id="raw_id" value="<?php echo count($raw); ?>">
                          <div class="col-sm-6">
                              <table id="raw_material_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>Product</th>
                                      <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php 
                                foreach ($raw as $key) 
                                {
                                  $i=1;
                                ?>
                                  <tr>
                                    <td>
                                      <select class="form-control rawproducts" id="rawproduct_<?php echo $i ?>" name="rawproduct[]">
                                          <?php
                                          foreach ($itemlist as $value) 
                                          {
                                          ?>
                                            <option  value="<?php echo $value->product_id; ?>" <?php if($value->product_id == $key->product_id){ echo "selected";} ?>><?php echo $value->product_name; ?></option>
                                          <?php
                                          }
                                          ?>
                                      </select>
                                    </td>
                                    <td>
                                      <input type="text" id="quantity_<?php echo $i ?>" data-pms-required="true" name="quantity[]" value="<?php echo $key->raw_quantity ?>" class="form-control" placeholder="Quantity">
                                    </td>
                                  </tr>
                                <?php 
                                }
                                ?>
                                <tbody>     
                                </tbody>
                              </table>
                          </div>
                          <div class="col-sm-3"><i class="fa fa-fw fa-plus-square fa-2x" id="program_table" Style="color:green;"></i></div>
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div class="form-group" align="center">
                          <div class="col-sm-3"></div>
                          <input type="hidden" name="raw_id" id="raw_id" value="0">
                          <div class="col-sm-6">
                              <table id="raw_material_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>Product</th>
                                      <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>     
                                </tbody>
                              </table>
                          </div>
                          <div class="col-sm-3"><i class="fa fa-fw fa-plus-square fa-2x" id="program_table" Style="color:green;"></i></div>
                        </div>
                    <?php
                    }
                    ?>
                    
                    <div class="form-group">
                      <?php
                      if($this->uri->segment(1)=="editProducts")
                      {
                      ?>
                      <center> <button type="submit" class="btn btn-primary" id="submit_button">Save</button></center>
                      <?php
                      }
                      else
                      {
                      ?>
                      <center> <button type="submit" class="btn btn-primary" id="submit_button" hidden>Save</button></center>
                      <?php  
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-2">
                        <a href="#" id="changetabbuttonleft_2" class="changetabbuttonleft"><i style="font-size: 50px;" class="glyphicon glyphicon-arrow-left"></i></a>
                      </div>
                      <div class="col-sm-8"></div>
                      <div class="col-sm-2">
                      </div>
                    </div>
                  </div>
                </div>
                
            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
