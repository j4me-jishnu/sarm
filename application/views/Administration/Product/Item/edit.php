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
                <th>Company</th>
                <th>Supplier Name</th>
                <th>Main Category</th>
                <th>Sub Category</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Opening Stock</th>
                <th>Minimum Stock</th>
                <th>Product Mode</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for($i=0;$i<count($records);$i++){
            ?>
            <tr>
                <td>
                    <select name="company[]" id="company" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($company as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->cmp_id ?>" <?php if(isset($records[$i]->company_id)) if ($records[$i]->company_id == $row->cmp_id)  echo "selected" ?>><?php echo $row->cmp_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                </td>
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
                    <select name="maincategory[]" class="form-control" id="maincategory" required>
                      <option></option>
                      <?php
                      foreach ($mainCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->category_id ?>" <?php if(isset($records[$i]->main_category_id)) if ($records[$i]->main_category_id == $row->category_id)  echo "selected" ?>><?php echo $row->category_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                </td>
                <td>
                <select name="subcategory[]" id="subcategory" class="form-control">
                      <option></option>
                      <?php
                      foreach ($subCategory as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->subcategory_id ?>" <?php if(isset($records[$i]->subcategory_id)) if ($records[$i]->subcategory_id == $row->subcategory_id)  echo "selected" ?>><?php echo $row->subcategory_name; ?></option>
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
                <td>
                    <textarea  data-pms-type="address" class="form-control" name="product_description[]"><?php if(isset($records[$i]->product_description)) echo $records[$i]->product_description ?></textarea>
                </td>
                <td>
                    <select name="product_unit[]" class="form-control" required>
                      <option></option>
                      <?php
                      foreach ($unit as $row) 
                      {
                        ?>
                        <option value="<?php echo $row->unit_id ?>" <?php if(isset($records[$i]->product_unit)) if ($records[$i]->product_unit == $row->unit_id)  echo "selected" ?>><?php echo $row->unit_name; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                </td>
                <td>
                    <input type="text"  class="form-control" name="opening_stock[]" id="opening_stock"  value="<?php if(isset($records[$i]->stock)) echo $records[$i]->stock ?>" readonly>
                </td>
                <td>
                    <input type="text" data-pms-required="true"  class="form-control" name="min_stock[]" id="min_stock"  value="<?php if(isset($records[$i]->min_stock)) echo $records[$i]->min_stock ?>">
                </td>
                <td>
                    <input type="radio" name="p_type[]" value="0" <?php if (@$records[$i]->goods_or_service==0) echo "checked";?>>Goods
                    <input type="radio" name="p_type[]" value="1" <?php if (@$records[$i]->goods_or_service==1) echo "checked";?>>Service
                </td>
                <td>
                    <input type="text" data-pms-required="true"  class="form-control" name="remark[]" id="remark"  value="<?php if(isset($records[$i]->min_stock)) echo $records[$i]->min_stock ?>">
                    
                </td>
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
