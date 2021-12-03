<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Opening</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addOpeningstock">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Opening Stock Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="open_id" value="<?php if(isset($records->product_id)) echo $records->product_id ?>" >
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
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Item<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="item" id="item" class="form-control"></select>
                  </div>
                </div>
              <?php } 
              else
              {
              ?>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Item<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <select name="item" id="item" class="form-control">
                      <?php
                      foreach ($items as $value) {
                      ?>
                      <option value="<?php echo $value->product_id ?>" <?php if(isset($records->item_id)) if ($records->item_id == $value->product_id)  echo "selected" ?>><?php echo $value->product_name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              <?php  
              } ?>
                

                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Quantity<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="quantity" id="quantity"  value="<?php if(isset($records->stock)) echo $records->stock ?>">
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
