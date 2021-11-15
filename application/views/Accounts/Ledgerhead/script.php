<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  } 
$("#groups").select2({
            placeholder: " -- Select groups -- "
});
$table = $('#ledgerhead_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Ledgerhead/get",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            if(data['ledger_default'] == 0){
                $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>Ledgerhead/edit/'+data['ledgerhead_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['ledgerhead_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            }
            else
            {
                $('td', row).eq(8).html('<center><i class="fa fa-cubes"></i></center>');    
            }
            if(data['debit_or_credit'] == 1)
            {
                $('td', row).eq(7).html('<center>Debit</center>');
            }
            else
            {
                $('td', row).eq(7).html('<center>Credit</center>');
            }
        },

        "columns": [
                { "data": "ledgerhead_status", "orderable": true },
                { "data": "type_name", "orderable": false },
                { "data": "main_group", "orderable": false },
                { "data": "group_name", "orderable": false },
                { "data": "ledger_head", "orderable": false },
                { "data": "ledgerhead_desc", "orderable": false },
                { "data": "opening_bal", "orderable": false },
                { "data": "ledgerhead_status", "orderable": false },
                { "data": "ledgerhead_status", "orderable": false },
        ]
        
    }); 
function confirmDelete(ledgerhead_id){
    var conf = confirm("Do you want to Delete Receipt Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Ledgerhead/delete",
            data:{ledgerhead_id:ledgerhead_id},
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