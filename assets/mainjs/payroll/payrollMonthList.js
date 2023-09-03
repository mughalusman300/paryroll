$(document).ready(function () {
	var isdeleted = 0;
	var month = '';
	payrollMonth(isdeleted, month);	
	// Datatable Initialize End
	function payrollMonth (isdeleted, month) {
		var table = $('#payroll_month').DataTable({
	    	"serverSide": true,
			//"stateSave": true,
			"paging": true,
	    	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	    	"dom": '<"top datatable-top"lf>rt<"bottom datatable-bottom"ip><"clear">',
	    	"order": [[ 0, "desc" ]],
			"pageLength": 10,	
			"ordering"   :false,
			"searching"  :true,
	        // "processing": true,
	        "ajax":{
		     	"url": base +"payroll/payroll_month_list",
		     	"dataType": "json",
		     	"type": "POST",
		     	"data": {isdeleted: isdeleted, month: month},
		    },
	    	"columns": [
				{ "data": "filename" },
				{ "data": "salarymonth" },
				{ "data": "date" },
				{ "data": "Action" },
		    ]	 
	    });// Datatable Initialize End  	
	}

	$('.month').datepicker( {

        format: "mm-yyyy",
	    startView: "months", 
	    minViewMode: "months",
	    autoclose: true

    });
	    
	$(document).on("change", ".month", function () {
		var table = $('#payroll_month').dataTable();
		table.fnDestroy();

		var month = $(this).val();
		payrollMonth(isdeleted, month);	
	});

	$(document).on("click", ".isdeleted-btn", function () {
		var month = $(this).val();
		var table = $('#payroll_month').dataTable();
		table.fnDestroy();

		isdeleted = parseInt($(this).data('isdeleted'));
		if (isdeleted == 1) {
			$(this).data('isdeleted', 0);
			$(this).text('Activated Payrolls');
		} else {
			$(this).data('isdeleted', 1);
			$(this).text('Deleted Payrolls');
		}
		payrollMonth(isdeleted, month);
	});

	$(document).on("click", "#deactivate", function () {
		var id = $(this).data('id');
		var month = $(this).val();
		swal({
		    title: 'Alert...!',
		    text: 'Are you sure you want to deactivate this payroll?',
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonText: 'Confirm',
		    cancelButtonText: 'Cancel',
		    closeOnConfirm: true,
		    closeOnCancel: true
		}, function (isConfirm) {
		    if (isConfirm) {
		    	$.ajax({
		    	    url: base +"payroll/update_payroll_isdeleted",
		    	    type: "POST",
		    	    data: {id: id, isdeleted: 1,},        
		    	    success: function(data) {
		    	        if (data.success) {

		    	            setTimeout(function() {
            			    	swal({ title: 'Alert...!', icon: 'success', text: 'Payroll deactivated successfully!' });
		    	            	// swal('Alert...!', 'success', 'Employee deactivated successfully!');
            		    	}, 400);  
		    	        	$('#payroll_month').dataTable().fnDestroy();
		    	            payrollMonth(0, month);

		    	        }
		    	    }
		    	});
		    	
		    }
		});
	});

	$(document).on("click", "#activate", function () {
		var id = $(this).data('id');
		var month = $(this).val();
		swal({
		    title: 'Alert...!',
		    text: 'Are you sure you want to activate this payroll?',
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonText: 'Confirm',
		    cancelButtonText: 'Cancel',
		    closeOnConfirm: true,
		    closeOnCancel: true
		}, function (isConfirm) {
		    if (isConfirm) {
		    	$.ajax({
		    	    url: base +"payroll/update_payroll_isdeleted",
		    	    type: "POST",
		    	    data: {id: id, isdeleted: 0,},        
		    	    success: function(data) {
		    	        if (data.success) {

		    	            setTimeout(function() {
            			    	swal({ title: 'Alert...!', icon: 'success', text: 'Payroll activated successfully!' });
		    	            	// swal('Alert...!', 'success', 'Employee deactivated successfully!');
            		    	}, 400);  
		    	        	$('#payroll_month').dataTable().fnDestroy();
		    	            payrollMonth(1,month);

		    	        }
		    	    }
		    	});
		    	
		    }
		});
	});
});	