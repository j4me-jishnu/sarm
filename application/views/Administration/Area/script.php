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
            "url": "<?php echo base_url();?>getArea/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>Area/edit/'+data['area_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['area_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "area_status", "orderable": false },
            { "data": "area_name", "orderable": false },
            { "data": "area_description", "orderable": false },
            { "data": "area_id", "orderable": false }
            
        ]
        
    } );
function confirmDelete(area_id){
    var conf = confirm("Do you want to Delete Category ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>AreaDelete",
            data:{area_id:area_id},
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