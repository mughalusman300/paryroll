$(document).ready(function () {
	var month = '';
	var search = "";
	payroll(month,search);	
	// Datatable Initialize End
	var table = '';
	function payroll (month, search) {
		table = $('#payroll').dataTable({
	    	"serverSide": true,

			//"stateSave": true,
			"paging": true,
	    	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	    	"dom": '<"top datatable-top"lf>rt<"bottom datatable-bottom"ip><"clear">',
	    	"order": [[ 0, "desc" ]],
			"pageLength": 10,	
			"ordering"   :false,
			"searching" : true,
	        "processing": true,
	        "language": 
	        {          
	        "processing": "<i class='fa fa-spinner'></i>",
	        },
	        "ajax":{
		     	"url": base +"payroll/payroll_list",
		     	"dataType": "json",
		     	"type": "POST",
		     	"data": {month: month, search: search},
		    },
	    	"columns": [
				{ "data": "employeecode" },
				{ "data": "salarymonth" },
				{ "data": "workingdays" },
				{ "data": "grosssalary" },
				{ "data": "basicsalary" },
				{ "data": "totalexpense" },
				{ "data": "netsalary" },
				{ "data": "Action" },
		    ]	 
	    });// Datatable Initialize End
	    $('#payroll_filter input').unbind();  	
	}

	$('.month').datepicker( {
        format: "mm-yyyy",
	    startView: "months", 
	    minViewMode: "months",
	    autoclose: true
    });

	$(document).on("change", ".month", function () {
		var month = $(this).val();
		var search = $('#payroll_filter input').val();
		var table = $('#payroll').dataTable();
		table.fnDestroy();

		payroll(month,search);	

		$('#payroll_filter input').val(search);
	});

	$(document).on("keydown", ".month", function (e) {
			console.log(e.keyCode);
		var search = $('#payroll_filter input').val();

		if (e.keyCode == 8) {
			e.preventDefault();						
			$('.month').val("").datepicker("update");
			var table = $('#payroll').dataTable();
			table.fnDestroy();
			payroll('',search);	
			$('#payroll_filter input').val(search);


		}
	});

	$('#payroll_filter input').unbind();
	$(document).on( 'keyup', '#payroll_filter input', function(e){
		var month = $('.month').val();
		var search = $(this).val();
		if (e.keyCode == 13 || (e.keyCode == 8 && search == "")) {
			var table = $('#payroll').dataTable();
			table.fnDestroy();
			payroll(month,search);	
			$('#payroll_filter input').val(search);
		}
	});
});	