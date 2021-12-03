<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
$("#voucher_date").datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
}); 
$table = $('#receipt_list').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Voucher/get",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Voucher/edit/'+data['voucher_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['voucher_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
        },

        "columns": [
                { "data": "voucher_status", "orderable": true },
                { "data": "vouch_head", "orderable": false },
                { "data": "voucher_date", "orderable": false },
                { "data": "voucher_amount", "orderable": false },
                { "data": "paid_from", "orderable": false },
                { "data": "narration", "orderable": false },
                { "data": "voucher_status", "orderable": false }
        ]
        
    }); 
function confirmDelete(voucher_id){
    var conf = confirm("Do you want to Delete Receipt Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Voucher/delete",
            data:{voucher_id:voucher_id},
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