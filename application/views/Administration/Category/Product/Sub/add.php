<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>AddsubCategory">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Category Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="category_id" value="<?php if(isset($records->subcategory_id)) echo $records->subcategory_id ?>" >
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Main Category <span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="maincategory" class="form-control" required>
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

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="category_name" id="category_name"  value="<?php if(isset($records->subcategory_name)) echo $records->subcategory_name ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="category_description"><?php if(isset($records->subcategory_description)) echo $records->subcategory_description ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>