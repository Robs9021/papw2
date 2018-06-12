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
	

	//Si hay sesión iniciada
	if(localStorage.getItem('userType') == 1)
	{
		$('img.avatar-pic').attr('src', localStorage.getItem('userImage'));
		$('div.name').text(localStorage.getItem('username'));
		$('#logout').removeClass('hidden');
		$('#menu').removeClass('hidden');
	}
	else
	{
		window.location.href = 'alogin';
	}
	//Cerrar sesión
	$('#logout').click(function(){
		localStorage.clear();
		window.location.href = 'alogin';
	});

	//LLenar el select de empresas
	$.get("checkEmpresas", function(response){
		response.forEach(empresa);
	});

	function empresa (item){
		var optionEmpresa = new Option();
		optionEmpresa.value = item.id;
		optionEmpresa.innerHTML = item.companyName;
		$('#empresas').append(optionEmpresa);
	}

	$('#empresas').change(function (){
		//Revisar si se registra el cambio de empresa
		console.log($('#empresas').val());
	});

	//Registrar el usuario
	var imgSrc = "";
	$('#register').click(function(){
		//Leer todos los datos
		var user_type = $('input:radio[name="user-type"]:checked').val();
		var user_name = $('input[name="name"]').val();
		var user_lastname = $('input[name="last-name"]').val();
		var user_email = $('input[name="signup-email"]').val();
		var user_password = $('input[name="signup-password"]').val();
		var user_company = $('#empresas').val();
		//console.log(imageFile.files[0]);

		//$('h2').after('<img src="' + imgSrc + '" alt="ejemplo">');

		//Expresion regular para revisar el correo
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		//validaciones
		if(user_type != undefined &&
			user_name != "" && user_lastname != "" &&
			user_email != "" &&
			user_password != "" &&
			user_company != 0 &&
			imgSrc != "") {

			if(regex.test(user_email)){
				console.log(user_name);
				var formData = new FormData();
				formData.append('type', user_type);
				formData.append('name', user_name);
				formData.append('lastName', user_lastname);
				formData.append('email', user_email);
				formData.append('password', user_password);
				formData.append('image', imgSrc);
				formData.append('company', user_company);
				formData.append('creator', 1);
				$.ajax({
					type:'POST',
					url: 'store',
					data: 	formData,
					processData:false,
					contentType:false,
					success:function(data){
						console.log(data);
					}
				});
			}
			else {
				alert("Incluye Email válido");
			}
			// console.log(user_type);
			// console.log(user_name);
			// console.log(user_lastname);
			// console.log(user_email);
			// console.log(user_password);
			// console.log(user_company);
			// console.log(imgSrc);

		}

		else {
			alert("Llena todos los campos");
		}
		
	});
	//Leer la imagen
	$('#imageFile').change(function(){
	    var file = imageFile.files[0];

	    if(file.size > 2097152) {
	        alert('sube una imagen menos pesada o con formato correcto');
	        return;
	    }

	    var reader = new FileReader();

	    reader.onload = function () {
	        imgSrc = reader.result;

	    }

	    if (file) {
	        reader.readAsDataURL(file);
	    }
	});

	//Agregar empresa
	$('#addCompany').click(function(){
		var companyName = $('#company').val();
		if(companyName != ""){
			console.log(companyName);
			var companyData = new FormData();
			companyData.append('name', companyName);
			$.ajax({
					type:'POST',
					url: 'addCompany',
					data: 	companyData,
					processData:false,
					contentType:false,
					success:function(response){
						console.log(response);
						var optionEmpresa = new Option();
						optionEmpresa.value = response.id;
						optionEmpresa.innerHTML = response.name;
						optionEmpresa.selected = true;
						$('#empresas').append(optionEmpresa);
					}
			});
		}
		else{
			alert('Pon un nombre de empresa');
		}
	});
	//Editar datos del admin
	$('#avatar').click(function(){
		sessionStorage.searchId = localStorage.userId;
		window.location.href = 'aedit';
	});
});