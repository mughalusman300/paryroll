$(document).ready(function () {
	contactus();	
	// Datatable Initialize End
	function contactus () {
		var table = $('#contactus').DataTable({
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
		     	"url": base +"contactus/contactus_list",
		     	"dataType": "json",
		     	"type": "POST",
		    },
	    	"columns": [
				{ "data": "name" },
				{ "data": "subject" },
				{ "data": "message" },
				{ "data": "date" },
				{ "data": "Action" },
		    ]	 
	    });// Datatable Initialize End  	
	}

	$(document).on("click", "#delete", function () {
		var id = $(this).data('id');
		swal({
		    title: 'Alert...!',
		    text: 'Are you sure you want to delete this?',
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonText: 'Confirm',
		    cancelButtonText: 'Cancel',
		    closeOnConfirm: true,
		    closeOnCancel: true
		}, function (isConfirm) {
		    if (isConfirm) {
		    	$.ajax({
		    	    url: base +"contactus/delete",
		    	    type: "POST",
		    	    data: {id: id},        
		    	    success: function(data) {
		    	        if (data.success) {

		    	            setTimeout(function() {
            			    	swal({ title: 'Alert...!', icon: 'success', text: 'Deleted successfully!' });
		    	            	// swal('Alert...!', 'success', 'Employee deactivated successfully!');
            		    	}, 400);  
		    	        	$('#contactus').dataTable().fnDestroy();
		    	            contactus();

		    	        }
		    	    }
		    	});
		    	
		    }
		});
	});
});	