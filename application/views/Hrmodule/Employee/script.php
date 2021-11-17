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
            "url": "<?php echo base_url();?>getEmployee",
            "type": "POST",
            "data" : function (d) {
            
           }
        },
        "createdRow": function ( row, data, index ) { 
          
          // console.log(data);
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
			$('td', row).eq(10).html('<center><a href="<?php echo base_url();?>Employee/edit/'+data['emp_id']+'"><i class="fa fa-edit iconFontSize-medium" ></i></a>&nbsp;&nbsp;&nbsp;<a onclick="return confirmDelete('+data['emp_id']+')"><i class="fa fa-trash-o iconFontSize-medium" ></i></a></center>');
            
		},

        "columns": [
            { "data": "emp_status", "orderable": true },
            { "data": "cmp_name", "orderable": false },
            { "data": "emp_name", "orderable": false },
            { "data": "emp_address", "orderable": false },
            { "data": "emp_phone", "orderable": false },
			{ "data": "emp_email", "orderable": false },
            {
            data: 'emp_mode',
            "className": "text-center",
            render: function (data, type, row) {
                if (data == '0') {
                    return 'Wages';
                }else if(data == '1'){
                    return 'Salary';
                }
                else if(data == '2'){
                    return 'Piece Rate';
                }
                }
            }, 
            { "data": "emp_salary", "orderable": false },
            {
            data: 'emp_act_status',
            render: function (data, type, row) {
                if(data == 0){
                        return '<i class="fa fa-toggle-on" style="color:green;font-size:30px;"></i>';
                    }
                    else{
                        return '<i class="fa fa-toggle-off" style="color:red;font-size:30px;"></i>';    
                    } 
                }
            }, 

            { "data": "emp_date", "orderable": false },
			{ "data": "emp_id", "orderable": false }
        ]
        
    } );
   function confirmDelete(emp_id){
    var conf = confirm("Do you want to Delete Employee Details ?");
    if(conf){
        $.ajax({
            url:"<?php echo base_url();?>Employee/delete",
            data:{emp_id:emp_id},
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
    function peiceRateCheck() {
        if (document.getElementById('piece_rate1').checked) {
           document.getElementById('pr_table').style.display = 'block';
           document.getElementById('basic_salary').style.display = 'none';
        } 
    }
    function WagesCheck() {
        if (document.getElementById('wages_rate1').checked) {
           document.getElementById('pr_table').style.display = 'none';
           document.getElementById('basic_salary').style.display = 'block';
        } 
    }
    function SalaryCheck() {
        if (document.getElementById('salary_rate1').checked) {
           document.getElementById('pr_table').style.display = 'none';
           document.getElementById('basic_salary').style.display = 'block';
        } 
    }

function addRow() {
  var table = document.getElementById("subscriptionTable");
  var rowCount = table.rows.length;
  var row = table.insertRow(rowCount);
  var cell1 = row.insertCell(0);
  var element1 = document.createElement("input");
  element1.type = "checkbox";
  element1.name = "chkbox[]";
  cell1.appendChild(element1);

  var cell2 = row.insertCell(1);

  var cell3 = row.insertCell(2);
  var element2 = document.createElement("input");
  element2.type = "text";
  element2.name = "pr_item[]";
  cell3.appendChild(element2);

  var cell4 = row.insertCell(3);
  var element3 = document.createElement("input");
  element3.type = "text";
  element3.name = "pr_kg_pc[]";
  cell4.appendChild(element3);

  var cell5 = row.insertCell(4);
  var element4 = document.createElement("input");
  element4.type = "text";
  element4.name = "pr_rate[]";
  cell5.appendChild(element4);

  cell2.innerHTML = rowCount;
}


function deleteRow(tableID) {
  try {
    var table = document.getElementById("subscriptionTable");
    var rowCount = table.rows.length;

    for (var i = 0; i < rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[0].childNodes[0];
      if (null != chkbox && true == chkbox.checked) {
        table.deleteRow(i);
        rowCount--;
        i--;
      }
    }
  } catch (e) {
    alert(e);
  }
}

// function PeiceRateFun()
// {
//     $.ajax({
//             url:"<?php echo base_url();?>peiceRateajax",
//             method:"POST",
//             datatype:"json",
//             success:function(data){
//                 var select = '<option>SELECT</option>';
//                 data = JSON.parse(data);
//                 $.each(data, function(i,datas) {
//                     select += '<option value="'+datas.emp_id+'">'+datas.emp_name+'</option>';
//                 });
//                 $('#exampleFormControlSelect1').html(select);
//             }
//         });

// }

// $(document).on('change',function(){
//   var emp_id = $('#exampleFormControlSelect1').val();
//   var table ='';
//   var plus =1;
//   $.ajax({
//       url:"<?php echo base_url() ?>itemsTableAjax",
//       method:"POST",
//       datatype:"json",
//       data:{emp_id:emp_id},
//       success:function(data){
//           data = JSON.parse(data);
//           $.each(data,function(i,datap){
//               table += '<tr id="count_'+plus+'"><td>'+datap.emp_pr_item+'</td><td>'+datap.emp_pr_kg_pcs+'</td><td>'+datap.emp_pr_rate+'</td></tr>'
//               plus++;
//           })
          
//           $('#pr_tables').html(table);
//       }
//   })
// })
  
// $(document).on('change','#exampleFormControlSelect1',function(){
    
// })  
</script>