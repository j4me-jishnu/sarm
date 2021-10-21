<script>

  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }

  $table = $('#Tax_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getTaxdetails",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>editTaxdetails/'+data['tax_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['tax_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "tax_status", "orderable": true },
            { "data": "taxname", "orderable": false },
            { "data": "taxamount", "orderable": false },
            { "data": "taxdetails", "orderable": false },
			{ "data": "tax_id", "orderable": false }
        ]
        
    } );
  function confirmDelete(tax_id){
    var conf = confirm("Do you want to Delete Tax Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteTaxdetails",
            data:{tax_id:tax_id},
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