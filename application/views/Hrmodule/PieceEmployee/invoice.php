<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Peice Rate Employee Reciept</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-globe"></i> SARM
                    <small class="float-right">Date: <?php echo date('d/m/Y'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr id="head">
                            <?php foreach($records as $raw){ ?>
                            <th colspan="2">NAME:&nbsp;&nbsp;&nbsp;<?php echo $raw->emp_name ?></th>
                            <th>DATE:&nbsp;&nbsp;&nbsp;<?php echo $raw->emp_pr_pay_date ?></th>
                            <?php } ?>
                        </tr>
                        <tr>
                            <th scope="col">ITEM</th>
                            <th scope="col">PCS/KG</th>
                            <th scope="col">RATE</th>
                            <th scope="col">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody id="lists2">
                         <?php foreach($records2 as $lists) { ?>   
                        <tr>
                            <td><?php echo $lists->emp_pr_item ?></td>
                            <td><?php echo $lists->emp_pr_kg_pcs ?></td>
                            <td><?php echo $lists->emp_pr_rate ?></td>
                            <td><?php echo $lists->emp_pr_rate * $lists->emp_pr_kg_pcs ?></td>
                        </tr>
                        <?php } ?>
                        <?php foreach($records as $row){ ?>
                        <tr>
                            <td colspan="3"><b>TOTAL</b></td>
                            <td><b><?php echo $row->emp_pr_pay_total ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><b>ADV</b></td>
                            <td><?php echo $row->emp_pr_pay_advance ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><b>NET TOTAL</b></td>
                            <td><b><?php echo $row->emp_pr_pay_total - $row->emp_pr_pay_advance ?><b></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><b>PAID</b></td>
                            <td><b><?php echo $row->emp_pr_paid_amt ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td><b>BAL</b></td>
                            <td><?php echo $row->emp_pr_pay_balance ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- /.col -->
              </div>


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <button onclick="window.print()" class="btn btn-light"><i class="fa fa-print"></i> Print</button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" onclick="showPDFSheet()">
                    <i class="fa fa-download"></i>  Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>