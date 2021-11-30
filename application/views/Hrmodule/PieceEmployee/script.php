<script>

  var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
  }
  $('#date').datepicker({
      autoclose: true,
      format: 'dd/mm/yyyy'
    });

  $table = $('#employee_table').DataTable( {
		"processing": true,
        "serverSide": true,
        "bDestroy" : true,
        "ajax": {
            "url": "<?php echo base_url();?>getPieceEmployee",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) { 
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(10).html('<center><a href="<?php echo base_url();?>editPieceRateEmployee/'+data['emp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            $('td', row).eq(2).html('<button class="btn btn-primary btn-sm" data-toggle="modal" onclick="Itemlistfun('+data['emp_id']+')" data-target="#myModal"><i class="fa fa-sitemap"></i></button>');
            $('td', row).eq(8).html('<center><a href="<?php echo base_url();?>PeiceRateInvoice/'+data['emp_id']+'"><i class="fa fa-clipboard iconFontSize-medium" ></i></a></center>');
            
        },

        "columns": [
            { "data": "emp_status", "orderable": true },
            { "data": "emp_name", "orderable": false },
            {
              "data": null,
              "defaultContent": ""
            },
			{ "data": "emp_pr_pay_total", "orderable": false },
            { "data": "emp_pr_pay_advance", "orderable": false },
            { "data": "emp_pr_net_bal", "orderable": false },
            { "data": "emp_pr_paid_amt", "orderable": false },
            { "data": "emp_pr_pay_balance", "orderable": false },
            {
              "data": null,
              "defaultContent": ""
            },
            { "data": "emp_pr_pay_date", "orderable": false },
			{ "data": "emp_id", "orderable": false }
        ]
        
    } );
   function confirmDelete(emp_pr_id){
    var conf = confirm("Do you want to Delete Piece Rate Employee Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>deletePeiceRateEmployee",
            data:{emp_pr_id:emp_pr_id},
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

   
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
	check();

});


var i=2;
$(".addmore").on('click',function(){
	count=$('table tr').length;
    var data="<tr><td><input type='checkbox'  class='case'/></td><td><span id='snum"+i+"'>"+count+".</span></td>";
    data +="<td><input type='text' class='form-control' id='pr_item_"+i+"' name='pr_item[]'/></td> <td><input type='text' class='form-control' id='pr_pcs_kg_"+i+"' name='pr_kg_pc[]'/></td><td><input type='text' class='form-control' id='pr_rate_"+i+"' onchange='calFun("+i+")' name='pr_rate[]'/></td><td><input type='text' onchange='totalFun("+i+")' class='form-control' id='tot_"+i+"' name='pr_total[]'/></td></tr>";
	$('table').append(data);
	i++;
});

function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}

function check(){
	obj=$('table tr').find('span');
	$.each( obj, function( key, value ) {
	id=value.id;
	$('#'+id).html(key+1);
	});
	}

//total calculation
function calFun(row)
{
  var peices = $('#pr_pcs_kg_'+row+'').val();
  var rate = $('#pr_rate_'+row+'').val();
  var multiply = parseFloat(peices) * parseFloat(rate);
  $('#tot_'+row+'').val(parseFloat(multiply));
   totalFun(row);
}
const total_calculation = [];
function totalFun(row)
{
  total_calculation.push(parseFloat($('#tot_'+row+'').val()));
  const sum_final =total_calculation.reduce((a,b) => a + b, 0);
  $('#emp_pr_total').val(sum_final);
  
}

function advanceFun()
{
  var advance = $('#emp_pr_adv').val();
  var total = $('#emp_pr_total').val();
  var advance_final = parseFloat(total) - parseFloat(advance);
  $('#emp_pr_net_bal').val(advance_final);
  
}

function paidFun()
{
  var paid = $('#emp_pr_pay_amt').val();
  var net_bal = $('#emp_pr_net_bal').val();
  var balance_amt = parseFloat(net_bal) - parseFloat(paid);
  $('#emp_pr_balance').val(balance_amt);
}

function Itemlistfun(emp_id)
{
    $.ajax({
            url:"<?php echo base_url();?>getItemLists",
            data:{emp_id:emp_id},
            method:"POST",
            datatype:"json",
            success:function(data){
                var list = $.parseJSON(data);
                var count = list.length;
               for(var i=0;i<=count-1;i++)
               {
                   var table = table + '<tr><td>'+list[i].emp_pr_item+'</td><td>'+list[i].emp_pr_kg_pcs+'</td><td>'+list[i].emp_pr_rate+'</td></tr>'
                   
                   
               }
                $('#lists1').html(table);
            }
        });
}

function showPDFSheet(){
    var pdf = new jsPDF('p', 'pt', 'letter');

pdf.cellInitialize();
pdf.setFontSize(8);
$.each( $('table tr'), function (i, row){
    $.each( $(row).find("td, th"), function(j, cell){
        var txt = $(cell).text().trim() || " ";
         //var width = (j==4) ? 40 : 70; //make 4th column smaller
        pdf.cell(10, 10, 83, 20, txt, i);
    });
});

pdf.save('sample-file.pdf');
}

</script>