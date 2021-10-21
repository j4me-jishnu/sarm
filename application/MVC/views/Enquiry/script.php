<script>

  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  var param = '';
  var $customerList=[ {'columnName':'customer_name','label':'Customer'} ];
  $(function () {

    var enquiry_type = {'J':'Job','C':'Complaint','F':'Follow-up'};
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Date picker
    $('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });


     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

     //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    $table = $('#enquiry_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>index.php/category/get/",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $('td',row).eq(0).html(index+1);
            //$('td',row).eq(4).html(enquiry_type[data['type']]);
            $('td', row).eq(3).html('<center><a href="<?php echo base_url();?>index.php/enquiry/edit/'+data['enquiry_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a> &nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['enquiry_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            $('td', row).eq(4).html('<center><a onclick="return confirmDelete('+data['headmanaging_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i> </a></center>');
        },

        "columns": [
            { "data": "category_name" ,"orderable": false },
            { "data": "category_name" ,"orderable": true },
            { "data": "category_description", "orderable": false },
            { "data": "category_description", "orderable": false },
            { "data": "category_status", "orderable": false }
            
        ]
        
    } );
    
    
  });

  $(document).on("ifChecked",".customerType",function(){
    console.log("ENter");
    var val = $(this).val();
    console.log(val,'val');
    if(val == 'N'){
      $("#customer_id").val('');
      // $("#customer_name").val('');
      $("#customer_address").val('');
      $("#customer_phone").val('');
      $("#customer_email").val('');
      $('#customer_name').rcm_autoComplete_d();
    }
    else {
      console.log("customer name append");
      $('#customer_name').rcm_autoComplete('<?php echo base_url();?>index.php/common/getCustomerList',$customerList,param,getCustomerName);
    }
  });

  function getCustomerName(el,event,item){
        console.log(item);
        if(item.customer_id){
            el.val(item.customer_name);
            $("#customer_id").val(item.customer_id);
            $("#customer_address").val(item.customer_address);
            $("#customer_phone").val(item.customer_phone);
            $("#customer_email").val(item.customer_email);
            
        }
    }
  function confirmDelete(committee_id){
    var conf = confirm("Do you want to Delete Committee Member ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>index.php/Committee/delete",
            data:{committee_id:committee_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var options = $.parseJSON(data);
                noty(options);
                $table.ajax.reload();
            }
        });

    }
  
</script>