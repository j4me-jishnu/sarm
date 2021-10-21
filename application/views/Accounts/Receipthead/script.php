<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#area_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching":false,
        "ajax": {
            "url": "<?php echo base_url();?>getReceipthead/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>Receipthead/edit/'+data['receipt_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['receipt_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "receipt_status", "orderable": false },
            { "data": "receipt_head", "orderable": false },
            { "data": "receipt_desc", "orderable": false },
            { "data": "receipt_id", "orderable": false }
            
        ]
        
    } );
function confirmDelete(receipt_id){
    var conf = confirm("Do you want to Delete ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>ReceiptheadDelete",
            data:{receipt_id:receipt_id},
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