<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Journal Entry</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Journal/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Journal Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <div class="form-group"></div>
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
              <div class="form-group">
                  <label for="size_name" class="col-sm-1 control-label">Company<span style="color:red">*</span></label>

                  <div class="col-sm-2">
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
                  <label class="col-sm-1 control-label">Date</label>
                  <div class="col-sm-2">
                    <input type="text" name="journal_date" id="journal_date" value="<?php echo date('d/m/Y') ?>" class="form-control">
                  </div>
                  <label class="col-sm-1 control-label">Note</label>
                  <div class="col-sm-4">
                    <textarea class="form-control" name="note" rows="3"></textarea>
                  </div>
                </div>   
                <div class="row">
                  <label class="col-sm-1 control-label">Journal</label>
                  <div class="col-sm-2">
                    <input type="text" name="journal_inv" id="journal_inv" value="<?php if(isset($invno)) echo $invno; ?>" class="form-control">
                  </div>
                </div>    
              <?php }else{  ?>
                <div class="col-md-2">
                  <input type="hidden" class="form-control" name="company" value="<?php echo $this->session->userdata('cmp_id'); ?>">
                  <input type="text" class="form-control" name="justname" value="<?php echo $company1->cmp_name ?>">
                </div>
              <?php } ?>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <center><label>Ledger Head</label></center>
                </div>
                <div class="col-md-2">
                  <center><label>Debit</label></center>
                </div>
                <div class="col-md-2">
                  <center><label>Credit</label></center>
                </div>
                <div class="col-md-2">
                  <center><label>Narration</label></center>
                </div>
              </div>

              <div class="box box-primary product-item">
                <div class="row">
                  <div class="col-md-3">
                    <label></label>
                    <select class="form-control ledgerhead" name="ledgerhead[]" id="ledgerhead_1">
                      <option value="">SELECT</option>
                      <?php
                          foreach ($ledgerhead as $value) 
                          {
                          ?>
                            <option value="<?php echo $value->ledgerhead_id ?>"><?php echo $value->ledger_head ?></option>
                          <?php
                          }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label></label>
                    <input type="text" name="debit[]" id="debit_1" class="form-control">
                  </div>
                  <div class="col-md-2">
                    <label></label>
                    <input type="text" name="credit[]" id="credit_1" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label></label>
                    <textarea class="form-control"  name="narr[]" id="narr_1"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label></label>
                    <select class="form-control ledgerhead" name="ledgerhead[]" id="ledgerhead_2">
                    <option value="">SELECT</option>
                      <?php
                          foreach ($ledgerhead as $value) 
                          {
                          ?>
                            <option value="<?php echo $value->ledgerhead_id ?>"><?php echo $value->ledger_head ?></option>
                          <?php
                          }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <label></label>
                    <input type="text" name="debit[]" id="debit_2" class="form-control">
                  </div>
                  <div class="col-md-2">
                    <label></label>
                    <input type="text" name="credit[]" id="credit_2" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label></label>
                    <textarea class="form-control"  name="narr[]" id="narr_2"></textarea>
                  </div>
                </div>
              </div>

              <input type="hidden" name="counter" id="counter" value="2">
              <DIV id="service" class="box-body no-padding" ></div>
              <br>
              <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
              <!-- <i class="fa fa-fw fa-minus-square pull-right fa-2x" onClick="deleteRow();" Style="color:red;"></i> -->
              <br>
              <br>
              <div class="form-group">
                <center><input type="submit"  name="Save" value="Save" id="save_btn" class="btn btn-success" ></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>