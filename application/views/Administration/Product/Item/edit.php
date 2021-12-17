<style>
    table{
        width: 100%;
    }
    tr, th{
        min-width: 150px;
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
      <li class="active">Add Product</li>
    </ol>
  </section><br>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>UpdateMultipleItems">
    <legend>Product Details</legend>
    <input type="hidden" id="response" value="<?php echo $this->session->flashdata('response');?>" />
    <input type="submit" class="btn btn-primary" value="UPDATE">
    <div class="table-responsive">
    <table id="example_edit" class="table table-borderless" >
        <thead>
            <tr>
                <th>Supplier Name</th>
                <th>Product Code</th>
                <th>Product Name</th>
              <?php foreach($price_category as $p_cat){ ?>
                <th><?php echo $p_cat->pcategory_name ?></th>
              <?php } ?>  
            </tr>
        </thead>
        <tbody>
            <?php
                for($i=0;$i<count($records);$i++){
            ?>
            <tr>
                <td>
                    <select class="form-control" name="supp_id[]" id="supp_id">
                      <option selected disabled>Select Supplier</option>
                      <?php
                      foreach ($supplier as $key) {
                      ?>
                      <option value="<?php echo $key->supplier_id; ?>" <?php if(isset($records[$i]->supplier_id)) if ($records[$i]->supplier_id == $key->supplier_id)  echo "selected" ?>><?php echo $key->supplier_name; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                </td>
                
                <td>
                    <input type="text" data-pms-required="true"  class="form-control" name="product_code[]" id="product_code"  value="<?php if(isset($records[$i]->product_code)) echo $records[$i]->product_code ?>">
                </td>
                <td>
                    <input type="text" data-pms-required="true"  class="form-control" name="product_name[]" id="product_name"  value="<?php if(isset($records[$i]->product_name)) echo $records[$i]->product_name ?>">
                </td>
                <?php foreach($prices as $pricing){ 
                  if($records[$i]->product_id == $pricing->item_id) { ?>
                <td>
                <input type="hidden" name="p_idx[]" id="p_idx" value="<?php if(isset($pricing->price_id)) echo $pricing->price_id ?>">
                    <input type="hidden" name="pricing_item[]" id="pricing_item" value="<?php if(isset($pricing->item_id)) echo $pricing->item_id ?>">
                    <input type="hidden" name="p_category2[]" id="p_category2" value="<?php if(isset($pricing->pcategory_id)) echo $pricing->pcategory_id ?>">
                    <input type="hidden" name="p_company[]" id="p_company" value="<?php if(isset($pricing->company_id)) echo $pricing->company_id ?>">
                    <input type="text" data-pms-required="true"  class="form-control" name="product_pricing[]" id="product_pricing"  value="<?php if(isset($pricing->item_price)) echo $pricing->item_price ?>">
                </td>
                <?php } } ?>
                <td>
                  <input type="hidden" data-pms-required="true"  class="form-control" name="product_ides[]" id="product_ides"  value="<?php if(isset($records[$i]->product_id)) echo $records[$i]->product_id ?>">
                </td>

            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    </div>
  </form>
</div>
