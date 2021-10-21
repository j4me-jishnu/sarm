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
            "url": "<?php echo base_url();?>Payroll/get",
            "type": "POST",
            "data" : function () {
			}
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });

        },

        "columns": [
            { "data": "payroll_status", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "emp_name", "orderable": false },
            { "data": "payroll_salmonth", "orderable": false },
            { "data": "payroll_basicsalary", "orderable": false },
            { "data": "payroll_leaveamt", "orderable": false },
            { "data": "payroll_advance", "orderable": false },
            { "data": "payroll_salary", "orderable": false },
			{ "data": "payroll_salarydate", "orderable": false },
			
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
$(document).on('change','#payroll_salmonth',function(){
	var emp_id = $('#emp').val();
	var month = $('#payroll_salmonth').val();
	$.ajax({
            url:'<?php echo base_url(); ?>getAdvanceofEmployee',
            method:'post',
            dataType : 'json',
            data:{emp_id:emp_id,month:month},
            success:function(data){
                $('#payroll_balance').val(data);
                $('#payroll_balance').focus();
            }
    });
    return false;
}); 
$(document).on('change','#payroll_salmonth',function(){
	var emp_id = $('#emp').val();
	var month = $('#payroll_salmonth').val();
	$.ajax({
            url:'<?php echo base_url(); ?>getLeaveofEmployee',
            method:'post',
            dataType : 'json',
            data:{emp_id:emp_id,month:month},
            success:function(data){
                $('#payroll_leaveamt').val(data);
                $('#payroll_leaveamt').focus();
            }
    });
    return false;
});
$(document).on('change','#payroll_salmonth',function(){
    var emp_id = $('#emp').val();
    var month = $('#payroll_salmonth').val();
    $.ajax({
            url:'<?php echo base_url(); ?>getOvertimeofEmployee',
            method:'post',
            dataType : 'json',
            data:{emp_id:emp_id,month:month},
            success:function(data){
                $('#overtime_amt').val(data);
                $('#overtime_amt').focus();
            }
    });
});
$(document).on('click','.calc-salary',function(){
	var basic = $('#payroll_basicpay').val();
	var advance = $('#payroll_balance').val();
	var days = $('#payroll_leaveamt').val();
    var overtime_amt = $('#overtime_amt').val();
	var a = parseFloat(basic)/30;
	var b = parseFloat(days) * parseFloat(a);

	var total = parseFloat(basic) + parseFloat(overtime_amt) - parseFloat(advance) - parseFloat(b);
	// console.log(total);
	$('#payroll_salary').val(total);
    $('#payroll_salary').focus();
});
$('#payroll_salarydate').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
</script>