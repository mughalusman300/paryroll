$(document).ready(function () {
	$('.add-form').on('click', function (e){
		var check = checkValidation('#employee-form');
		if(!check) {
			e.preventDefault();
		}
	});
})