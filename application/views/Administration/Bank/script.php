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
            $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>Bank/edit/'+data['bank_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['bank_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "bank_status", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "bank_name", "orderable": false },
            { "data": "bank_accno", "orderable": false },
            { "data": "bank_branch", "orderable": false },
            { "data": "bank_ifsc", "orderable": false },
            {
            data: 'bank_debit_credit',
            "className": "text-center",
            render: function (data, type, row) {
                if (data == '0') {
                    return '<i class="fas fa-arrow-left" style="color:red"></i>';
                }else{
                    return '<i class="fas fa-arrow-right" style="color:green"></i>';
                }
                }
            }, 
            {
            data: 'bank_act_status',
            "className": "text-center",
            render: function (data, type, row) {
                if (data == '0') {
                    return '<i class="fa fa-toggle-on" style="color:green;font-size:30px;"></i>';
                }else{
                    return '<i class="fa fa-toggle-off" style="color:red;font-size:30px;"></i>';
                }
                }
            }, 
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