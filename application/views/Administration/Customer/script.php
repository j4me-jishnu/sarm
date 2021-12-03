<script>
	$table = $('#customer_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Customerget",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            
              $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Customeredit/'+data['cust_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['cust_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
		},

        "columns": [
            { "data": "custstatus", "orderable": true },
            { "data": "custname", "orderable": false },
            { "data": "custaddress", "orderable": false },
            { "data": "custphone", "orderable": false },
      		{ "data": "old_balance", "orderable": false },
            {
            data: 'debit_credit',
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
            data: 'cust_act_status',
            "className": "text-center",
            render: function (data, type, row) {
                if (data == '0') {
                    return '<i class="fa fa-toggle-on" style="color:green;font-size:30px;"></i>';
                }else{
                    return '<i class="fa fa-toggle-off" style="color:red;font-size:30px;"></i>';
                }
                }
            }, 
			{ "data": "cust_id", "orderable": false }
        ]
        
    });
    
  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  function confirmDelete(cust_id){
    var conf = confirm("Do you want to Delete Customer Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Customerdelete",
            data:{cust_id:cust_id},
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
    //</center><br><center><a href="<?php echo base_url(); ?>Customer/add_payment/'+data['cust_id']+'">Add Payment</center>
</script>