<script>
	  $(".ledgerhead").select2({
            placeholder: " -- Select Ledger -- "
    });
    $('#date_from').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'  
	  });
    $('#date_to').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'  
    });
    $('#company').change(function () {
          var company = this.value;
          $.ajax({
      
                  url: "<?php echo base_url()?>getLedgerHead",
                  type: 'POST',
                  data:{company : company},
                  success: function(data)
                  {       
                      var response = '<option disabled="disabled" value="0" selected="selected">Select Ledger</option>';
                      for( var i = 0; i<data.length; i++)
                      {
                          response += '<option value='+data[i].ledgerhead_id+'>'+data[i].ledger_head+'</option>';
                      }
                      $('#ledgerhead').html(response);
                      $('#ledgerhead').focus();
                  }
              });
    });
</script>