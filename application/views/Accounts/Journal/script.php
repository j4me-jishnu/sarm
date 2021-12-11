<script>
	$('.ledgerhead').select2();

	function addMore() 
	{
		var count=$('#counter').val();
		var counter = parseFloat(count) + 1;
	
		$.ajax({
            url:"<?php echo base_url();?>getLedgerHeadlist",
            type:'POST',
            dataType:"json",
            success:function(data){
            	var html = '<option></option>';
                var code = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].ledgerhead_id+'>'+data[i].ledger_head+'</option>';
                    }
                    $('#ledgerhead_'+counter+'').html(html);
                    $('#ledgerhead_'+counter+'').select2();
                    $('#ledgerhead_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                    $('#toledgerhead_'+counter+'').html(html);
                    $('#toledgerhead_'+counter+'').select2();
                    $('#toledgerhead_'+counter+' option:first').before('<option value="" selected>----Please Select---</option>');
                }
            });
		
		// var htmlVal='<DIV class="box box-primary product-item"><div class="row"><div class="col-md-3"><input type="checkbox" name="item_index[]"/><select class="form-control" name="ledgerhead[]" id="ledgerhead_'+counter+'"></select><label>To</label><br><select  class="form-control" name="toledgerhead[]" id="toledgerhead_'+counter+'"></select></div><div class="col-md-2"><label></label><input type="text" name="debit[]" id="debit_'+counter+'" class="form-control"><label> &nbsp;&nbsp;</label><input type="text" name="todebit[]" id="todebit_'+counter+'" class="form-control"></div><div class="col-md-2"><label></label><input type="text" name="credit[]" id="credit_'+counter+'" class="form-control"><label> &nbsp;&nbsp;</label><input type="text" name="tocredit[]" id="tocredit_'+counter+'" class="form-control"></div><div class="col-md-4"><label></label><textarea class="form-control" rows="4" name="narr[]" id="narr_'+counter+'"></textarea></div></div></div>';
        var htmlVal = '<div class="row"><div class="col-md-3"><label></label><select class="form-control ledgerhead" name="ledgerhead[]" id="ledgerhead_'+counter+'"></select></div><div class="col-md-2"><label></label><input type="text" name="debit[]" id="debit_'+counter+'" class="form-control"></div><div class="col-md-2"><label></label><input type="text" name="credit[]" id="credit_'+counter+'" class="form-control"></div><div class="col-md-4"><label></label><textarea class="form-control"  name="narr[]" id="narr_'+counter+'"></textarea></div></div>'
		$(".product-item").append(htmlVal);
		$('#counter').val(counter);

	}
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
	$('#journal_date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
      
	});
	var response = $("#response").val();
  	if(response)
  	{
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
    }
    $table = $('#journal').DataTable( {
        "processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "searching" : false,
        "ajax": {
            "url": "<?php echo base_url();?>getJournallist",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
            $('td', row).eq(7).html('<center><a href="<?php echo base_url();?>Journal/edit/'+data['journal_inv']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['journal_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            $('td', row).eq(5).html('<center><button type="button" id="journalist" class="btn btn-primary journalist" data-toggle="modal" data-target="#myModal" onclick="Journalist(this.value)" value="'+data['journal_inv']+'"><i class="fa fa-print"></i></button></center>');
            
        },

        "columns": [
                { "data": "journal_status", "orderable": true },
                { "data": "journal_date", "orderable": false },
                { "data": "ledger_heads", "orderable": false },
                { "data": "journal_inv", "orderable": false },
                { "data": "narration", "orderable": false },
                { "data": "journal_status", "orderable": true },
                { "data": "amount", "orderable": false },
                { "data": "journal_status", "orderable": false }
        ]
        
    });
    function confirmDelete(journal_id)
	{
	    var conf = confirm("Do you want to Delete  ?");
	    if(conf){
	        $.ajax({
	            url:"<?php echo base_url();?>deleteJournal",
	            data:{journal_id:journal_id},
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

// function voucher2(){
// let button = document.getElementById('hello2');
//    var journal_id = '';
//     journal_id = journal_inv;
//     $.ajax({
//             url:"<?php echo base_url();?>JournalVoucher",
//             type: 'POST',
//             data:{journal_id:journal_id},
//             dataType: 'json',
//             success:
//             function(data){
//                 console.log(data);
//             }
//         });
//     }
function Journalist(id){
    var list;
	var journal_inv;
    journal_inv = id;
    $.ajax({
            url:"<?php echo base_url();?>JournalVoucher",
            type: 'POST',
            data:{journal_inv:journal_inv},
            dataType: 'json',
            cache: false,
            success:
            function(data){
              for(var i=0;i<data.records.length;i++){
                  console.log(data.records[i]);
                  $('#company3').text(data.records[0].cmp_name);
                  $('#date3').text(data.records[0].journal_date);
                  $('#note3').text(data.records[0].note);
                  $('#journal3').text(data.records[0].journal_inv);
                  //list += '<tr><td>'+data.records[i].ledger_head+'</td><td>'+data.records[i].debit_amt+'</td><td>'+data.records[i].credit_amt+'</td><td>'+data.records[i].narration+'</td></tr>';
                  list='<tr><td colspan="4">Recieved with thanks from <b>'+data.records[0].ledger_head+'</b> the sum of Rs.('+data.records[0].debit_amt+')/- being cash/cheque</td></tr>';
                  list2='<tr><td colspan="4"><hr>Cashier:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager:</td></tr>';
              }
              $('#table_voucher').append(list);
              $('#table_voucher').append(list2);
            }
        });
    
    }  
 function printData()
{
   var divToPrint=document.getElementById("table_voucher");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close(); 
}

$('#printer').on('click',function(){
printData();
})
$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
});
</script>