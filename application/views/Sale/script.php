<script>
$(document).ready(function () {

    $(".cust_id").select2({
            placeholder: " -- Select Customer -- "
    });
});
	var response = $("#response").val();
  	if(response)
  	{
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
    }
$('#pur_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'

});
$(document).on("change",'#company',function()
{
    var cmp_id = $('#company').val();
    $.ajax({

            url: "<?php echo base_url()?>getCustomerbyCompany",
            type: 'POST',
            data:{cmp_id : cmp_id},
            success: function(data)
            {
                var response = '<option disabled="disabled" value="0" selected="selected">Select</option>';
                for( var i = 0; i<data.length; i++)
                {
                    response += '<option value='+data[i].cust_id+'>'+data[i].custname+'</option>';
                }
                $('#cust_id').html(response);
                $('#cust_id').focus();
            }
        });
});
$(document).on("change",'#cust_id',function(){
        var cust_id = $(this).val();

        if(cust_id){
            $.ajax({
            url:"<?php echo base_url();?>getcustDetails",
            type: 'POST',
            data:{cust_id:cust_id},
            dataType: 'json',
            success:function(data){
                $('#supp_add').val(data[0]['custaddress']);
                $('#supp_ph').val(data[0]['custphone']);
                // $("input[name=optradio][value=" + data[0]['supplier_pcategory'] + "]").prop('checked', true);
                $('#old_bal').val(data[0]['old_balance']);
                $('#net_bal').val(data[0]['old_balance']);
                $('#optradio').val(data[0]['cust_pcategory']);
            }
            });
        }
});
// $(document).on("change",'#invoice_number',function()
// {
//      var invoice_number = $('#invoice_number').val();
//     $.ajax({
//         url: "<?php echo base_url()?>checkInvoicenumber",
//         type: 'POST',
//         data:{invoice_number : invoice_number},
//         success: function(data)
//         {
//             if (data > 0)
//             {
//                 alert('The invoice number is alredy Used !');
//                 $('#invoice_number').val('');
//             }
//             else
//             {
//                 $('#invoice_number').css('border-color', 'green');
//             }
//         }
//     });
// });
function addMore()
  {
    var count=$('#counter').val();
    var counter = parseFloat(count) + 1;
    var cust_id=$('#cust').val();
        var cmp_id = $('#company').val();
    $.ajax({
            url:"<?php echo base_url();?>getItemlist",
            type:'POST',
            data:{cmp_id : cmp_id},
            dataType:"json",
            success:function(data){
              var html = '<option></option>';
                var code = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].product_id+'>'+data[i].product_name+'</option>';
                        code += '<option value='+data[i].product_code+'>'+data[i].product_code+'</option>'
                    }
                    $('#productid_'+counter+'').html(html);
                    $('#productcode_'+counter+'').html(code);
                    $('#productcode_'+counter+'').select2();
                    // $('#productid_'+counter+'').select2();
                    // $('#productid_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                    $('#productcode_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                }
            });

    var htmlVal='<DIV class="product-item box box-success id="list_'+counter+'"><div class="row"><div class="col-md-2"><input type="checkbox" name="item_index[]"/><select name="product_code[]" class="form-control product_code"  id="productcode_'+counter+'" autofocus /></select></div><div class="col-md-2"><br><select name="product_id_fk[]" class="form-control product_id fstdropdown-select"  id="productid_'+counter+'" autofocus /></select></div><div class="col-md-2"><br><input type="text" name="quantity[]" class="form-control" id="quantity_'+counter+'" placeholder="Quantity" onkeyup="getSum('+counter+');"></div><div class="col-md-2"><br><input type="text" name="price[]" class="form-control" id="price_'+counter+'" placeholder="Price" onkeyup="getSum('+counter+');"></div><div class="col-md-2"><input type="radio" name="disradio_'+counter+'" id="disradio_'+counter+'" onchange="getSum('+counter+');" value="0">price&nbsp;<input type="radio" name="disradio_'+counter+'" onchange="getSum('+counter+');" id="disradio_'+counter+'" value="1" checked>%<input type="text" name="discount[]" id="discount_'+counter+'" class="form-control" placeholder="Discount" onkeyup="getSum('+counter+');"></div><div class="col-md-2"><input type="checkbox" class="form-check-input" id="remark_'+counter+'" name="remark_chk[]" value="1" data-toggle="modal" data-target="#myModal_'+counter+'"><label>remark</label><input type="text" name="total[]" id="total_'+counter+'" class="form-control" placeholder="Total"></div></div></DIV><div class="modal fade" id="myModal_'+counter+'" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title">Add Remark</h4></div><div class="modal-body"><div class="form-group"><label for="exampleFormControlTextarea1">Remarks</label><textarea class="form-control" name="remarks_text[]" id="exampleFormControlTextarea1" rows="3"></textarea></div></div><div class="modal-footer"><button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button></div></div></div></div>';
    $("#service").append(htmlVal);
    $('#counter').val(counter);
        $('#counter_old').val(counter);
  }
