$(document).ready(function () {
	employees();	
	// Datatable Initialize End
	function employees (isdeleted = 0) {
		var table = $('#employees').DataTable({
	    	"rowCallback": function( row, data ) {
		    	if (data.isdeleted == 1) {
		    		$( row).find('td').css('background-color','#f3f3f3');
		    	}
			},
	    	"serverSide": true,
			//"stateSave": true,
			"paging": true,
	    	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	    	"dom": '<"top datatable-top"lf>rt<"bottom datatable-bottom"ip><"clear">',
	    	"order": [[ 0, "desc" ]],
			"pageLength": 10,	
			"ordering"   :false,
	        // "processing": true,
	        "ajax":{
		     	"url": base +"employee/employee_list",
		     	"dataType": "json",
		     	"type": "POST",
		     	"data": {isdeleted: isdeleted},
		    },
	    	"columns": [
				{ "data": "fullname" },
				{ "data": "email" },
				{ "data": "usercode" },
				{ "data": "designation" },
				{ "data": "dateofjoining" },
				{ "data": "Action" },
		    ]	 
	    });// Datatable Initialize End  	
	}

	$(document).on("click", ".isdeleted-btn", function () {
		var table = $('#employees').dataTable();
		table.fnDestroy();

		var isdeleted = parseInt($(this).data('isdeleted'));
		if (isdeleted == 1) {
			$(this).data('isdeleted', 0);
			// $(this).removeClass('btn-danger').addClass('btn-success');
			$(this).text('Activated Employees');
		} else {
			$(this).data('isdeleted', 1);
			// $(this).removeClass('btn-success').addClass('btn-danger');
			$(this).text('Deleted Employees');
		}
		employees(isdeleted);
	});

	$(document).on("click", "#deactivate", function () {
		var id = $(this).data('id');
		swal({
		    title: 'Alert...!',
		    text: 'Are you sure you want to deactivate this employee?',
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonText: 'Confirm',
		    cancelButtonText: 'Cancel',
		    closeOnConfirm: true,
		    closeOnCancel: true
		}, function (isConfirm) {
		    if (isConfirm) {
		    	$.ajax({
		    	    url: base +"employee/update_employee_isdeleted",
		    	    type: "POST",
		    	    data: {id: id, isdeleted: 1,},        
		    	    success: function(data) {
		    	        if (data.success) {

		    	            setTimeout(function() {
            			    	swal({ title: 'Alert...!', icon: 'success', text: 'Employee deactivated successfully!' });
		    	            	// swal('Alert...!', 'success', 'Employee deactivated successfully!');
            		    	}, 400);  
		    	        	$('#employees').dataTable().fnDestroy();
		    	            employees(0);

		    	        }
		    	    }
		    	});
		    	
		    }
		});
	});

	$(document).on("click", "#activate", function () {
		var id = $(this).data('id');
		swal({
		    title: 'Alert...!',
		    text: 'Are you sure you want to activate this employee?',
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonText: 'Confirm',
		    cancelButtonText: 'Cancel',
		    closeOnConfirm: true,
		    closeOnCancel: true
		}, function (isConfirm) {
		    if (isConfirm) {
		    	$.ajax({
		    	    url: base +"employee/update_employee_isdeleted",
		    	    type: "POST",
		    	    data: {id: id, isdeleted: 0,},        
		    	    success: function(data) {
		    	        if (data.success) {

		    	            setTimeout(function() {
            			    	swal({ title: 'Alert...!', icon: 'success', text: 'Employee activated successfully!' });
		    	            	// swal('Alert...!', 'success', 'Employee deactivated successfully!');
            		    	}, 400);  
		    	        	$('#employees').dataTable().fnDestroy();
		    	            employees(1);

		    	        }
		    	    }
		    	});
		    	
		    }
		});
	});
});	