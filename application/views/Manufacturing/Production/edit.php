<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Production</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Production/updateProduction">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Edit Production Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <div class="form-group"></div>
              <div class="form-group">
                <input type="hidden" name="production_id" value="<?php if(isset($basic_details[0]->production_id))echo $basic_details[0]->production_id ?>">
                  <label for="size_name" class="control-label col-sm-4">Company<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                  <?php if($this->session->userdata['user_type']!='C')
                  { ?>
                        <select name="company" id="company" class="form-control" required>
                          <option></option>
                          <?php
                          foreach ($company as $row) 
                          {
                            ?>
                            <option value="<?php echo $row->cmp_id ?>" <?php if(isset($basic_details[0]->company_id_fk)) if ($basic_details[0]->company_id_fk == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                  <?php } ?>
              </div>    
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Area</label>

                <div class="col-sm-5">
                  <select class="form-control" name="area">
                    <option></option>
                    <?php
                    foreach ($areas as $keyvalue) 
                    {
                    ?>
                    <option value="<?php echo $keyvalue->area_id; ?>" <?php if(isset($basic_details[0]->area_id_fk)) if ($basic_details[0]->area_id_fk == $keyvalue->area_id)  echo "selected" ?>><?php echo $keyvalue->area_name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Date</label>
                <div class="col-sm-5">
                  <input type="text" name="production_date" id="production_date" class="form-control" value="<?php if(isset($basic_details[0]->production_date))echo $basic_details[0]->production_date ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><center><h3>Raw Materials</h3></center></div>
                <div class="col-sm-4"></div>
              </div>
              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <table id="raw" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Available Quantity</th>
                      <th>Used Quantity</th>
                    </tr>
                    <?php
                    $j=1;
                    foreach ($input as $key) 
                    {
                      for ($i=0; $i < count($stock) ; $i++) 
                      { 
                        if ($key->product_id == $stock[$i]->item_id) 
                        {
                          $available = $stock[$i]->stock + $stock[$i]->opening + $key->used_quantity;
                          break;
                        }
                      }
                    ?>
                    <tr>
                      <td>
                        <select name="product_code[]" style="width:150px;" class="form-control product_codee"  id="productcode_<?php echo $j; ?>" autofocus />
                          <?php
                          foreach ($result as $keyvalue) 
                          {
                          ?>
                          <option value="<?php echo $keyvalue->product_code; ?>" <?php if($keyvalue->product_code == $key->product_code){ echo 'selected';} ?> ><?php echo $keyvalue->product_code; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </td>  
                      <td>
                        <select name="product_id_fk[]" style="width:150px;" class="form-control product_id fstdropdown-select"  id="productid_<?php echo $j; ?>" autofocus />
                          <?php
                          foreach ($result as $keysvalue) 
                          {
                          ?>
                          <option value="<?php echo $keysvalue->product_id; ?>" <?php if($keysvalue->product_id == $key->product_id){echo 'selected';} ?>><?php echo $keysvalue->product_name; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </td>
                      <td><input type="text" style="width:150px;" name="avl[]" id="avl_<?php echo $j; ?>" class="form-control" value="<?php if(isset($available))echo $available ?>"></td>
                      <td><input type="text" style="width:150px;" name="used[]" id="used_<?php echo $j; ?>" class="form-control used" value="<?php if(isset($key->used_quantity))echo $key->used_quantity ?>"></td>
                    </tr>
                    <?php
                    $j++;
                    } 
                    ?>
                  </table>
                </div>
                <input type="hidden" name="raw_id" id="raw_id" value="<?php echo $j-1; ?>">
                <div class="col-sm-2">
                  <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><center><h3>Output Products</h3></center></div>
                <div class="col-sm-4"></div>
              </div>

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <table id="output" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Produced Quantity</th>
                    </tr>
                    <?php
                    $k=1;
                    foreach ($output as $value) 
                    {
                    ?>
                    <tr>
                      <td>
                        <select name="product_codes[]" style="width:150px;" class="form-control product_codes"  id="productcodes_<?php echo $k; ?>" autofocus />
                          <?php
                          foreach ($result as $keyvalue) 
                          {
                          ?>
                          <option value="<?php echo $keyvalue->product_code; ?>" <?php if($keyvalue->product_code == $value->product_code){ echo 'selected';} ?> ><?php echo $keyvalue->product_code; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </td>
                      <td>
                        <select name="products_id[]" style="width:150px;" class="form-control products_id fstdropdown-select"  id="productsid_<?php echo $k; ?>" autofocus />
                          <?php
                          foreach ($result as $keyvalue) 
                          {
                          ?>
                          <option value="<?php echo $keyvalue->product_id; ?>" <?php if($keyvalue->product_id == $value->product_id){ echo 'selected';} ?> ><?php echo $keyvalue->product_name; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </td>
                      <td>
                        <input type="text" style="width:150px;" name="produced[]" id="produced_<?php echo $k; ?>" class="form-control" value="<?php if(isset($value->produced_quantity))echo $value->produced_quantity ?>">
                    </tr>
                    <?php
                    $k++;
                    } 
                    ?>
                  </table>
                </div>
                <input type="hidden" name="output_id" id="output_id" value="<?php echo $k-1; ?>">
                <div class="col-sm-2">
                  <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMores();" Style="color:green;"></i>
                </div>
              </div>
              <div class="form-group">
              </div>
              <div class="form-group">
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-lg btn-success"></center>
              </div>

            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>