$(document).on("change",'.product_code',function(){
    var product_code = $(this).val();
    var counterId = $(this).attr("id");
    var counter = counterId.split("_")[1];
    var cat = $('#optradio').val();
    if ( ! cat)
    {
        alert('please select a category.');
    }
    else
    {
        $.ajax({
        url:"<?php echo base_url();?>getPriceName",
        type: 'POST',
        data:{product_code:product_code,cat:cat},
        dataType: 'json',
        success:function(data)
        {
          $('#price_'+counter+'').val(data[0]['item_price']);
          $('#productid_'+counter+'').val(data[0]['product_id']);
        }
        });

    }
});
function getSum(row_id)
  {
    var quantity=$('#quantity_'+row_id+'').val();
        if (! quantity)
        {
            alert('Please enter quantity');
        }
        else
        {
            var price=$('#price_'+row_id+'').val();
            // var tax=$('#tax_'+row_id+'').val();
            var discount=$('#discount_'+row_id+'').val();
            var old_bal=$('#old_bal').val();
            var cash=$('#cash').val();
            var bank=$('#bank').val();
            var dis=$('input[type="radio"][name="disradio_'+row_id+'"]:checked').val();
            // console.log(quantity);console.log(price);console.log(tax);console.log(discount);
            if ( ! price)
            {
                $('#total_'+row_id+'').val(0);
                getNetTotal();
            }
            else if(! discount)
            {
                var itemtottal = parseFloat(quantity) * parseFloat(price);
                $('#total_'+row_id+'').val(itemtottal);
                getNetTotal();
            }
            // else if (tax && ! discount)
            // {
            //     var itemtottal = parseFloat(quantity) * parseFloat(price);
            //     var tax_amt = parseFloat(itemtottal) * parseFloat(tax)/100;
            //     var total = parseFloat(itemtottal) + parseFloat(tax_amt);
            //     $('#total_'+row_id+'').val(total);
            //     getNetTotal();
            // }
            else if (discount)
            {
                var itemtottal = parseFloat(quantity) * parseFloat(price);
                //percentage
                if (dis == '1')
                {
                    var disper = parseFloat(itemtottal) * parseFloat(discount)/100;
                    var amt = parseFloat(itemtottal) - parseFloat(disper);
                    $('#total_'+row_id+'').val(amt);
                }
                else
                {
                    var amt = parseFloat(itemtottal) - parseFloat(discount);
                    $('#total_'+row_id+'').val(amt);
                }
                getNetTotal();
            }
            else
            {
                var itemtottal = parseFloat(quantity) * parseFloat(price);
                // var tax_amt = parseFloat(itemtottal) * parseFloat(tax)/100;

                if (dis == '1')
                {
                    var disper = parseFloat(itemtottal) * parseFloat(discount)/100;
                    var amt = parseFloat(itemtottal) - parseFloat(disper) + parseFloat(tax_amt);
                }
                else
                {
                    // var amt = parseFloat(itemtottal) - parseFloat(discount) + parseFloat(tax_amt);
                    var amt = parseFloat(itemtottal) - parseFloat(discount) ;
                }
                $('#total_'+row_id+'').val(amt);
                getNetTotal();
            }
        }
  }
function getNetTotal()
{
    var counter = $('#counter_old').val();
    var old_bal=$('#old_bal').val();
    var tax_amt=$('#tax_sum').val();
    var bill_discount=$('#bill_discount').val();
    var frieght=$('#frieght').val();
    var pack_chrg=$('#pack_chrg').val();
    var dis_type=$('input[type="radio"][name="bill_dis"]:checked').val();
    var sum = 0;
    var round_off = 0;
    for (var i = 1; i <= counter; i++)
    {
        if ($('#total_'+i+'').val())
        {
            var sum = parseFloat(sum) + parseFloat($('#total_'+i+'').val());
            var round_off = Math.floor(parseFloat(sum) + parseFloat($('#total_'+i+'').val()));
        }
    }
    if (tax_amt)
    {
        // var tax_amt = parseFloat(sum) * parseFloat(tax_amt) / 100;
        sum = parseFloat(sum) + parseFloat(tax_amt);
        var round_off = Math.floor(parseFloat(sum) + parseFloat(tax_amt));
    }
    if (bill_discount)
    {
        if (dis_type == 1)
        {
            var bill_discount=parseFloat(sum)*parseFloat(bill_discount)/100;
            sum = parseFloat(sum) - parseFloat(bill_discount);
            var round_off = Math.floor(parseFloat(sum) - parseFloat(bill_discount));
        }
        else
        {
            sum = parseFloat(sum) - parseFloat(bill_discount);
            var round_off = Math.floor(parseFloat(sum) - parseFloat(bill_discount));
        }
    }
    if (frieght)
    {
        sum = parseFloat(sum) + parseFloat(frieght);
        var round_off = Math.floor(parseFloat(sum) + parseFloat(frieght));
    }
    if (pack_chrg)
    {
        sum = parseFloat(sum) + parseFloat(pack_chrg);
        var round_off = Math.floor(parseFloat(sum) + parseFloat(pack_chrg));
    }
    if(isNaN(sum))
    {
        sum = 0;
    }
    if(isNaN(round_off))
    {
        round_off = 0;
    }
    $('#sum').val(sum);
    $('#round_off').val(round_off);
    var cash = $('#cash').val();
    var bank = $('#bank').val();
    var net_bal = parseFloat(old_bal) + parseFloat (sum);
    if (! bank)
    {
        net_bal = parseFloat(net_bal) - parseFloat(cash);
    }
    else if (! cash)
    {
        net_bal = parseFloat(net_bal) - parseFloat(bank);
    }
    else
    {
        var cash = parseFloat(cash) + parseFloat(bank);
        net_bal = parseFloat(net_bal) - parseFloat(cash);
    }
    if(isNaN(net_bal)){ net_bal = 0; }
    $('#net_bal').val(net_bal);
    let total=[];
    for (let i = 1; i <= counter; i++) {
      total.push(parseFloat($('#total_'+i).val()));
    }
    const sum_final = total.reduce((a, b) => a + b, 0);
    if(isNaN(sum_final)){ sum_final = 0; }
    $('#item_total').val(sum_final);
    
    //trigger roundoff diff
    roundOffDiff();
}

