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
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>AddmainCategory">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Category Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="category_id" value="<?php if(isset($records->category_id)) echo $records->category_id ?>" >
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Category <span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="category_name" id="category_name"  value="<?php if(isset($records->category_name)) echo $records->category_name ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="category_description"><?php if(isset($records->category_description)) echo $records->category_description ?></textarea>
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