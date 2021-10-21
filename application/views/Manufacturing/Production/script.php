<script>
	function addMore() {
		var count = $('#raw_id').val();
        var counter = parseFloat(count) + 1;
		var cmp_id = $('#company').val();
        if (cmp_id) 
        {
    		var htmlVal='<tr><td><select name="product_code[]" style="width:150px;" class="form-control product_code"  id="productcode_'+counter+'" autofocus /></select></td><td><select name="product_id_fk[]" style="width:150px;" class="form-control product_id fstdropdown-select"  id="productid_'+counter+'" autofocus /></select></td><td><input type="text" style="width:150px;" name="avl[]" id="avl_'+counter+'" class="form-control" readonly></td><td><input type="text" style="width:150px;" name="used[]" id="used_'+counter+'" class="form-control used"></td></tr>';
    		$("#raw").append(htmlVal);
            $.ajax({
                url:"<?php echo base_url();?>getItemlist",
                type:'POST',
                data:{cmp_id : cmp_id},
                dataType:"json",
                success:function(data){
                    var html = '<option></option>';
                    var code = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                        code += '<option value='+data[i].product_code+'>'+data[i].product_code+'</option>'
                    }
                    $('#productid_'+counter+'').html(html);
                    $('#productcode_'+counter+'').html(code);
                    $('#productcode_'+counter+'').select2();
                    $('#productcode_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                    }
                });
    		$('#raw_id').val(counter);
        }
        else
        {
            alert('please select company !');
        }
	}
    function addMores() {
        var count = $('#output_id').val();
        var counter = parseFloat(count) + 1;
        var cmp_id = $('#company').val();
        if (cmp_id) 
        {
            var htmlVal='<tr><td><select name="product_codes[]" style="width:150px;" class="form-control product_codes"  id="productcodes_'+counter+'" autofocus /></select></td><td><select name="products_id[]" style="width:150px;" class="form-control products_id fstdropdown-select"  id="productsid_'+counter+'" autofocus /></select></td><td><input type="text" style="width:150px;" name="produced[]" id="produced_'+counter+'" class="form-control"></td></tr>';
            $("#output").append(htmlVal);
            $.ajax({
                url:"<?php echo base_url();?>getItemlist",
                type:'POST',
                data:{cmp_id : cmp_id},
                dataType:"json",
                success:function(data){
                    var html = '<option></option>';
                    var code = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                        code += '<option value='+data[i].product_code+'>'+data[i].product_code+'</option>'
                    }
                    $('#productsid_'+counter+'').html(html);
                    $('#productcodes_'+counter+'').html(code);
                    $('#productcodes_'+counter+'').select2();
                    $('#productcodes_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                    }
                });
            $('#output_id').val(counter);
        }
        else
        {
            alert('please select company !');
        }
    }
$(document).on("change",'.product_code',function(){
    var product_code = $(this).val();
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    
        $.ajax({
        url:"<?php echo base_url();?>getProductName",
        type: 'POST',
        data:{product_code:product_code},
        dataType: 'json',
        success:function(data)
        {   
          $('#productid_'+counter+'').val(data[0]['product_id']);
          getAvailable(data[0]['product_id'],counter);
        }
        });

});
$(document).on("change",'.product_codee',function(){
    var product_code = $(this).val();
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    
        $.ajax({
        url:"<?php echo base_url();?>getProductName",
        type: 'POST',
        data:{product_code:product_code},
        dataType: 'json',
        success:function(data)
        {   
          $('#productid_'+counter+'').val(data[0]['product_id']);
          getAvailables(data[0]['product_id'],counter);
        }
        });

});
$(document).on("change",'.product_codes',function(){
    var product_code = $(this).val();
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    
        $.ajax({
        url:"<?php echo base_url();?>getProductName",
        type: 'POST',
        data:{product_code:product_code},
        dataType: 'json',
        success:function(data)
        { 
          $('#productsid_'+counter+'').val(data[0]['product_id']);
        }
        });

});
function getAvailable(product_id,counter)
{
    $.ajax({
        url:"<?php echo base_url();?>getAvailable",
        type: 'POST',
        data:{product_id:product_id},
        dataType: 'json',
        success:function(data)
        { 
           $('#avl_'+counter+'').val(data);
        }
        });
}
function getAvailables(product_id,counter)
{
    var used = $('#used_'+counter+'').val();
    $.ajax({
        url:"<?php echo base_url();?>getAvailable",
        type: 'POST',
        data:{product_id:product_id},
        dataType: 'json',
        success:function(data)
        { 
           $('#avl_'+counter+'').val(parseFloat(data)+parseFloat(used));
        }
        });
}
$(document).on('change','.used',function()
{
var quantity = parseFloat($(this).val());

var counterId = $(this).attr("id");
var counter = counterId.split("_")[1];

var avialable = parseFloat($('#avl_'+counter+'').val());
console.log('quantity',quantity);
console.log('availaaaa',avialable);
if(quantity >= avialable || quantity <= 0)
{
var options1 = {
'title': 'Error',
'style': 'error',
'message': 'Input Below or equal Available....!',
'icon': 'warning',
};
var n1 = new notify(options1);
n1.show();
setTimeout(function(){  
n1.hide();
}, 3000);
$('#used_'+counter+'').val('');
}
});
$('#production_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
      
});
var response = $("#response").val();
    if(response)
    {
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
    } 
$table = $('#product_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching":false,
        "ajax": {
            "url": "<?php echo base_url();?>getProduction/",
            "type": "POST",
            "data" : function (d) {
                     d.company = $('#company').val();
                     d.area = $('#area').val();
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<a href="<?php echo base_url();?>Production/view/'+data['production_id']+'"><i class="fa fa-eye" ></i></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>Production/edit/'+data['production_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['production_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a>');
        },

        "columns": [
            { "data": "production_status", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "area_name", "orderable": false },
            { "data": "production_date", "orderable": false },
            { "data": "production_id", "orderable": false },
         ]
        
    }); 
    function confirmDelete(production_id){
    var conf = confirm("Do you want to Delete this production details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Production/delete",
            data:{production_id:production_id},
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

    function tableFilter()
    {
        $table.ajax.reload();
    } 
</script>