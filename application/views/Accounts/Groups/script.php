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
            "url": "<?php echo base_url();?>Groups/get",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
           if(data['default'] == 1)
           {
                $('td', row).eq(4).html('<center></center>');
           }
           else
           {
                $('td', row).eq(4).html('<center><a href="<?php echo base_url();?>Groups/edit/'+data['group_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['group_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
           }
        },

        "columns": [
            { "data": "group_status", "orderable": false },
            { "data": "type_name", "orderable": false },
            { "data": "group_name", "orderable": false },
            { "data": "group_desc", "orderable": false },
            { "data": "group_id", "orderable": false }
            
        ]
        
    } );
function confirmDelete(group_id){
    var conf = confirm("Do you want to Delete ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Groups/delete",
            data:{group_id:group_id},
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