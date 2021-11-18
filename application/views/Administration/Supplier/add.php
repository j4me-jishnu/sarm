
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Supplier</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addSupplier">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Supplier Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Company</label>

                  <div class="col-sm-5">
                    <select name="company" class="form-control" required>
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
              <!-- <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-5">
                    <label  class="radio-inline">
                        <input type="radio" name="optradio" value="1" <?php if(isset($records->supplier_type)) if ($records->supplier_type == 1)  echo "checked" ?>><label>Wholesale Customer</label>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="optradio" value="2" <?php if(isset($records->supplier_type)) if ($records->supplier_type == 2)  echo "checked" ?>><label>Retail Customer</label>
                    </label>
                  </div>
              </div> -->
              <div class="form-group">
               <input type="hidden" name="supplier_id" value="<?php if(isset($records->supplier_id)) echo $records->supplier_id ?>"/>
               <?php echo validation_errors(); ?>
               <div class="box-body">
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Supplier Name <span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="supplier_name" id="supplier_name"  value="<?php if(isset($records->supplier_name)) echo $records->supplier_name ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Address<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  class="form-control" data-pms-required="true" name="supplier_address"><?php if(isset($records->supplier_address)) echo $records->supplier_address ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Phone</label>
                  <div class="col-sm-5">
                    <input type="text"  class="form-control" name="supplier_phone" id="supplier_phone"  value="<?php if(isset($records->supplier_phone)) echo $records->supplier_phone ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="email" class="form-control" name="supplier_email" id="supplier_email"  value="<?php if(isset($records->supplier_email)) echo $records->supplier_email ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Opening Balance</label>

                  <div class="col-sm-5">
                    <input type="text"  class="form-control" name="supplier_oldbal" id="supplier_oldbal"  value="<?php if(isset($records->supplier_oldbal)) echo $records->supplier_oldbal ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Price Category</label>

                  <div class="col-sm-5">
                    <select name="category" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($category as $key)
                      {
                        ?>
                        <option value="<?php echo $key->pcategory_id ?>" <?php if(isset($records->company_id)) if ($records->supplier_pcategory == $key->pcategory_id)  echo "selected" ?>><?php echo $key->pcategory_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
              </div>

              <div class="form-group">

                  <div class="col-sm-12 text-center">
                  <label class="radio-inline">
                    <input type="radio" name="supplier_type" value="0" <?php if (@$records->supplier_type == 0)  echo "checked" ?>>Debit
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="supplier_type" value="1" <?php if (@$records->supplier_type == 1)  echo "checked" ?>>Credit
                  </label>

                  </div>
                </div>
                <?php if(isset($records->supplier_act_status)){ ?>      
                <div class="form-group">
                  <div class="col-sm-12 text-center">
                  <label class="radio-inline">
                    <input type="radio" name="supplier_act_status" value="0" <?php if (@$records->supplier_act_status == 0)  echo "checked" ?>>Active
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="supplier_act_status" value="1" <?php if (@$records->supplier_act_status == 1)  echo "checked" ?>>Inactive
                  </label>
                  </div>
                </div>
                <?php } ?>  
                <div class="form-group text-center">
                    <input type="checkbox"  name="salary_is_cust" value="1" <?php if(@$records->supplier_is_cust=='1') echo 'Checked' ?>>
                    <label for="vehicle1"> is Customer</label>
                </div>
                <div class="form-group">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
                </div>
              </div>


            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>
