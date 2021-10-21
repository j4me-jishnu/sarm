<script>
var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $table = $('#attendence_table').DataTable( {
        "searching": true,
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>Attendence/get",
            "type": "POST",
            "data" : function (d) {
            	d.cmp_id = $("#company").val();
			}
        },
        "createdRow": function ( row, data, index ) {
            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
		$('td', row).eq(2).html('<input type="checkbox" value="'+data['emp_id']+'" class="chkdata">');
        },

        "columns": [
            { "data": "emp_status", "orderable": false },
			{ "data": "emp_name", "orderable": false },
			{ "data": "emp_id", "orderable": false }
        ]
        
    } );
$(document).ready(function() {
    $('#pickbox_all').click(function() {
        $(this).parents('table').find(':checkbox').prop('checked', this.checked);
});
});
$("#date").datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
})
function submit(){
        ckbox = document.getElementsByClassName("chkdata");
        var option = $('#option').val();
        var att_date = $('#date').val();
        for(var i=0;i<ckbox.length;i++){
        element = ckbox[i];
          if(element.checked){
               var emp_id = ckbox[i].value;
                if(emp_id!='' && ckbox!='')
               {
                   $.ajax({
                    url:"<?php echo base_url();?>Attendence/attend_reg",
                    type: 'POST',
                    data:{emp_id:emp_id,att_date:att_date},
                    dataType: 'json',
                    success:
                    function(data){
                        location.reload();
                        }
                    });
                    
                }
              }
              else{
                  var emp_id = ckbox[i].value;
                  if(emp_id!='' && ckbox!='')
                   {
                       $.ajax({
                        url:"<?php echo base_url();?>Attendence/absent_reg",
                        type: 'POST',
                        data:{emp_id:emp_id,att_date:att_date},
                        dataType: 'json',
                        success:
                        function(data){
                            location.reload();
                            }
                        });
                        
                    }
              }
        
        }
        
}
$(document).on('change','#company',function(){
	$table.ajax.reload();
});
</script>