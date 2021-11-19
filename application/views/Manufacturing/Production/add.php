<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Production</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Production/addProduction">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Production Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <div class="form-group"></div>
              <?php if($this->session->userdata['user_type']!='C')
                  { ?>
              <div class="form-group">
                  <label for="size_name" class="control-label col-sm-4">Company<span style="color:red">*</span></label>
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
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Area</label>

                <div class="col-sm-5">
                  <select class="form-control" name="area">
                    <option></option>
                    <?php
                    foreach ($areas as $keyvalue) 
                    {
                    ?>
                    <option value="<?php echo $keyvalue->area_id; ?>"><?php echo $keyvalue->area_name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Date</label>
                <div class="col-sm-5">
                  <input type="text" name="production_date" id="production_date" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><center><h3>Raw Materials</h3></center></div>
                <div class="col-sm-4"></div>
              </div>
              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="hidden" name="raw_id" id="raw_id" value="0">
                  <table id="raw" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Available Quantity</th>
                      <th>Used Quantity</th>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-2">
                  <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><center><h3>Output Products</h3></center></div>
                <div class="col-sm-4"></div>
              </div>

              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <input type="hidden" name="output_id" id="output_id" value="0">
                  <table id="output" class="table table-bordered table-striped table-responsive">
                    <tr>
                      <th>Product Code</th>
                      <th>Product Names</th>
                      <th>Produced Quantity</th>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-2">
                  <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMores();" Style="color:green;"></i>
                </div>
              </div>
              <div class="form-group">
              </div>
              <div class="form-group">
                <center><input type="submit" name="submit" value="SUBMIT" class="btn btn-lg btn-success"></center>
              </div>

            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>