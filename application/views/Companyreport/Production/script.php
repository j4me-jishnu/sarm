<script>

var response = $("#response").val();
  if(response){
      console.log(response,'response');
      var options = $.parseJSON(response);
      noty(options);
      }

  $(function () {
		
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    

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

    $table = $('#raw_material').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
		"searching":false,
		"processing": true,
		
        "ajax": {
            "url": "<?php echo base_url();?>GetcmpProductionReportRM",
            "type": "POST",
            "data" : function (d) {
            d.start_date = $('#pmsDateStart').val();
			d.end_date = $('#pmsDateEnd').val();
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table.column(0).nodes().each(function(node,index,dt){
            $table.cell(node).data(index+1);
            });
		},

        "columns": [
            { "data": "production_status", "orderable": true },
			{ "data": "cmp_name", "orderable": false },
			{ "data": "area_name", "orderable": false },
			{ "data": "product_code", "orderable": false },
			{ "data": "product_name", "orderable": false },
            { "data": "used_quantity", "orderable": false },
			{ "data": "date", "orderable": false },	
			
        ]
        
    });

	$table2 = $('#output_product').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
		"searching":false,
		"processing": true,
		// dom: 'lBfrtip',
        "ajax": {
            "url": "<?php echo base_url();?>GetcmpProductionReportOP",
            "type": "POST",
            "data" : function (d) {
            d.start_date = $('#pmsDateStart').val();
			d.end_date = $('#pmsDateEnd').val();
           }
        },
        "createdRow": function ( row, data, index ) {
          
			$table2.column(0).nodes().each(function(node,index,dt){
            $table2.cell(node).data(index+1);
            });
		},

        "columns": [
            { "data": "production_status", "orderable": true },
			{ "data": "cmp_name", "orderable": false },
			{ "data": "area_name", "orderable": false },
			{ "data": "product_code", "orderable": false },
			{ "data": "product_name", "orderable": false },
            { "data": "produced_quantity", "orderable": false },
			{ "data": "date", "orderable": false },	
			
        ]
        
    });

  });
  $(document).on('click','#search',function(){
		$table.ajax.reload();
 });


 function showTableData() {
        var myTab = document.getElementById('raw_material');
		var myboy = document.getElementById('output_product');

		newWin= window.open("");
   		newWin.document.write(myTab.outerHTML);
   		newWin.document.write(myboy.outerHTML);   
   		newWin.print();
   		newWin.close();
    }

function showExcelSheet(){
    var html = document.querySelector('table').outerHTML;
    export_table_to_csv(html, "table.csv");
}

function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    // Lanzamos
    downloadLink.click();
}

function export_table_to_csv(html, filename) {
	var csv = [];
	var rows = document.querySelectorAll("table tr");
	
    for (var i = 0; i < rows.length; i++) {
		var row = [], cols = rows[i].querySelectorAll("td, th");
		
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
		csv.push(row.join(","));		
	}

    // Download CSV
    download_csv(csv.join("\n"), filename);
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