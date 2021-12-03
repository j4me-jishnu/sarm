<script>
 $('#company').change(function () {
 	var cmp_id =  $('#company').val();
 	$.ajax({
            
            url: "<?php echo base_url()?>getItembyCompany",
            type: 'POST',
            data:{cmp_id : cmp_id},
            success: function(data)
            {       
                var response = '<option disabled="disabled" value="0" selected="selected">Select</option>';
                for( var i = 0; i<data.length; i++)
                {
                    response += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                } 
                $('#item').html(response);
                $('#item').focus();
            }
        });
 });
 var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
      }

  $table = $('#product_table').DataTable( {
        "searching": true,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getOpenstock/",
            "type": "POST",
            "data" : function (d) {
        d.shpname = $("#shpname").val();
      }
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(4).html('<a href="<?php echo base_url();?>Openstock/edit/'+data['opening_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['opening_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a>');
          
        },

        "columns": [
            { "data": "opening_status", "orderable": false },
            { "data": "product_name", "orderable": false },
            { "data": "cmp_name", "orderable": false },
            { "data": "stock", "orderable": false },     
            { "data": "opening_id", "orderable": false },
        ]
        
    } );  
    function confirmDelete(open_id){
    var conf = confirm("Do you want to Delete Stock ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteOpenstock",
            data:{open_id:open_id},
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