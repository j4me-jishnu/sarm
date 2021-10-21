<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Import</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" name="import_form"  enctype="multipart/form-data" action="<?php echo base_url();?>addImport">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Product List Import</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <div class="row">
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover" style="font-size: small;">Company</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id required" name="company_id" id="supplier_id">
                  <option selected disabled>Select</option><small></small>
                  <?php
                      foreach ($company as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records->company_id)) if ($records->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                </select>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover" style="font-size: small;">Supplier</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id" name="supplier_id" id="supplier_id">
                  <option selected disabled>Select</option>
                  <?php
                      foreach ($supplier as $key) {
                      ?>
                      <option value="<?php echo $key->supplier_id; ?>" <?php if(isset($records->supplier_id)) if ($records->supplier_id == $key->supplier_id)  echo "selected" ?>><?php echo $key->supplier_name; ?></option>
                      <?php
                      }
                      ?>
                </select>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover" style="font-size: small;">Main Category</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id" name="m_category" id="supplier_id">
                  <option selected disabled>Select</option>
                  <?php
                      foreach ($mainCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->category_id ?>" <?php if(isset($records->main_category_id)) if ($records->main_category_id == $row->category_id)  echo "selected" ?>><?php echo $row->category_name; ?></option>
                        <?php
                      }
                      ?>
                </select>
              </div><!-- /input-group -->
            </div>
            <div class="col-md-3">
              <div class="input-group margin">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-primary nohover" style="font-size: small;">Sub Catgeory</button>
                </div><!-- /btn-group -->
                <select class="form-control supp_id" name="s_category" id="supplier_id">
                  <option selected disabled>Select</option>
                  <?php
                      foreach ($subCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->subcategory_id ?>" <?php if(isset($records->subcategory_id)) if ($records->subcategory_id == $row->subcategory_id)  echo "selected" ?>><?php echo $row->subcategory_name; ?></option>
                        <?php
                      }
                      ?>
                </select>
              </div><!-- /input-group -->
            </div>
            </div>
            <br><br>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label" style="font-size: small;">Import Excel<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="file"  class="form-control" name="import_excel" id="import_excel"  value="" accept=".xlsx, .xls, .csv">
                    <small> ONLY <span style="color:red">CSV, XLS, XLSX</span> FILE TYPES ACCEPTED</small>
                  </div>
                </div>
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
