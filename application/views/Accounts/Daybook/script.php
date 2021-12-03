<script>
	$('#day').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
      
	});
	$(".ledgerhead").select2({
            placeholder: " -- Select Cash/Bank -- "
    });
	$('#company').change(function () {
          var company = this.value;
          $.ajax({
      
                  url: "<?php echo base_url()?>cashorbank",
                  type: 'POST',
                  data:{company : company},
                  success: function(data)
                  {       
                      var response = '<option disabled="disabled" value="0" selected="selected">Select Cash/Bank</option>';
                      for( var i = 0; i<data.length; i++)
                      {
                          response += '<option value='+data[i].ledgerhead_id+'>'+data[i].ledger_head+'</option>';
                      }
                      $('#ledger_head').html(response);
                      $('#ledger_head').focus();
                  }
              });
    });
</script>