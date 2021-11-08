<script>
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $(function () {
	$("#group_name option:first").before('<option value="">--Select Class--</option>');
	$("#group_name").val("").change();
	
	$("#finyr option:first").before('<option value="">Academic year</option>');
	$("#finyr").val("").change();
	
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Date picker
    $('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });
     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

     //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
	$('#search').click(function () {
        
        $table1.ajax.reload();
		$table2.ajax.reload();
    });

    $table1 = $('#attendance_table').DataTable( {
        "searching": false,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
		"paging":   false,
        "ordering": false,
        "info":     false,
		
        "ajax": {
            "url": "<?php echo base_url();?>getAttendanceTabele",
            "type": "POST",
            "data" : function (d){
      				d.emp_name = $("#emp_name").val();
      				d.start_date = $('#pmsDateStart').val();
      				d.end_date = $('#pmsDateEnd').val();
			}
        },
        "createdRow": function ( row, data, index ) {
            $table1.column(0).nodes().each(function(node,index,dt){
            $table1.cell(node).data(index+1);
            });
			
        },

        "columns": [
                { "data": "att_status", "orderable": false },
      			{ "data": "att_date", "orderable": false },
      			{ "data": "emp_name", "orderable": false }
       
        ]
        
    });
	   $table2 = $('#absent_table').DataTable( {
        "searching": false,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
		    "paging":   false,
        "ordering": false,
        "info":     false,
		
        "ajax": {
            "url": "<?php echo base_url();?>getAbsentTable",
            "type": "POST",
            "data" : function (d){
      				d.emp_name = $("#emp_name").val();
      				d.start_date = $('#pmsDateStart').val();
      				d.end_date = $('#pmsDateEnd').val();
				
			}
        },
        "createdRow": function ( row, data, index ) {
            $table2.column(0).nodes().each(function(node,index,dt){
            $table2.cell(node).data(index+1);
            });
			
        },

        "columns": [
                { "data": "absent_status", "orderable": false },
      			{ "data": "absent_date", "orderable": false },
      			{ "data": "emp_name", "orderable": false }
       
        ]
        
    });
$('#emp_name').keyup(function(){
	$table1.ajax.reload();
	$table2.ajax.reload();
});
});

	
</script>