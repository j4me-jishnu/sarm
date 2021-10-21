<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<script>
 setInterval(function(){
  var d = new Date();
  $('#date').html(d);
}, 1000);
			$.ajax({
            url:"<?php echo base_url()?>dashboard/customer",
            type: 'POST',
            dataType: 'json',
            success:
            function(data)
            {
              $('#customer').html(data);
              console.log(data);
            },
            error:function(e){
            console.log("error");
            }
            });
			
			$.ajax({
            url:"<?php echo base_url()?>dashboard/vendor",
            type: 'POST',
            dataType: 'json',
            success:
            function(data)
            {
              $('#vendor').html(data);
              console.log(data);
            },
            error:function(e){
            console.log("error");
            }
            });
			
			$.ajax({
            url:"<?php echo base_url()?>dashboard/stock",
            type: 'POST',
            dataType: 'json',
            success:
            function(data)
            {
              $('#stock').html(data);
              console.log(data);
            },
            error:function(e){
            console.log("error");
            }
            });
			
			$.ajax({
            url:"<?php echo base_url()?>dashboard/shop",
            type: 'POST',
            dataType: 'json',
            success:
            function(data)
            {
              $('#shop').html(data);
              console.log(data);
            },
            error:function(e){
            console.log("error");
            }
            });
			
	
  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
 
 
  
</script>