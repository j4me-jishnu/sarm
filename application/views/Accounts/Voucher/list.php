<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voucher</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Voucher List</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>Voucher/add" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
          </div>
        </div>
        <div class="box-body">

          <table id="receipt_list" align="center" width="800" class="table-bordered table-condensed table-striped">
               <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Voucher Head</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Paid From</th>
                  <th>Narration</th>                  
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
