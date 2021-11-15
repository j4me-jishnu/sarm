<script>
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
      }  
  $(function () {
	$("#productnum option:first").before('<option value="">--Please Select--</option>');
	$("#productnum").val("").change();
    $(".select2").select2();
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

    $table = $('#sale_details_table').DataTable( {
        "searching": false,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "paging":   false,
        "ordering": false,
        "info":     false,
		  dom: 'lBfrtip',
			buttons: [
				{
					title:'Sale Report',
					extend: 'copy',
					exportOptions: {
						columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
					}
				},
				{
					title:'Sale Report',
					extend: 'excel',
					exportOptions: {
						columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
					}
				},
				{
					title:'Sale Report',
					extend: 'pdf',
					exportOptions: {
						columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
					}
				},
				{
					title:'Sale Report',
					extend: 'print',
					exportOptions: {
						columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
					}
				},
				{
					extend: 'csv',
					exportOptions: {
						columns: [ 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
					}
				},
			],
        
        "ajax": {
            "url": "<?php echo base_url();?>GetcmpSaleReport",
            "type": "POST",
            "data" : function (d) {
                    d.invoice_no = $("#purchase_invoice_no").val();
					d.product_num1 = $("#product").val();
					d.start_date = $("#pmsDateStart").val();
                    d.end_date = $("#pmsDateEnd").val();
				}
        },

        "createdRow": function ( row, data, index ) {
          
          $table.column(0).nodes().each(function(node,index,dt){
          $table.cell(node).data(index+1);
          });
      },


        "columns": [
            { "data": "sale_status", "orderable": false },
            { "data": "invoice_number", "orderable": false },
            { "data": "sale_date", "orderable": false },
			{ "data": "product_name", "orderable": false },
			{ "data": "sale_quantity", "orderable": false },
			{ "data": "sale_price", "orderable": false },
			{ "data": "discount_price", "orderable": false },
			{ "data": "tax_per", "orderable": false },
			{ "data": "total_price", "orderable": false },
			{ "data": "frieght", "orderable": false },
            { "data": "packing_charge", "orderable": false },
            { "data": "net_total", "orderable": false },
            { "data": "cash_paid", "orderable": false },
            { "data": "bank_paid", "orderable": false },
            { "data": "old_balance", "orderable": false },
            { "data": "net_balance", "orderable": false },
         ]
        
    } );
    $('#product').keyup(function (){
	$table.ajax.reload();
	});
    
  });
	
	$('#search').click(function () {
        
        $table.ajax.reload();
    });
</script>