function roundOffDiff()
{
    var sum2 = $('#sum').val();
    var round_off2 = $('#round_off').val();
    var diff = sum2 - round_off2;
    if(isNaN(diff)){ diff = 0; }
    $('#round_off_diff').val(diff);
}

function getNet()
{
    var cash = $('#cash').val();
    var bank = $('#bank').val();
    var sum = $('#item_total').val();
    var old_bal=$('#old_bal').val();
    var net_bal = parseFloat(old_bal) + parseFloat (sum);
    if (cash)
    {
        net_bal = parseFloat(net_bal) - parseFloat(cash);
    }
    else if (bank)
    {
        net_bal = parseFloat(net_bal) - parseFloat(bank);
    }
    else
    {
        var cash = parseFloat(cash) + parseFloat(bank);
        net_bal = parseFloat(net_bal) - parseFloat(cash);
    }
    if(isNaN(net_bal)){ net_bal = 0; }
    $('#net_bal').val(net_bal);

}
function changePrice()
{
    // var cat =$("input[name=optradio]:checked").val();
    var cat = $('#optradio').val();
    var counter = $('#counter_old').val();

    for (var i = 1; i <= counter ; i++)
    {
        if ($('#productid_'+i+'').val())
        {
            var product_id=$('#productid_'+i+'').val();
            getPriceData(product_id,cat,i);
        }
    }
}
function getPriceData(product_id,cat,i)
{

    $.ajax({
        url:"<?php echo base_url();?>getPrice",
        type: 'POST',
        data:{product_id:product_id,cat:cat},
        dataType: 'json',
        success:function(data)
        {
            $('#price_'+i+'').val(data[0]['item_price']);
            getSum(i);
        }
        });
}
$table = $('#sale_table').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching":false,
        "scrollX": true,
        "ajax": {
            "url": "<?php echo base_url();?>getSale/",
            "type": "POST",
            "data" : function (d) {
                     d.invoice_number = $('#invoice_numbers').val();
                     d.supplier_id = $('#supplier_id').val();
                     d.purchase_date = $('#purchase_date').val();
           }
        },
        "createdRow": function ( row, data, index ) {

            $table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });

            $('td', row).eq(7).html('<center><a target ="_blank"  href="<?php echo base_url();?>purchase/invoice/'+data['auto_invoice']+'"><i class="fa  fa-file iconFontSize-medium" ></i></a></center>');
            
            $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>Sale/edit/'+data['invoice_number']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['invoice_number']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a>');

        },

        "columns": [
            { "data": "sale_id", "orderable": true },
            { "data": "invoice_number", "orderable": false },
            { "data": "custname", "orderable": false },
            { "data": "sale_dat", "orderable": false },
            { "data": "prcount", "orderable": false },
            { "data": "net_total", "orderable": false },
            {
                "data": "sale_status",
                "render": function(data, type, row) {
                    if (data == 2) {
                        return'<button type="button" style="width:90px;" class="btn btn-danger">DRAFT</button>';
                    } else {
                        return'<button type="button" style="width:90px;" class="btn btn-success">SAVED</button>';
                    }
                }
            },
            { "data": "invoice_number", "orderable": false },
            { "data": "invoice_number", "orderable": false },
         ]

    });
function deleteRow() {
    $('DIV.product-item').each(function(index, item){
        jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
                $(item).remove();
                var counter = $('#counter').val();
                counter = counter - 1;
                $('#counter').val(counter);
                getNetTotal();
            }
        });
    });
}
function confirmDelete(invoice)
{
    var conf = confirm("Do you want to Delete This Sales ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deleteSale",
            data:{invoice:invoice},
            type:"POST",
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
