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
            "url": "<?php echo base_url();?>getPieceEmployee",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) { 
          
          // console.log(data);
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(9).html('<center><a href="<?php echo base_url();?>editPieceRateEmployee/'+data['emp_pr_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_pr_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
		},

        "columns": [
            { "data": "emp_pr_status", "orderable": true },
            { "data": "cmp_name", "orderable": false },
            { "data": "emp_pr_name", "orderable": false },
            { "data": "emp_pr_address", "orderable": false },
            { "data": "emp_pr_phone", "orderable": false },
			{ "data": "emp_pr_email", "orderable": false },
            { "data": "emp_pr_material_ty", "orderable": false },
            { "data": "emp_pr_piece_rate", "orderable": false },
            {
            data: 'emp_pr_act_status',
            render: function (data, type, row) {
                if(data == 0){
                        return '<button type="button" class="btn btn-success" style="width:90px;">ACTIVE</button>';
                    }
                    else{
                        return '<button type="button" class="btn btn-danger" style="width:90px;">INACTIVE</button>';    
                    } 
                }
            }, 
			{ "data": "emp_pr_id", "orderable": false }
        ]
        
    } );
   function confirmDelete(emp_pr_id){
    var conf = confirm("Do you want to Delete Piece Rate Employee Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deletePeiceRateEmployee",
            data:{emp_pr_id:emp_pr_id},
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