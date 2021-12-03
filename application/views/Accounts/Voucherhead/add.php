<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Voucher Head</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Voucherhead/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Voucher Head Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="vouch_id" value="<?php if(isset($records[0]->vouch_id)) echo $records[0]->vouch_id ?>" >
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Voucher Head<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="vouch_head" id="vouch_head"  value="<?php if(isset($records[0]->vouch_head)) echo $records[0]->vouch_head ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="vouch_desc"><?php if(isset($records[0]->vouch_desc)) echo $records[0]->vouch_desc ?></textarea>
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