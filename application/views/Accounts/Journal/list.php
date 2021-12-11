<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="row">
        <!-- Company Management -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Journal Entry</li>
      </ol>
    </section><br>

    <!-- Main content -->
    <section class="content">
      <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
      <div class="box">
        <div class="box-header">
          <div class="row">
            <div class="col-sm-10">
              <h3>Journal Entry</h3>  
            </div>
            <div class="col-sm-2">
              <a href="<?php echo base_url();?>Journal/add" class="btn btn-sm common-btn"><i class="fa fa-plus-square"></i>Add New</a>
            </div>
          </div>
        </div>
        <div class="box-body">

          <table id="journal" align="center" width="1000" class="table-bordered table-condensed table-striped">
               <thead>
                <tr>
                  <th>SINO.</th>
                  <th>DATE</th>
                  <th>JOURNAL</th>
                  <th>JOURNAL#</th>
                  <th>NARRATION</th>
                  <th>VOUCHER</th>
                  <th>AMOUNT</th>                   
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


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Voucher</h4>
          <button type="button" id="printer" class="btn btn-primary">Print</button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered" id="table_voucher">
              <tr>
                <td colspan="4" style="text-align: center;"><b>RECEIPT VOUCHER</b></td>
              </tr>
              <tr>
                <td><b>Company</b></td>
                <td><b>Date</b></td>
                <td><b>Note</b></td>
                <td><b>Voucher No</b></td>
              </tr>
              <tr>
                <td id="company3"></td>
                <td id="date3"></td>
                <td id="note3"></td>
                <td id="journal3"></td>
              </tr>
              <!-- <tr>
                <td><b>LedgerHead</b></td>
                <td><b>Debit</b></td>
                <td><b>Credit</b></td>
                <td><b>Narration</b></td>
              </tr> -->
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>