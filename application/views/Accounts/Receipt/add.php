<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Receipt</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Receipt/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Receipt Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />

              <div class="form-group">
               <input type="hidden" name="rece_id" value="<?php if(isset($records->receipt_id)) echo $records->receipt_id ?>"/>
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
                  <label for="customer_email" class="col-sm-2 control-label"> Receipt Head </label>
                  <div class="col-sm-4">
                    <select class="form-control" id="receip_id" name="receip_id">
                      <option></option>
                      <?php
                      foreach ($receiptnames as $receiptnames) {
                      ?>
                      <option value="<?php echo $receiptnames->receipt_id ?>" <?php if(isset($records->receip_id_fk)) if($records->receip_id_fk == $receiptnames->receipt_id){echo 'selected';} ?>><?php echo $receiptnames->receipt_head ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <label for="customer_email" class="col-sm-2 control-label">Date (dd/mm/yyyy)</label>
                  <div class="col-sm-4">
                    <input type="Text"   name="rept_date" id="rept_date" class="form-control" placeholder="DD/MM/YYYY" value="<?php if(isset($records->rept_date)){ echo $records->rept_date; }?>"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="customer_email" class="col-sm-2 control-label"> Amount <span style="color:red">*</span></label>
                  <div class="col-sm-4">
                    <input type="Text"  class="form-control" data-pms-required="true" name="receipt_amount" id="receipt_amount" value="<?php if(isset($records->receipt_amount )) echo $records->receipt_amount ; ?>"/>
                  </div>
                  <label for="customer_email" class="col-sm-2 control-label"> Recieved To <span style="color:red">*</span></label>
                  <div class="col-sm-4">
                    <select name="paid_to" class="form-control">
                      <option>---Select----</option>
                      <option <?php if(isset($records->received_to)) if($records->received_to == 'Cash'){echo 'selected';} ?>>Cash</option>
                      <?php
                      foreach ($data as $key ) {
                        ?>
                        <option <?php if(isset($records->received_to)) if($records->received_to == $key->bank_name){echo 'selected';} ?>><?php echo $key->bank_name; ?></option>
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