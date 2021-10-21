<script>
	var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#maincategory_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getMainCategory/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
           $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>Categoryedit/'+data['category_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['category_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
        },

        "columns": [
            { "data": "category_status", "orderable": false },
            { "data": "category_name", "orderable": false },
            { "data": "category_description", "orderable": false },
            { "data": "category_id", "orderable": false }
            
        ]
        
    } );
function confirmDelete(category_id){
    var conf = confirm("Do you want to Delete Category ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>CategoryDelete",
            data:{category_id:category_id},
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