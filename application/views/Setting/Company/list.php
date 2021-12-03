<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Company</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Company List</h3>  
            </div>
            <?php if($this->session->userdata('user_type') == 'A'){ ?>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>addCompany" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="box-body">
            <table id="company_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>SINO</th>
                  <th>COMPANY NAME</th>
                  <th>ADDRESS</th>
                  <th>PHONE</th>
                  <th>EMAIL</th>
                  <th>GSTIN</th>
                  <th><center>EDIT/DELETE</center></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
      </div>
    </section>  
</div>    