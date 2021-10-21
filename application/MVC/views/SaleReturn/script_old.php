<script>
$(document).on('click','#return_qty',function(){
$("#return_qty").val('');
$('#return_reason').prop('disabled', 'disabled');
$('#return_reason').val('').change();
});
$(document).on('change','#return_qty',function(){
$("#ex_productquantity").val($("#return_qty").val());    
$('#return_reason').prop('disabled', false);
var sale_price = $("#sale_price").val();
var quantity = $("#return_qty").val();
var prize = parseFloat(sale_price) * parseFloat(quantity);
$("#return_qtyamount").val(prize);
});
$(document).on('blur','.exproduct',function(){
    var quantity = $("#ex_productquantity").val();
    var price = $("#ex_productprice").val();
    var discount = $("#ex_productdisc").val();
    if(discount === '')
    {
        discount=0;
    }
    if(quantity !=='' && price !=='')
    {
        var total = parseFloat(quantity) * parseFloat(price) - parseFloat(discount);
        $("#ex_total").val(total); $("#showtotal").show();
        $("#total").html(parseFloat(total));
    }
}); 
  
$(document).on('change','#return_reason',function(){
    var ex = $("#return_reason").val();
     
    if(ex == 2)
    {
        $('#exchangemodal').modal();
    }
});
  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  var param = '';
  var $invoice_list=[ {'columnName':'sale_invoice_number','label':'Invoice'},{'columnName':'product_name','label':'Product'}, {'columnName':'category_name','label':'Category'},{'columnName':'subcategory_name','label':'Subcategory'}];
   $('#invoice_no').rcm_autoComplete('<?php echo base_url();?>index.php/common/getSaleInvoiceList',$invoice_list,param,getInvoiceNumber);
 
    function getInvoiceNumber(el,event,item){
     console.log(item);
     //alert(item.purchase_id);
        if(item.sale_id){
            el.val(item.sale_invoice_number);
            $("#sale_id").val(item.sale_id);
            $("#product_id").val(item.product_id);
            $("#product_name").val(item.product_name);
            $("#sale_qty").val(item.sale_quantity);
            $("#sale_Qty").val(item.sale_quantity);
            $("#sale_price").val(item.sale_price);
              
        }
    } 
var $productList=[ {'columnName':'product_name','label':'Product'},{'columnName':'category_name','label':'Categry'},{'columnName':'subcategory_name','label':'Subcategry'},{'columnName':'size_name','label':'Size'},{'columnName':'color_name','label':'Color'} ];
 
$('#ex_productname').rcm_autoComplete('<?php echo base_url();?>index.php/common/getPurchaseListusingID',$productList,param,getexProductName);
 
    function getexProductName(el,event,item){
     console.log(item);
     //alert(item.purchase_id);
        if(item.product_id){
            el.val(item.product_name);
        $("#ex_productprice").val(item.sale_price);  
        $("#ex_productid").val(item.product_id);
        }
    }
    $('#invoice_no').click(function(){
       $("#invoice_no").val('');
       $("#sale_id").val('');
   });   
   $('#return_qty').change(function(){ 
       
       var return_qty = $('#return_qty').val();
       var sale_qty = $('#sale_qty').val();
       
       var options = {
         'title': 'Error',
         'style': 'error',
         'message': 'Return quantity greater than sale quantity.!',
         'icon': 'warning',
         };
         var n = new notify(options);
       if(return_qty > sale_qty)
       {
           
             n.show();
          $('#return_qty').val('');
       }
   });
    $('#invoice_no').change(function(){

     setTimeout(function(){  
     var a = $("#sale_id").val();
     if(a ==='')
        { 
         $('#invoice_no').val('');
         $("#product_name").val('');
         $("#sale_qty").val('');
         var options1 = {
         'title': 'Error',
         'style': 'error',
         'message': 'Invoice Not Exist....!',
         'icon': 'warning',
         };
          var n1 = new notify(options1);  

          if(a === '') {
             n1.show();
           }

       }
    }, 1000);
    });
  $(function () {

    var enquiry_type = {'1':'Damage','2':'Exchange','3':'No Use'};
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

    $table = $('#category_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>index.php/SaleReturn/get/",
            "type": "POST",
            "data" : function (d) {
                d.invoice_no = $("#invoice_number").val();
                d.product_name = $("#product_name").val();
                d.return_reason = $("#return_reason").val();
                d.start_date = $("#pmsDateStart").val();
                d.end_date = $("#pmsDateEnd").val();
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
            $('td',row).eq(0).html(index+1);
            $('td',row).eq(7).html(enquiry_type[data['return_reason']]);
            $('td', row).eq(10).html('<center><a onclick="return confirmDelete('+data['sreturn_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
          //$('td', row).eq(4).html('<center><a onclick="return confirmDelete('+data['category_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i> </a></center>');
        },

        "columns": [
            { "data": "sreturn_id", "orderable": false },
            { "data": "invoice_no", "orderable": false },
            { "data": "product_name", "orderable": false },
            { "data": "category_name", "orderable": false },
            { "data": "subcategory_name", "orderable": false },
            { "data": "size_name", "orderable": false },
            { "data": "color_name", "orderable": false },
            { "data": "sreturn_id", "orderable": false },
            { "data": "return_qty", "orderable": false },
            { "data": "date", "orderable": false },
            { "data": "return_status", "orderable": false }
            
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

  function getProductName(el,event,item){
        console.log(item);
        if(item.customer_id){
            el.val(item.customer_name);
            $("#customer_id").val(item.customer_id);
            $("#customer_address").val(item.customer_address);
            $("#customer_phone").val(item.customer_phone);
            $("#customer_email").val(item.customer_email);
            
        }
    }
	function confirmDelete(sreturn_id){
    var conf = confirm("Do you want to Delete Returns ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>index.php/SaleReturn/delete",
            data:{sreturn_id:sreturn_id},
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
        
$('#search').click(function () {
        
        $table.ajax.reload();
    });
	function send()
{document.theform.submit()}
  
</script>