<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }

  $table = $('#Supplier_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getSupplier",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(6).html('<center><a href="<?php echo base_url();?>editSupplier/'+data['supplier_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['supplier_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center><br>');
          
        },

        "columns": [
            { "data": "supplier_status", "orderable": true },
            { "data": "supplier_name", "orderable": false },
            { "data": "supplier_address", "orderable": false },
            { "data": "supplier_phone", "orderable": false },
			{ "data": "supplier_email", "orderable": false },
            { "data": "supplier_oldbal", "orderable": false },
			{ "data": "supplier_id", "orderable": false }
        ]
        
    } );
  function confirmDelete(supplier_id){
    var conf = confirm("Do you want to Delete Supplier Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteSupplier",
            data:{supplier_id:supplier_id},
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