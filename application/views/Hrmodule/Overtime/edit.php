<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Overtime</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>Overtime/add">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <fieldset>
              <legend>Overtime Details</legend>
              <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
              <input type="hidden" name="overtime_id" value="<?php if(isset($records[0]->overtime_id)) echo $records[0]->overtime_id ?>">
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Company</label>

                <div class="col-sm-5">
                  <select name="company" id="company" class="form-control" required >
                    <option></option>
                    <?php
                    foreach ($company as $row) 
                    {
                      ?>
                      <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->company_id)) if ($records[0]->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Employee Name<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="hidden" name="emp" value="<?php if(isset($records[0]->emp_id)) echo $records[0]->emp_id ?>">
                  <input type="text" name="empname" class="form-control" value="<?php if(isset($records[0]->emp_name)) echo $records[0]->emp_name ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="size_name" class="col-sm-4 control-label">Amount<span style="color:red">*</span></label>
                <div class="col-sm-5">
                  <input type="text" name="amount" value="<?php if(isset($records[0]->amount)) echo $records[0]->amount ?>" class="form-control">
                </div>
              </div>
              <!-- <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Hours</label>

                  <div class="col-sm-5">
                    <input type="text" placeholder="HH:MM" id="hours" name="hours" class="form-control" >
                  </div>
              </div> -->
              <div class="form-group">
                  <label for="size_name" class="col-sm-4 control-label">Date </label>

                  <div class="col-sm-5">
                    <input type="text" placeholder="dd/mm/yyyy" value="<?php if(isset($records[0]->date)) echo $records[0]->date ?>" id="date" name="date" class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                <center> <button type="submit" class="btn btn-primary">Save</button></center>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </section>
  </form>
</div>