<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Production Details</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Production/addProduction">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Production Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <div class="form-group"></div>
              <div class="form-group">
                  <label for="size_name" class="control-label col-sm-4">Company<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="company" value="<?php if(isset($basic_details[0]->cmp_name))echo $basic_details[0]->cmp_name ?>" readonly>
                  </div>
              </div>    
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Area</label>

                <div class="col-sm-5">
                  <input type="text" class="form-control" name="company" value="<?php if(isset($basic_details[0]->area_name))echo $basic_details[0]->area_name ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Date</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="company" value="<?php if(isset($basic_details[0]->production_date))echo $basic_details[0]->production_date ?>" readonly>
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
                  <input type="hidden" name="raw_id" id="raw_id" value="0">
                  <table id="raw" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Used Quantity</th>
                    </tr>
                    <?php
                    foreach ($input as $key) 
                    {
                    ?>
                    <tr>
                      <td><input type="text" style="width:150px;" name="code" id="code" class="form-control" value="<?php if(isset($key->product_code))echo $key->product_code ?>" readonly></td>
                      <td><input type="text" style="width:150px;" name="name" id="name" class="form-control" value="<?php if(isset($key->product_name))echo $key->product_name ?>" readonly></td>
                      <td><input type="text" style="width:150px;" name="used" id="used" class="form-control" value="<?php if(isset($key->used_quantity))echo $key->used_quantity ?>" readonly></td>
                    </tr>
                    <?php
                    } 
                    ?>
                  </table>
                </div>
                <div class="col-sm-2">
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
                  <input type="hidden" name="output_id" id="output_id" value="0">
                  <table id="output" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Produced Quantity</th>
                    </tr>
                    <?php
                    foreach ($output as $value) 
                    {
                    ?>
                    <tr>
                      <td><input type="text" style="width:150px;" name="code" id="code" class="form-control" value="<?php if(isset($value->product_code))echo $value->product_code ?>" readonly></td>
                      <td><input type="text" style="width:150px;" name="name" id="name" class="form-control" value="<?php if(isset($value->product_name))echo $value->product_name ?>" readonly></td>
                      <td><input type="text" style="width:150px;" name="used" id="used" class="form-control" value="<?php if(isset($value->produced_quantity))echo $value->produced_quantity ?>" readonly></td>
                    </tr>
                    <?php
                    } 
                    ?>
                  </table>
                </div>
                <div class="col-sm-2">
                  
                </div>
              </div>
              <div class="form-group">
              </div>

            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>