$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function(){

	//Cambio de tamaño
	// $(window).on('resize', function(){
	// 	if ($(window).width() <= 400) { 
	// 	    $('div.navbar-header a.navbar-brand').removeClass('navbar-brand');
	// 	    $('div.navbar-header a img').addClass('logo');
	// 	}
	// 	if ($(window).width() >= 400) { 
	// 	    $('div.navbar-header a').addClass('navbar-brand');
	// 	    $('div.navbar-header a img').removeClass('logo');
	// 	}
	// });

	$('#login').click(function(){
		//Leer datos
		var email = $('input[name="login-email"]').val();
		var password = $('input[name="login-password"]').val();
		
		//validar
		//Expresion regular para revisar el correo
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(email != "" &&
			password != ""){
			var loginData = new FormData();
			loginData.append('email', email);
			loginData.append('password', password);
			if(regex.test(email)){
				$.ajax({
					type: 'POST',
					url: 'adminLogin',
					data: loginData,
					processData: false,
					contentType: false,
					success:function(response){
						localStorage.setItem('userId', response[0].id);
						localStorage.setItem('username', response[0].name);
						localStorage.setItem('userImage', response[0].image);
						localStorage.setItem('userCompany', response[0].empresa_id);
						localStorage.setItem('userType', 1);

						window.location.href = 'declareUser';
					}
				});
			}
			else {
				alert("correo no válido");
			}
		}
		else {
			alert("Llena los campos");
		}
	});
});