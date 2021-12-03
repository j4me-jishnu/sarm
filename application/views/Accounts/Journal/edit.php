<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Journal Entry</li>
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
              <input type="hidden" name="unique_id" value="<?php if(isset($records[0]->journal_inv)) echo $records[0]->journal_inv; ?>">
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
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->company_id_fk)) if ($records[0]->company_id_fk == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <label class="col-sm-1 control-label">Date</label>
                  <div class="col-sm-2">
                    <input type="text" name="journal_date" id="journal_date" placeholder="dd/mm/yyyy" class="form-control" value="<?php if(isset($records[0]->journal_date)) echo $records[0]->journal_date; ?>">
                  </div>
                  <label class="col-sm-1 control-label">Note</label>
                  <div class="col-sm-4">
                    <textarea class="form-control" name="note" rows="3"><?php if(isset($records[0]->note)) echo $records[0]->note; ?>
                    </textarea>
                  </div>
                </div>   
                <div class="row">
                  <label class="col-sm-1 control-label">Journal</label>
                  <div class="col-sm-2">
                    <input type="text" name="journal_inv" id="journal_inv" value="<?php if(isset($records[0]->journal_inv)) echo $records[0]->journal_inv; ?>" class="form-control">
                  </div>
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
              <div class="box box-success product-item">
                <?php
                  $i = 1;
                  foreach ($records as $key) {
                  ?>
                    <div class="row">
                      <div class="col-md-3">
                        <input type="checkbox" name="item_index[]"/>
                        <select class="form-control ledgerhead" name="ledgerhead[]" id="ledgerhead_<?php echo $i; ?>">
                          <?php
                          foreach ($ledgerhead as $value) 
                          {
                          ?>
                            <option value="<?php echo $value->ledgerhead_id ?>" <?php if(isset($key->ledger_head_id)) if($key->ledger_head_id == $value->ledgerhead_id){echo 'selected';} ?>><?php echo $value->ledger_head ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label></label>
                        <input type="text" name="debit[]" id="debit_<?php echo $i; ?>" class="form-control" value="<?php if(isset($key->debit_amt)) echo $key->debit_amt; ?>">
                      </div>
                      <div class="col-md-2">
                        <label></label>
                        <input type="text" name="credit[]" id="credit_<?php echo $i; ?>" class="form-control" value="<?php if(isset($key->credit_amt)) echo $key->credit_amt; ?>">
                      </div>
                      <div class="col-md-4">
                        <label></label>
                        <textarea class="form-control" name="narr[]" id="narr_<?php echo $i; ?>"><?php if(isset($key->narration)) echo $key->narration; ?>
                        </textarea>
                      </div>
                    </div>
                  <?php
                  $i=$i+1;
                  }
              ?>  
              </div>
              <input type="hidden" name="counter" id="counter" value="<?php echo $i-1; ?>">
              <DIV id="service" class="box-body no-padding" ></div>
              <br>
              <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
              <!-- <i class="fa fa-fw fa-minus-square pull-right fa-2x" onClick="deleteRow();" Style="color:red;"></i> -->
              <br>
              <br>
              <div class="form-group">
                <center><input type="submit"  name="Save" value="Save" id="save_btn" class="btn btn-success"></center>
              </div>
            </fieldset>.
          </div>
        </div>
      </div>
    </section>
  </form>
</div>