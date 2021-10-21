<script>
      $(document).ready(function() {
            var profit=$('#profit').val();
            var loss=$('#loss').val();
            var cmp=$('#company').val();
            if(! loss)
            {
                  loss=0;
            }
            if(! profit)
            {
                  profit=0;
            }
            $.ajax({
                  url:"<?php echo base_url();?>addProfit",
                  data:{loss:loss,profit:profit,cmp:cmp},
                  method:"POST",
                  datatype:"json",
                  success:function(data){
                      
                  }
            });
      });
</script>