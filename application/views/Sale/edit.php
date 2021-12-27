<style>
  .wdth-14
  {
    width: 14% !important;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Sale</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" id="purchase_form" action="<?php echo base_url(); ?>Sale/add"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Edit Sale Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <input type="hidden" name="invoice_number_edit" id="invoice_number" value="<?php if(isset($records[0]->invoice_number)) echo  $records[0]->invoice_number?>">
            <input type="hidden" name="sale_pay_id" id="sale_pay_id" value="<?php if(isset($records[0]->sale_payment_id)) echo  $records[0]->sale_payment_id?>">
            <div class="row">
              <div class="col-md-2">
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
              <div class="form-group">
                  <label for="size_name" class="control-label">Company<span style="color:red">*</span></label>

                  <div>
                    <select name="company" id="company" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($company as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[0]->cmp_id)) if ($records[0]->cmp_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              <?php } ?>
              </div>
            </div>
            <div class="row">
              <?php if($this->session->userdata['user_type']!='C')
              { ?>
              <div class="col-sm-4">
                  <label for="product_name" class="control-label">Supplier Name<span style="color:red">*</span></label>
                  <select class="form-control cust_id" name="cust_id" id="cust_id">
                    <option selected disabled>Select Supplier</option>
                    <?php
                    foreach ($customers as $key) {
                    ?>
                    <option value="<?php echo $key->cust_id; ?>" <?php if($key->cust_id == $records[0]->cust_id){echo 'selected';}  ?>><?php echo $key->custname; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              <?php
              }
              else
              {
              ?>
              <div class="col-sm-4">
                  <label for="product_name" class="control-label">Customer<span style="color:red">*</span></label>
                  <select class="form-control supp_id" name="supp_id" id="supp_id">
                    <option selected disabled>Select Supplier</option>
                    <?php
                    foreach ($customers as $key) {
                    ?>
                    <option value="<?php echo $key->cust_id; ?>" <?php if($key->cust_id == $records[0]->cust_id){echo 'selected';}  ?>><?php echo $key->custname; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              <?php  
              }
              ?>    
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Customer Address <span style="color:red">*</span></label>
                  <input type="text" name="supp_add" class="form-control" id="supp_add" value="<?php if(isset($records[0]->custaddress)) echo  $records[0]->custaddress?>">
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Supplier Phone <span style="color:red">*</span></label>
                  <input type="text" name="supp_ph" id="supp_ph" class="form-control" value="<?php if(isset($records[0]->custphone)) echo  $records[0]->custphone ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Date<span style="color:red">*</span></label>
                  <input type="text" name="pur_date" id="pur_date" class="form-control" value="<?php if(isset($records[0]->sale_dat)) echo  $records[0]->sale_dat?>">
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Invoice Number<span style="color:red">*</span></label>
                  <input type="text" name="invoice_number" class="form-control" id="invoice_number" value="<?php if(isset($records[0]->invoice_number)) echo  $records[0]->invoice_number?>" required>
              </div>
              <div class="col-md-4">
                <label class="control-label">Price Category<span style="color:red">*</span></label>
                <select class="form-control" name="optradio" id="optradio" onchange="changePrice()">
                <?php
                foreach ($pcategory as $key) {
                ?>
                <option value="<?php echo $key->pcategory_id ?>" <?php if($key->pcategory_id == $records[0]->price_category){echo 'selected';}  ?>><?php echo $key->pcategory_name ?></option>
                <?php 
                }
                ?>
                </select>
              </div>
            </div>
            <br>
            <!-- <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-2" style="text-align: right;">
                <label class="control-label">Price Category<span style="color:red">*</span></label>
              </div>
              <div class="col-md-4">
                <?php
                foreach ($pcategory as $key) {
                ?>
                <div class="col-sm-2">
                  <label class="radio">
                      <input type="radio" name="optradio" onchange="changePrice()" value="<?php echo $key->pcategory_id ?>" ><?php echo $key->pcategory_name ?>
                    </label>
                </div>
                <?php
                }
                ?>
              </div>
            </div> -->
            <br>
            <div class="row">
              <div class="col-md-2 wdth-14">
                <label>Itemcode</label>
              </div>
              <div class="col-md-2 wdth-14">
                <label>Item</label>
              </div>
              <div class="col-md-2 wdth-14">
                <label>Quantity</label>
              </div>
              <div class="col-md-2 wdth-14">
                <label>Price</label>
              </div>
              <div class="col-md-2 wdth-14">
                <label>Discount</label>
              </div>
              <div class="col-md-2 wdth-14">
                <label>Return</label>
              </div>
              <!-- <div class="col-md-2">
                <label>Tax</label>
              </div> -->
              <div class="col-md-2 wdth-14">
                <label>Total</label>
              </div>
            </div>

            <?php
            $i = 0;
            foreach ($records as $key) {
            $i = $i+1;
            ?>
            <div class="product-item box box-success" id="list">
              <div class="row">
                <div class="col-md-2 wdth-14">
                  <input type="checkbox" name="item_index[]"/>
                  <select name="product_code[]" class="form-control product_code"  id="productcode_<?php echo $i; ?>" autofocus />
                    <?php
                    foreach ($itemlist as $value) {
                    ?>
                    <option value="<?php echo $value->product_code; ?>" <?php if($value->product_code == $key->product_code){echo 'selected';} ?>><?php echo $value->product_code; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-2 wdth-14">
                  <br>
                  <select name="product_id_fk[]" class="form-control product_id fstdropdown-select"  id="productid_<?php echo $i; ?>" autofocus />
                   <?php
                    foreach ($itemlist as $values) {
                    ?>
                    <option value="<?php echo $values->product_id; ?>" <?php if($values->product_id == $key->product_id_fk){echo 'selected';} ?>><?php echo $values->product_name; ?></option>
                    <?php
                    }
                    ?> 
                  </select>
                </div>
                <div class="col-md-2 wdth-14">
                  <br>
                  <input type="text" name="quantity[]" class="form-control" id="quantity_<?php echo $i; ?>" placeholder="Quantity" value="<?php if(isset($key->sale_quantity)) echo  $key->sale_quantity?>" onkeyup="getSum(<?php echo $i; ?>);">
                </div>
                <div class="col-md-2 wdth-14">
                  <br>
                  <input type="text" name="price[]" class="form-control" id="price_<?php echo $i; ?>" placeholder="Price" value="<?php if(isset($key->sale_price)) echo  $key->sale_price?>" onkeyup="getSum(<?php echo $i; ?>);">
                </div>
                <div class="col-md-2 wdth-14">
                  <input type="radio" name="disradio_<?php echo $i; ?>" id="disradio_<?php echo $i; ?>" onchange="getSum(<?php echo $i; ?>);" value="0" <?php if($key->discount_type == 0){echo 'checked';} ?>>price&nbsp;
                  <input type="radio" name="disradio_<?php echo $i; ?>" onchange="getSum(<?php echo $i; ?>);" id="disradio_<?php echo $i; ?>" value="1" <?php if($key->discount_type == 1){echo 'checked';} ?>>%

                  <input type="text" name="discount[]" id="discount_<?php echo $i; ?>" class="form-control" placeholder="Discount" value="<?php if(isset($key->discount_price)) echo  $key->discount_price?>" onkeyup="getSum(<?php echo $i; ?>);">
                </div>
                <div class="col-md-2 wdth-14">
                  <br>
                  <input type="text" name="return[]" class="form-control" id="return_<?php echo $i; ?>" placeholder="Return" value="<?php if(isset($key->sale_return)) echo  $key->sale_return?>" onkeyup="getSum(<?php echo $i; ?>);">
                </div>
                <div class="col-md-2 wdth-14">
                  <br>
                  <input type="text" name="total[]" id="total_<?php echo $i; ?>" class="form-control" placeholder="Total" value="<?php if(isset($key->total_price)) echo  $key->total_price?>">
                </div>
                <input type="hidden" name="pro_table_id[]" id="product_table_id_<?php echo $i; ?>" value="<?php if(isset($key->sale_id)) echo  $key->sale_id?>">
                <?php if(isset($key->sale_remark)) { ?>
                <div class="col-md-2">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="remark_chk[]" checked>
                  <label class="form-check-label" for="flexCheckDefault">remark</label>
                  <input type="text" name="remarks_text" id="myModal_<?php echo $i; ?>" class="form-control" placeholder="Total" value="<?php if(isset($key->sale_remark)) echo  $key->sale_remark?>">
                </div>
                <?php } ?>
              </div>
            </div>
            <?php 
            }
            ?>
            <input type="hidden" name="counter" id="counter" value="<?php echo $i; ?>">
            <input type="hidden" name="counter_old" id="counter_old" value="<?php echo $i; ?>">
            <!-- <div class="box box-success">
              <div class="row">
                <div class="col-md-2">
                  <input type="checkbox" name="item_index[]"/>
                    <select name="product_id_fk[]" class="form-control product_id"  id="productid_1" autofocus />
                    <option></option>
                    <?php
                    foreach ($itemlist as $value) {
                    ?>
                      <option value="<?php echo $value->product_id ?>"><?php echo $value->product_name ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="col-md-2">
                  <br>
                  <input type="text" name="quantity[]" class="form-control" id="quantity_1" placeholder="Quantity" onkeyup="getSum(1);">
                </div>
                <div class="col-md-2">
                  <br>
                  <input type="text" name="price[]" class="form-control" id="price_1" placeholder="Price" onkeyup="getSum(1);" onchange="getSum(1);">
                </div>
                <div class="col-md-2">
                  <input type="radio" name="disradio_1" id="disradio_1" onchange="getSum(1);" value="0">price&nbsp;
                  <input type="radio" name="disradio_1" id="disradio_1" onchange="getSum(1);" value="1" checked>%
                  <input type="text" name="discount[]" id="discount_1" class="form-control" placeholder="Discount" onkeyup="getSum(1);">
                </div>
                <div class="col-md-2">
                  <br>
                  <input type="text" class="form-control" name="tax[]" id="tax_1" onkeyup="getSum(1);">
                </div>
                <div class="col-md-2">
                  <br>
                  <input type="text" name="total[]" id="total_1" class="form-control" placeholder="Total">
                </div>
              </div>
            </div> -->
            <DIV id="service" class="box-body no-padding" ></div>
            <i class="fa fa-fw fa-plus-square fa-2x" onClick="addMore();" Style="color:green;"></i>
            <br>
            <hr>
            <div class="row" style="background-color: #a3a8a5 ">
              <div class="col-md-4">
                <input type="hidden" name="sale_pay_id" value="<?php if(isset($records[0]->sale_payment_id)) echo  $records[0]->sale_payment_id?>">
                <label>Tax Amount</label>
                <input class="form-control" type="text" name="tax_sum" id="tax_sum" value="<?php if(isset($records[0]->tax_amount)) echo  $records[0]->tax_amount?>" onkeyup="getNetTotal()">
                <label>Bill Discount</label><br>
                <input type="radio" name="bill_dis" id="bill_dis" onchange="getNetTotal()" <?php if($records[0]->bill_discount_type == 0) {echo 'checked';} ?> value="0">Price
                <input type="radio" name="bill_dis" id="bill_dis" onchange="getNetTotal()" <?php if($records[0]->bill_discount_type == 1) {echo 'checked';} ?> value="1" >%
                <input class="form-control" type="text" name="bill_discount" id="bill_discount" value="<?php if(isset($records[0]->bill_discount)) echo  $records[0]->bill_discount?>" onkeyup="getNetTotal()" required>
                <label>Frieght</label>
                <input class="form-control" type="text" name="frieght" id="frieght" value="<?php if(isset($records[0]->frieght)) echo  $records[0]->frieght?>" onkeyup="getNetTotal()" required>
                <label>Packing Charge</label>
                <input class="form-control" type="text" name="pack_chrg" id="pack_chrg" value="<?php if(isset($records[0]->packing_charge)) echo  $records[0]->packing_charge?>" onkeyup="getNetTotal()">
                
              </div>
              <div class="col-md-4">
              <label>Net Total</label>
                <input class="form-control" type="text" style="height:70px; background-color: paleturquoise; font-size: large;" autofocus name="sum" id="sum" value="<?php if(isset($records[0]->net_total)) echo  $records[0]->net_total?>">
              <label>Round Off Amount</label>
                <input type="text" name="round_off" id="round_off" class="form-control"  value="<?php if(isset($records[0]->sale_round_off_amt)) echo  $records[0]->sale_round_off_amt?>">
                <input type="hidden" name="round_off_diff" id="round_off_diff" class="form-control"  value="0">
              <label>RoundOff Difference</label>
                <input type="text" name="round_off2" id="round_off2" class="form-control"  value="0">  
              </div>
              <div class="col-md-4">
               
              <label>Total</label>
                <input class="form-control" type="text" name="sum" id="item_total" value="0">

                    <!-- Dynamic Radio Button for Cash Or Bank -->
                    <label for="chkYes">
                    <input type="radio" id="chkYes" name="bank_or_cash" <?php echo($records[0]->bank_id == NULL) ? 'checked':'' ?> value="0" onclick="ShowHideDiv()"/>
                    Cash
                </label>
                <label for="chkNo">
                    <input type="radio" id="chkNo" name="bank_or_cash" <?php echo($records[0]->bank_id != NULL) ? 'checked':'' ?> value="1" onclick="ShowHideDiv()" />
                    Bank
                </label>
                <br>
                <label>Cash Payment</label>
                <input class="form-control" type="text" name="cash" id="cash" value="<?php echo($records[0]->bank_id == NULL) ? $records[0]->cash_paid:$records[0]->bank_paid ?>" onkeyup="getNet();" required> 
                <div id="bank_select" style="display: none">
                <label>Bank Payment</label>
                  <select class="form-control" name="bank_id">
                    <option>select bank</option>
                    <?php
                    foreach ($bank as $bank) {
                        $selected = '';
                      if($records[0]->bank_id == $bank->bank_id){
                        $selected = 'selected';
                      }
                    ?>
                      <option value="<?php echo $bank->bank_id ?>" <?php echo $selected ?>><?php echo $bank->bank_name ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>   
                <!-- Added By Rajeev -->
               

                <label>Old Balance</label>
                <input class="form-control" type="text" name="old_bal" id="old_bal" value="<?php if(isset($records[0]->old_balance)) echo  $records[0]->old_balance?>">
                <label>Net Balance</label>
                <input type="text" name="net_bal" id="net_bal" class="form-control" style="height: 50px;" value="<?php if(isset($records[0]->net_balance)) echo  $records[0]->net_balance?>">
                
                <br>
                <!-- <input type="submit" name="Submit" value="Save" class="btn btn-success btn-lg"> -->
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle btn-lg" type="button" data-toggle="dropdown">Save
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a type="submit" href="#" onclick="document.getElementById('purchase_form').submit();">Save</a></li>
                    <li><a href="#" onclick="saveAsdraft();">Save as Draft</a></li>
                    <li><a href="#" onclick="saveAndprint();">Save and Print</a></li>
                  </ul>
                </div><input type="hidden" name="draft" id="draft">
              </div>
            </div>
            </fieldset>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
<script>
   function saveAsdraft()
  {
    $('#draft').val(2);
    document.getElementById('purchase_form').submit();
  }

  function saveAndprint()
  {
    $('#draft').val(3);
    document.getElementById('purchase_form').submit();
  }

  function ShowHideDiv() {
        bank_select.style.display = chkYes.checked ? "block" : "none";
        bank_select.style.display = chkNo.checked ? "block" : "none";
    }
</script>