<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
$("#rept_date").datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
}); 
$table = $('#receipt_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Receipt/get",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Receipt/edit/'+data['receipt_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['receipt_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
        },

        "columns": [
                { "data": "receipt_status", "orderable": true },
                { "data": "receipt_head", "orderable": false },
                { "data": "rept_date", "orderable": false },
                { "data": "receipt_amount", "orderable": false },
                { "data": "received_to", "orderable": false },
                { "data": "narration", "orderable": false },
                { "data": "receipt_status", "orderable": false }
        ]
        
    }); 
function confirmDelete(receipt_id){
    var conf = confirm("Do you want to Delete Receipt Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Receipt/delete",
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