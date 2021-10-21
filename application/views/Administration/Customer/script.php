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
            
              $('td', row).eq(6).html('<center><a href="<?php echo base_url();?>Customeredit/'+data['cust_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['cust_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
		},

        "columns": [
            { "data": "custstatus", "orderable": true },
            { "data": "custname", "orderable": false },
            { "data": "custaddress", "orderable": false },
            { "data": "custphone", "orderable": false },
			      { "data": "custemail", "orderable": false },
      		  { "data": "old_balance", "orderable": false },
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