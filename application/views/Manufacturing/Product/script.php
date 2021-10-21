<script>
$('.rawproducts').select2();
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#product_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>ManufacturingProducts/getProducts/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>editProducts/'+data['product_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['product_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            if (data['active_status'] == 1) 
            {
                $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>deactivateProduct/'+data['product_id']+'/'+data['cmp_id']+'"><i style="font-size: 25px;color:#03ab11;" class="glyphicon glyphicon-ok-circle" title="Click to Deactivate"></i></a></center>');
            }
            else
            {
                $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>activateProduct/'+data['product_id']+'/'+data['cmp_id']+'"><i style="font-size: 25px;color:#ff0000;" class="glyphicon glyphicon-remove-circle" title="Click to Activate"></i></a></center>');
            }    
        },

        "columns": [
            { "data": "product_status", "orderable": false },
            { "data": "product_code", "orderable": false },
            { "data": "product_name", "orderable": false },
            { "data": "category_name", "orderable": false },
            { "data": "subcategory_name", "orderable": false },
            { "data": "product_description", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "product_status", "orderable": false },
            { "data": "active_status", "orderable": false }
        ]
        
    } );
function confirmDelete(product_id){
    var conf = confirm("Do you want to Delete Product ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>itemDeleted",
            data:{product_id:product_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var options = $.parseJSON(data);
                noty(options);
                $table.ajax.reload();
            }
        });

    }
	}
$(document).on('change','#maincategory',function(){
    var main_cat = $('#maincategory').val();
    $.ajax({
            url:"<?php echo base_url();?>Product/getSubcategories",
            data:{main_cat:main_cat},
            type:'POST',
            dataType:"json",
            success:function(data){
                var html = '<option disabled="disabled" value="0" selected="selected">select</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].subcategory_id+'>'+data[i].subcategory_name+'</option>';
                    }
                    $('#subcategory_div').hide();
                    $('#subcategory_section').show();
                    $('#subcategory').html(html);
                    $('#subcategory').focus();
                }
            });
});
$(document).on('change','#company',function(){
    var cmp_id = $('#company').val();
    $.ajax({
            url:"<?php echo base_url();?>Product/getSuppliersbyCompany",
            data:{cmp_id:cmp_id},
            type:'POST',
            dataType:"json",
            success:function(data){
                var html = '<option disabled="disabled" value="0" selected="selected">select</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].supplier_id+'>'+data[i].supplier_name+'</option>';
                    }
                    $('#supp_div').hide();
                    $('#supp_section').show();
                    $('#supp_id').html(html);
                    $('#supp_id').focus();
                }
            });
});
$('.changetabbuttonright').click(function(e){
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    counter ++;
    e.preventDefault();
    $('#mytabs a[href="#menu_'+counter+'"]').tab('show');
})
$('.changetabbuttonleft').click(function(e){
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    counter --;
    e.preventDefault();
    $('#mytabs a[href="#menu_'+counter+'"]').tab('show');
})    
$("#program_table").click(function(){
        
        var count=$('#raw_id').val();
        var counter = parseFloat(count) + 1;
        var cmp_id = $('#company').val();
        $.ajax({
            url:"<?php echo base_url();?>getItemlist",
            type:'POST',
            data:{cmp_id : cmp_id},
            dataType:"json",
            success:function(data){
                var html = '<option disabled="disabled" value="0" selected="selected">select</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                    }
                    $('#rawproduct_'+counter+'').html(html);
                }
            });
        // var htmlVal='<tr><td><input type="text" id="rawproduct_'+counter+'" data-pms-required="true" name="rawproduct[]" class="form-control" placeholder="Product name"></td><td><input type="text" id="quantity_'+counter+'" data-pms-required="true" name="quantity[]" class="form-control" placeholder="Quantity"></td></tr>';
        var htmlVal='<tr><td><select class="form-control rawproduct" id="rawproduct_'+counter+'" name="rawproduct[]"></select></td><td><input type="text" id="quantity_'+counter+'" data-pms-required="true" name="quantity[]" class="form-control" placeholder="Quantity"></td></tr>';

        $("#raw_material_table").append(htmlVal);
        $('#raw_id').val(counter);
        $('#submit_button').show();
        
        $('.rawproduct').select2();
});
</script>