<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Voucher</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Voucher/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Voucher Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <div class="form-group">
               <input type="hidden" name="vouch_id" value="<?php if(isset($records->voucher_id)) echo $records->voucher_id ?>"/>
               <div class="box-body">
                <?php if($this->session->userdata['user_type']!='C')
                { ?>
                <div class="form-group">
                    <label for="size_name" class="col-sm-2 control-label">Company<span style="color:red">*</span></label>

                    <div class="col-sm-4">
                      <select name="company" id="company" class="form-control" required>
                        <option></option>
                        <?php
                        foreach ($company as $row) 
                        {
                          ?>
                          <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records->company_id_fk)) if ($records->company_id_fk == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <label for="customer_email" class="col-sm-2 control-label"> Voucher Head </label>
                  <div class="col-sm-4">
                    <select class="form-control" id="vouch_head" name="vouch_head">
                      <option></option>
                      <?php
                      foreach ($vouchnames as $vouchnames) {
                      ?>
                      <option value="<?php echo $vouchnames->vouch_id ?>" <?php if(isset($records->vouch_id_fk)) if($records->vouch_id_fk == $vouchnames->vouch_id){echo 'selected';} ?>><?php echo $vouchnames->vouch_head ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <label for="customer_email" class="col-sm-2 control-label">Date (dd/mm/yyyy)</label>
                  <div class="col-sm-4">
                    <input type="Text"   name="voucher_date" id="voucher_date" class="form-control" placeholder="DD/MM/YYYY" value="<?php if(isset($records->voucher_date)){ echo $records->voucher_date; }?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="customer_email" class="col-sm-2 control-label"> Amount <span style="color:red">*</span></label>
                  <div class="col-sm-4">
                    <input type="Text"  class="form-control" data-pms-required="true" name="voucher_amount" id="voucher_amount" value="<?php if(isset($records->voucher_amount )) echo $records->voucher_amount ; ?>"/>
                  </div>
                  <label for="customer_email" class="col-sm-2 control-label">Paid From <span style="color:red">*</span></label>
                  <div class="col-sm-4">
                    <select name="paid_to" class="form-control">
                      <option>---Select----</option>
                      <option <?php if(isset($records->paid_from)) if($records->paid_from == 'Cash'){echo 'selected';} ?>>Cash</option>
                      <?php
                      foreach ($data as $key ) {
                        ?>
                        <option <?php if(isset($records->paid_from)) if($records->paid_from == $key->bank_name){echo 'selected';} ?>><?php echo $key->bank_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
          
                  <label for="customer_email" class="col-sm-2 control-label"> Narration </label>
                  <div class="col-sm-4">
                  <textarea class="form-control" name="narration"><?php if(isset($records->narration)) echo $records->narration; ?> </textarea>
                  </div>
                </div>
                <div class="form-group"></div>
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