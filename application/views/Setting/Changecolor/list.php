<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Company</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" action="<?php echo base_url(); ?>addColor"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
              <div class="row">
                  <div class="col-sm-9">
                    <legend>Change Color</legend>
                  </div>
                  <?php if(empty($records->color_name)) { ?>
                  <div class="col-sm-1 text-right">
                  <a href="<?php echo base_url();?>addColor" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add Color</a>
                  </div>
                  <?php } ?>
                  <div class="col-sm-1 text-right">
                  <a href="<?php echo base_url();?>editColor" class="btn btn-sm common-btn"><i class="fa fa-edit"></i>Update Color</a>
                  </div>
                  
              </div>
            
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            
            
            <div class="form-group">
             <input type="hidden" name="cmp_id" value=""/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Color Name <span style="color:red" >*</span></label>
                <div class="col-sm-5">
                  <input type="text"  required  class="form-control" name="company" id="company"  value="<?php if(isset($records->color_name)) echo $records->color_name ?>" disabled>
                </div>
              </div>
              <br><br>
            </div>
                          
          </fieldset>
        </div>


      </div>


    </div>
    </form>
  </section>
</div>        