<script>

  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });

  $table = $('#employee_table').DataTable( {
		"processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getEmployee",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) { 
          
          // console.log(data);
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(10).html('<center><a href="<?php echo base_url();?>Employee/edit/'+data['emp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
		},

        "columns": [
            { "data": "emp_status", "orderable": true },
            { "data": "cmp_name", "orderable": false },
            { "data": "emp_name", "orderable": false },
            { "data": "emp_address", "orderable": false },
            { "data": "emp_phone", "orderable": false },
			{ "data": "emp_email", "orderable": false },
            {
            data: 'emp_mode',
            "className": "text-center",
            render: function (data, type, row) {
                if (data == '0') {
                    return 'Wages';
                }else{
                    return 'Salary';
                }
                }
            }, 
            { "data": "emp_salary", "orderable": false },
            {
            data: 'emp_act_status',
            render: function (data, type, row) {
                if(data == 0){
                        return '<i class="fa fa-toggle-on" style="color:green;font-size:30px;"></i>';
                    }
                    else{
                        return '<i class="fa fa-toggle-off" style="color:red;font-size:30px;"></i>';    
                    } 
                }
            }, 

            { "data": "emp_date", "orderable": false },
			{ "data": "emp_id", "orderable": false }
        ]
        
    } );
   function confirmDelete(emp_id){
    var conf = confirm("Do you want to Delete Employee Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Employee/delete",
            data:{emp_id:emp_id},
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