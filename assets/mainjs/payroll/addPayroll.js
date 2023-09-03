$(document).ready(function() {

	$('.add-form').on('click', function (e){
		console.log('ddd');
		var check = checkValidation('#payroll-form');
		if(!check) {
			e.preventDefault();
		}
	});

	$('.salarymonth').datepicker( {
        format: "mm-yyyy",
	    startView: "months", 
	    minViewMode: "months",
	    autoclose: true
    });
})