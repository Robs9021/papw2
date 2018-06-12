$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	$('#ilogin').click(function(){
		//Leer datos
		var email = $('input[name="iemail"]').val();
		var password = $('input[name="ipassword"]').val();
		
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
					url: 'iLogin',
					data: loginData,
					processData: false,
					contentType: false,
					success:function(response){
						if(response === "usuario o password incorrectos"){
							console.log(response);
							console.log("ERROR");
						}
						else 
						{
							localStorage.setItem('userId', response[0].id);
							localStorage.setItem('username', response[0].name);
							localStorage.setItem('userImage', response[0].image);
							localStorage.setItem('userCompany', response[0].empresa_id);
							localStorage.setItem('userType', 2);
							console.log(response);
						}
						
						window.location.href = 'ihome';
						//console.log(response);
						//console.log("Inicio");
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