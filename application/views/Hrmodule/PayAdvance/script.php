<script>
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#product_table').DataTable( {
        "searching": true,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>PayAdvance/get",
            "type": "POST",
            "data" : function () {
			}
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<a href="<?php echo base_url();?>PayAdvance/edit/'+data['emp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a>');
        },

        "columns": [
      		{ "data": "adv_status", "orderable": false },
      		{ "data": "cmp_name", "orderable": false },
			{ "data": "emp_name", "orderable": false },
			{ "data": "adv_month", "orderable": false },
			{ "data": "adv_date", "orderable": false },
			{ "data": "adv_amount", "orderable": false },
			{ "data": "adv_id", "orderable": false }
			
        ]
        
    });
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
$(document).on('change','#emp',function(){
	var emp_id = $('#emp').val();
	$.ajax({
            url:'<?php echo base_url(); ?>getBasicofEmployee',
            method:'post',
            dataType : 'json',
            data:{emp_id:emp_id},
            success:function(data){
                $('#payroll_basicpay').val(data);
                $('#payroll_basicpay').focus();
            }
    });
    return false;
});  
$('#payroll_salarydate').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
</script>