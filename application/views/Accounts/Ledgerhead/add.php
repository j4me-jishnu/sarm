<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Ledger Head</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Ledgerhead/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Ledger Head Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="ledgerhead_id" value="<?php if(isset($records[0]->ledgerhead_id)) echo $records[0]->ledgerhead_id ?>" >
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Company<span style="color:red">*</span></label>
                <?php if($this->session->userdata('user_type')!='C'){ ?>
                <div class="col-sm-5">
                  <select name="company" id="company" class="form-control" required>
                    <option></option>
                        <?php
                        foreach ($company as $row) 
                        {
                          ?>
                          <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->company_id_fk)) if ($records[0]->company_id_fk == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                          <?php
                        }
                        ?>
                  </select>
                </div>
                <?php } else { ?>
                 <div class="col-md-5">
                   <input type="hidden" class="form-control" name=company value="<?php echo $this->session->userdata('cmp_id'); ?>">
                   <input type="text" class="form-control" name=company value="<?php echo $company1->cmp_name ?>" readonly>

                 </div> 
                 <?php } ?>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Sub Group<span style="color:red">*</span></label>

                <div class="col-sm-5">
                  <select name="groups" id="groups" class="form-control" required>
                    <option></option>
                    <?php
                    foreach ($groups as $row) 
                    {
                      ?>
                      <option value="<?php echo $row->group_id ?>" <?php if(isset($records[0]->group_id_fk)) if ($records[0]->group_id_fk == $row->group_id)  echo "selected" ?>><?php echo $row->group_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Ledger Head<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="ledger_head" id="vouch_head"  value="<?php if(isset($records[0]->ledger_head)) echo $records[0]->ledger_head ?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Description<span style="color:red">*</span></label>

                  <div class="col-sm-5">
                    <textarea  data-pms-type="address" class="form-control" name="ledgerhead_desc"><?php if(isset($records[0]->ledgerhead_desc)) echo $records[0]->ledgerhead_desc ?></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Opening Balance<span style="color:red">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" data-pms-required="true"  class="form-control" name="opening_bal" id="opening_bal"  value="<?php if(isset($records[0]->opening_bal)) echo $records[0]->opening_bal ?>">
                    
                  </div>
              </div>
              <div class="form-group" style="margin-left:450px;">
              <label class="radio-inline">
                      <input type="radio" name="optradio" value="1">Debit
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="optradio" value="2">Credit
                    </label>
              </div>
              <div class="form-group" style="margin-left:470px;">
                <input type="checkbox"  name="default_id" value="1" <?php echo(@$records[0]->ledger_default == 1)? 'checked':''  ?>>
                <label >Set Default</label><br>
              </div>
              <div class="form-group" style="margin-left: 50px;">
                  <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>