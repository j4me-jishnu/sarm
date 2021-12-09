<script>
    $("#supplier option:first").before('<option value="" selected>Select Supplier</option>');
    $('#supplier').select2();

    $("#mainCategory option:first").before('<option value="" selected>Select Supplier</option>');
    $('#mainCategory').select2();

    $("#subcategory option:first").before('<option value="" selected>Select Supplier</option>');
    $('#subcategory').select2();

	$table = $('#stock_table').DataTable( {
        "searching": false,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "aLengthMenu": [[100, 200, 400], [100, 200, 400]],
        "iDisplayLength": 100,
        "ajax": {
            "url": "<?php echo base_url();?>getStockdetails/",
            "type": "POST",
            "data" : function (d){
				d.supplier = $('#supplier').val();
				d.maincategory = $('#mainCategory').val();
                d.subcategory = $('#subcategory').val();
			}
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<center><a href="<?php echo base_url();?>StockUpdateList/'+data['product_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>');
			if(data['stock_sum'] <=0)
			{
				$('td', row).eq(6).html('<center><button type="button" class="btn btn-block btn-danger">Out of Stock</button></center>');
			}
			else if(data['stock_sum'] > 0 && data['stock_sum'] < data['min_stock'])
			{
				$('td', row).eq(6).html('<center><button type="button" class="btn btn-block btn-warning">Reached Below</button></center>');
			}
			else
			{
				$('td', row).eq(6).html('<center><button type="button" class="btn btn-block btn-success">Available</button></center>');
			}
			
        },

        "columns": [
            { "data": "stock_status", "orderable": false },
			{ "data": "cmp_name", "orderable": false },
            { "data": "product_name", "orderable": false },
            { "data": "opening_stock", "orderable": false },
            { "data": "stock_sum", "orderable": false },
            { "data": "stock_status", "orderable": false },
            { "data": "overall_status", "orderable": false }
        ]
        
    } );
    $('#search_button').click(function () {
        
        $table.ajax.reload();
    });
    $('#refresh').click(function () { 
        window.location.href = "<?php echo base_url();?>Stock";
        return false;
    });

    $(document).on('change','#mainCategory',function(){
    var main_cat = $('#mainCategory').val();
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
                    $('#subcategory').html(html);
                    $('#subcategory').focus();
                }
            });
    });

</script>