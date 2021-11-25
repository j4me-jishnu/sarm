<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Group</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Groups/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Group Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="group_id" value="<?php if(isset($records[0]->group_id)) echo $records[0]->group_id ?>" >
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Type<span style="color:red">*</span></label>

                <div class="col-sm-5">
                  <select name="type" id="type" class="form-control" required>
                    <option></option>
                    <?php
                    foreach ($type as $row) 
                    {
                      ?>
                      <option value="<?php echo $row->type_id ?>" <?php if(isset($records[0]->type_id_fk)) if ($records[0]->type_id_fk == $row->type_id)  echo "selected" ?>><?php echo $row->type_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Group<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="group_name" id="group_name"  value="<?php if(isset($records[0]->group_name)) echo $records[0]->group_name ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="group_desc"><?php if(isset($records[0]->group_desc)) echo $records[0]->group_desc ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                
                <div class="col-sm-5" style="margin-left: 450px;">
                  <input type="checkbox" name="default" value="1" <?php if(isset($records[0]->default)) if($records[0]->default == 1){ echo "checked";} ?>>
                  <label>Do you want to make it default ?</label>
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