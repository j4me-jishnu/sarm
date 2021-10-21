<script>
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
$(document).on('change','#company',function(){
	var cmp_id = $('#company').val();
	$.ajax({
            url:'<?php echo base_url(); ?>getEmployeesbyCompany',
            method:'post',
            dataType : 'json',
            data:{cmp_id:cmp_id},
            success:function(data){
                var html = '<option disabled="disabled" value="0" selected="selected">select</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].emp_id+'>'+data[i].emp_name+'</option>';
                }
                $('#emp').html(html);
                $('#emp').focus();
                $('#payroll_basicpay').val('');
            }
    });
    return false;
});
$('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
});
$table = $('#product_table').DataTable( {
        "searching": true,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Overtime/get",
            "type": "POST",
            "data" : function () {
			}
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(5).html('<a href="<?php echo base_url();?>Overtime/edit/'+data['overtime_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['overtime_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a>');
        },

        "columns": [
      		{ "data": "overtime_status", "orderable": false },
      		{ "data": "cmp_name", "orderable": false },
			{ "data": "emp_name", "orderable": false },
			// { "data": "adv_month", "orderable": false },
			{ "data": "date", "orderable": false },
			{ "data": "amount", "orderable": false },
			{ "data": "overtime_id", "orderable": false }
			
        ]
        
});
function confirmDelete(overtime_id){
    var conf = confirm("Do you want to Delete ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Overtime/delete",
            data:{overtime_id:overtime_id},
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
</script>