<script>
$(document).ready(function () {     

    $(".supp_id").select2({
            placeholder: " -- Select supplier -- "
    });
});    
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
            "url": "<?php echo base_url();?>getProducts/",
            "type": "POST",
            "data" : function (d) {
                d.product_code = $('#product_code').val();
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>editProduct/'+data['product_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['product_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            if (data['active_status'] == 1) 
            {
                $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>deactiveProduct/'+data['product_id']+'/'+data['cmp_id']+'"><i style="font-size: 25px;color:#03ab11;" class="glyphicon glyphicon-ok-circle" title="Click to Deactivate"></i></a></center>');
            }
            else
            {
                $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>activeProduct/'+data['product_id']+'/'+data['cmp_id']+'"><i style="font-size: 25px;color:#ff0000;" class="glyphicon glyphicon-remove-circle" title="Click to Activate"></i></a></center>');
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
    var conf = confirm("Do you want to Delete Category ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>itemDelete",
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
$(document).on('change','#product_code',function(){
    $table.ajax.reload();
});    
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
                    // $('#subcategory_div').hide();
                    // $('#subcategory_section').show();
                    $('#subcategory').html(html);
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
                    // $('#supp_div').hide();
                    // $('#supp_section').show();
                    $('#supp_id').html(html);
                }
            });
});    

// $('#import_form').on('submit', function(event){
// 		event.preventDefault();
// 		$.ajax({
// 			url:"<?php echo base_url(); ?>Product/addImport",
// 			method:"POST",
// 			data:new FormData(this),
// 			contentType:false,
// 			cache:false,
// 			processData:false,
// 			success:function(data){
// 				$('#import_excel').val('');
// 				alert(data);
// 			}
// 		})
// 	});
</script>