<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Price Category</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>AddpriceCategory">
   <!-- Main content -->
   <section class="content">
    <div class="row">

      <div class="col-md-12">

        <div class="box">
          <legend>Price Category</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
          <div class="form-group">
           <input type="hidden" name="category_id" value="<?php if(isset($records->pcategory_id)) echo $records->pcategory_id ?>"/>
           <?php echo validation_errors(); ?>
           <label for="inputEmail3" class="col-sm-2 control-label"></label>
         </div>
         <div class="box-body">
          <div class="form-group">
            <label for="size_name" class="col-sm-2 control-label">Category <span style="color:red">*</span></label>

            <div class="col-sm-3">
              <input type="text" data-pms-required="true" autofocus class="form-control" name="category_name" placeholder="Name" value="<?php if(isset($records->pcategory_name)) echo $records->pcategory_name ?>">
            </div>
          </div> 
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>

            <div class="col-sm-3">
              <textarea class="form-control" onUnfocus="send()" name="category_description"><?php if(isset($records->pcategory_description)) echo $records->pcategory_description ?></textarea>
            </div>
          </div>	
          <div class="form-group">
            <center><button type="submit" class="btn btn-primary">Save</button></center>
          </div>
        </div>


      </div>


    </div>

  </div>

</section>
</form>

</div>







