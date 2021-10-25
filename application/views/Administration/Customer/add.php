<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Customer</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>addCustomer">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Customer Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <!-- radio -->
              
              <div class="form-group">
               <input type="hidden" name="cust_id" value="<?php if(isset($records->cust_id)) echo $records->cust_id ?>"/>
               <?php echo validation_errors(); ?>
               <div class="box-body">
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
              <?php }?>

                <!-- <div class="form-group">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-5">
                    <label  class="radio-inline">
                        <input type="radio" name="optradio" value="1" <?php if(isset($records->customer_type)) if ($records->customer_type == 1)  echo "checked" ?>><label>Wholesale Customer</label> 
                    </label>
                    
                    <label class="radio-inline">
                        <input type="radio" name="optradio" value="2" <?php if(isset($records->customer_type)) if ($records->customer_type == 2)  echo "checked" ?>><label>Retail Customer</label> 
                    </label>
                  </div>  
                </div>  --> 
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Name <span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="cust_name" id="cust_name"  value="<?php if(isset($records->custname)) echo $records->custname ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Address<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="cust_address"><?php if(isset($records->custaddress)) echo $records->custaddress ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Phone</label>
                  <div class="col-sm-5">
                    <input type="text"  class="form-control" name="cust_phone" id="cust_phone"  value="<?php if(isset($records->custphone)) echo $records->custphone ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="cust_email" id="cust_email"  value="<?php if(isset($records->custemail)) echo $records->custemail ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Old Balance</label>

                  <div class="col-sm-5">
                    <input type="text"  class="form-control" name="old_balance" id="old_balance"  value="<?php if(isset($records->old_balance)) echo $records->old_balance ?>">
                  </div>
                </div>
                <div class="form-group text-center">
                  <label class="radio-inline"><input type="radio" name="radio_val" value="0">Debitor</label>
                  <label class="radio-inline"><input type="radio" name="radio_val" value="1">Creditor</label>
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
                        <option value="<?php echo $key->pcategory_id ?>" <?php if(isset($records->company_id)) if ($records->cust_pcategory == $key->pcategory_id)  echo "selected" ?>><?php echo $key->pcategory_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
                </div>
              </div>
              

            </fieldset>
          </div>
          
        </div>

      </div>
      </fieldset>
    </div>
  </div>
</div>
</section>
</form>