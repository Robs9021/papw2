$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	//Si hay sesión iniciada
	if(localStorage.getItem('userType') == 2)
	{
		$('img.avatar-pic').attr('src', localStorage.getItem('userImage'));
		$('div.name').text(localStorage.getItem('username'));
		$('#logout').removeClass('hidden');
		$('#menu').removeClass('hidden');
	}
	else
	{
		window.location.href = 'new';
	}

	//Cerrar sesión
	$('#logout').click(function(){
		localStorage.clear();
		window.location.href = 'new';
	});

	//Opcion agregar curso
	$('.addCourse').click(function() {
		window.location.href = 'iaddcourse';
	});
});