<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
<style>@page { size: A5 }</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Purchase Invoice</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Purchase Invoice</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
                <table class="table table-bordered" id="table_purchase" class="A5">
                    <tbody>
                        <tr style="text-align: center;">
                            <td colspan="6" ><b>ESTIMATE</b></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="4"><b>Customer:</b> <?php echo $records[0]->supplier_name ?></td>
                            
                            <td><b>SL No:</b> <?php echo $records[0]->reference_bill_id ?></td>
                            <td><b>Date:</b> <?php echo $records[0]->purchase_date ?></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td><b>Sr No</b></td>
                            <td><b>Description</b></td>
                            <td><b>Qty</b></td>
                            <td><b>Rate</b></td>
                            <td><b>Discount</b></td>
                            <td><b>Total</b></td>
                        </tr>
                        <?php
                            $x = 1;
                            $total = 0;
                            foreach($records as $rows){
                        ?>
                        <tr style="text-align: center;">
                            <td><?php echo $x; ?></td>
                            <td><?php echo $rows->product_name ?></td>
                            <td><?php echo $rows->purchase_quantity ?></td>
                            <td><?php echo $rows->purchase_price ?></td>
                            <?php if($rows->discount_type == 1){ ?>
                            <td><?php echo $rows->discount_price ?>%</td>
                            <?php } else { ?>
                            <td><?php echo $rows->discount_price ?>Rs.</td>    
                            <?php } ?>    
                            <td><?php echo $rows->total_price ?><?php @$total +=$rows->total_price ?></td>
                        </tr>
                        <?php
                            $x++;
                            }
                        ?>
                        
                        <tr>
                            <td colspan="5"></td>
                            <td><b>Total:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total; ?></td>
                        </tr>
                        <?php foreach($records2 as $rock){ ?>
                        <tr>
                            <td colspan="5"><b>Tax Amount:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->tax_amount; ?></td>
                            <td colspan="1"><b>Old Balance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->old_balance; ?></b></td>
                        </tr>
                        <tr>
                            <td colspan="5"><b>Fright & Packaging:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->frieght+$rock->packing_charge; ?></td>
                            <td colspan="1"><b></b></td>
                        </tr>
                        <tr>
                            <td colspan="5"><b>Discount:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->bill_discount; ?></td>
                            <td colspan="1"><b>Net Total:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->net_total; ?></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <?php if($rock->bank_paid != 0){ ?>
                            <td colspan="1"><b>Paid:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->bank_paid; ?></td>
                            <?php }else if($rock->cash_paid != 0){ ?>
                            <td colspan="1"><b>Paid:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rock->cash_paid; ?></td>
                            <?php } else { ?>  
                            <td colspan="1"><b>Paid:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo 0 ?></td>
                            <?php } ?>          
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="1"><b>Net Balance:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo round($rock->net_balance,2); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <div style="text-align: right;">
                    <button class="btn btn-primary" id="printer">PRINT</button>
                </div>
          </fieldset>
          </div>
        </div>
      </div>
  </section>
</div>



