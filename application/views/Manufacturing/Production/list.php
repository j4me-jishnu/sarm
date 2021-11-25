<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Production</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Production</h3> 
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>Production/addProduction" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">Area</button>
                  </div><!-- /btn-group -->
                  <select class="form-control" name="area" id="area" onchange="tableFilter();">
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
                </div><!-- /input-group -->
            </div>
            <?php if($this->session->userdata['user_type']!='C')
                  { ?>
            <div class="col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-primary nohover">Company</button>
                  </div><!-- /btn-group -->
                  
                        <select name="company" id="company" class="form-control" onchange="tableFilter();">
                          <option></option>
                          <?php
                          foreach ($company as $row) 
                          {
                            ?>
                            <option value="<?php echo $row->cmp_id ?>"><?php echo $row->cmp_name; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                </div>
                <?php } ?>
          </div>
        </div>
        <div class="box-body">
            <table id="product_table" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>SI.NO</th>
                    <th>COMPANY</th>
                    <th>AREA</th>
                    <th>DATE</th>
                    <th>VIEW/EDIT/DELETE</th>
                  </tr>
                </thead>
                <tbody>         
                </tbody>
            </table>
        </div>
      </div>
    </section>
</div>
