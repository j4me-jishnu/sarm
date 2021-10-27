
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contact.css">
<link rel="stylesheet" href="https://unpkg.com/huebee@2/dist/huebee.min.css">

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
    <form method="post" action="<?php echo base_url(); ?>insertColor">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Change color</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <!-- radio -->
            <div class="form-group">
             <input type="hidden" name="cmp_id" value="<?php if(isset($records->company_id_fk)) echo $records->company_id_fk ?>"/>
             <input type="hidden" name="color_id" value="<?php if(isset($records->color_id)) echo $records->color_id ?>"/>
             <div class="box-body">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Color<span style="color:red">*</span></label>
                <div class="col-sm-5">
                    <input class="color-input" placeholder="Click Here" name="color_picker" value="<?php if(isset($records->color_name)) echo $records->color_name ?>"/>
                </div>
              </div>
              <br><br>
            </div>
            <div class="form-group">
              <center><input type="submit" class="btn common-btn" name="submit"></center>
            </div>
          </fieldset>
        </div>
      </div>
    </div>
    </form>
  </section>
  <script src="https://unpkg.com/huebee@2/dist/huebee.pkgd.min.js"></script>
</div>
