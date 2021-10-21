<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#bank_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching":false,
        "ajax": {
            "url": "<?php echo base_url();?>getBank/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Bank/edit/'+data['bank_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['bank_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "bank_status", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "bank_name", "orderable": false },
            { "data": "bank_accno", "orderable": false },
            { "data": "bank_branch", "orderable": false },
            { "data": "bank_ifsc", "orderable": false },
            { "data": "bank_id", "orderable": false }
            
        ]
        
    } );
function confirmDelete(bank_id){
    var conf = confirm("Do you want to Delete Bank details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>BankDelete",
            data:{bank_id:bank_id},
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