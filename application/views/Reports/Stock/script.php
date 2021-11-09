<script>

var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
      }

  $(function () {
		
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    

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

    $table = $('#expense_table').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
		"searching":false,
		"processing": true,
		dom: 'lBfrtip',
		buttons: [
		{
			   extend: 'copy',
			   exportOptions: {
				   columns: [ 0,1,2,3,4,5]
			   }
		   },
		   {
			   extend: 'excel',
			   exportOptions: {
				   columns: [ 0,1,2,3,4,5]
			   }
		   },
		   {
			   extend: 'pdf',
			   exportOptions: {
				   columns: [ 0,1,2,3,4,5 ]
			   }
		   },
		   {
			   extend: 'print',
			   exportOptions: {
				   columns: [ 0,1,2,3,4,5 ]
			   }
		   },
		   {
			   extend: 'csv',
			   exportOptions: {
				   columns: [ 0,1,2,3,4,5 ]
			   }
		   },
		],
        "ajax": {
            "url": "<?php echo base_url();?>getStockReport",
            "type": "POST",
            "data" : function (d) {
            d.item_name = $('#item_name').val();
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
		},

        "columns": [
            { "data": "stock_status", "orderable": true },
			{ "data": "cmp_name", "orderable": false },
			{ "data": "product_code", "orderable": false },
			{ "data": "product_name", "orderable": false },
			{ "data": "fin_year", "orderable": false },
            { "data": "stock", "orderable": false },	
			
        ]
        
    });
	
  });
  $(document).on('click','#search',function(){
		$table.ajax.reload();
 });
</script>