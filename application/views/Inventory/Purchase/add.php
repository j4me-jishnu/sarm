<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="row">
      <!-- Company Management -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Purchase</li>
    </ol>
  </section><br>

  <!-- Main content -->
  <section class="content">
    <form method="post" id="purchase_form" action="<?php echo base_url(); ?>addPurchase"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <fieldset>
            <legend>Purchase Information</legend>
            <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
            <!-- <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">

                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Save
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Save</a></li>
                    <li><a href="#">Save as Draft</a></li>
                  </ul>
                </div>

              </div>
            </div> -->
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
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records->company_id)) if ($records->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
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
                  <select class="form-control supp_id" name="supp_id" id="supp_id">
                    <!-- <option selected disabled>Select Supplier</option>
                    <?php
                    foreach ($supplier as $key) {
                    ?>
                    <option value="<?php echo $key->supplier_id; ?>"><?php echo $key->supplier_name; ?></option>
                    <?php
                    }
                    ?> -->
                  </select>
              <?php
              }
              else
              {
              ?>
              <div class="col-sm-4">
                  <label for="product_name" class="control-label">Supplier Name<span style="color:red">*</span></label>
                  <select class="form-control supp_id" name="supp_id" id="supp_id">
                    <option selected disabled>Select Supplier</option>
                    <?php
                    foreach ($supplier as $key) {
                    ?>
                    <option value="<?php echo $key->supplier_id; ?>"><?php echo $key->supplier_name; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              <?php  
              }
              ?>    
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Supplier Address <span style="color:red">*</span></label>
                  <input type="text" name="supp_add" class="form-control" id="supp_add">
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Supplier Phone <span style="color:red">*</span></label>
                  <input type="text" name="supp_ph" id="supp_ph" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Date<span style="color:red">*</span></label>
                  <input type="text" name="pur_date" id="pur_date" class="form-control">
              </div>
              <div class="col-md-4">
                  <label for="product_name" class="control-label">Invoice Number<span style="color:red">*</span></label>
                  <input type="text" name="invoice_number" class="form-control" id="invoice_number" required>
              </div>
              <div class="col-md-4">
                <label class="control-label">Price Category<span style="color:red">*</span></label>
                <select class="form-control" name="optradio" id="optradio" onchange="changePrice()">
                <?php
                foreach ($pcategory as $key) {
                ?>
                <option value="<?php echo $key->pcategory_id ?>"><?php echo $key->pcategory_name ?></option>
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
              <div class="col-md-2">
                <label>Itemcode</label>
              </div>
              <div class="col-md-2">
                <label>Item</label>
              </div>
              <div class="col-md-2">
                <label>Quantity</label>
              </div>
              <div class="col-md-2">
                <label>Price</label>
              </div>
              <div class="col-md-2">
                <label>Discount</label>
              </div>
              <!-- <div class="col-md-2">
                <label>Tax</label>
              </div> -->
              <div class="col-md-2">
                <label>Total</label>
              </div>
            </div>
            <input type="hidden" name="counter" id="counter" value="0">
            <input type="hidden" name="counter_old" id="counter_old">
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
            <i class="fa fa-fw fa-minus-square pull-right fa-2x" onClick="deleteRow();" Style="color:red;"></i>
            <br>
            <hr>
            <div class="row" style="background-color: #a3a8a5 ">
              <div class="col-md-2">
                <label>Tax Amount</label>
                <input class="form-control" type="text" name="tax_sum" id="tax_sum" value="0" onkeyup="getNetTotal()">
                <label>Bill Discount</label><br>
                <input type="radio" name="bill_dis" id="bill_dis" onchange="getNetTotal()" value="0">Price
                <input type="radio" name="bill_dis" id="bill_dis" onchange="getNetTotal()" value="1" checked>%
                <input class="form-control" type="text" name="bill_discount" id="bill_discount" value="0" onkeyup="getNetTotal()" required>
                <label>Frieght</label>
                <input class="form-control" type="text" name="frieght" id="frieght" value="0" onkeyup="getNetTotal()" required>
                <label>Packing Charge</label>
                <input class="form-control" type="text" name="pack_chrg" id="pack_chrg" value="0" onkeyup="getNetTotal()">
              </div>
              <div class="col-md-8"></div>
              <div class="col-md-2">
                <label>Net Total</label>
                <input class="form-control" type="text" name="sum" id="sum">
                <label>Cash Payment</label>
                <input class="form-control" type="text" name="cash" id="cash" value="0" onkeyup="getNet();" required>
                <label>Bank Payment</label>
                <input class="form-control" type="text" name="bank" id="bank" value="0" onkeyup="getNet();" required>
                <label>Old Balance</label>
                <input class="form-control" type="text" name="old_bal" id="old_bal" value="0">
                <label>Net Balance</label>
                <input type="text" name="net_bal" id="net_bal" class="form-control" style="height: 50px;" value="0">
                <br>
                <!-- <input type="submit" name="Submit" value="Save" class="btn btn-success btn-lg"> -->
                <div class="dropdown">
                  <button class="btn btn-success dropdown-toggle btn-lg" type="button" data-toggle="dropdown">Save
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a type="submit" href="#" onclick="document.getElementById('purchase_form').submit();">Save</a></li>
                    <li><a href="#" onclick="saveAsdraft();">Save as Draft</a></li>
                  </ul>
                </div><input type="hidden" name="draft" id="draft">
                <br><br><br><br>
              </div>
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
    $('#draft').val(1);
    document.getElementById('purchase_form').submit();
  }
</script>