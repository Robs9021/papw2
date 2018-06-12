$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

var imgSrc = "";

function searchUserById(id) {
	var searchData = new FormData();
	searchData.append('searchById', sessionStorage.searchId);
	$.ajax({
		type:'POST',
		url: 'searchUserById',
		data: 	searchData,
		processData:false,
		contentType:false,
		success:function(response) {
			if(response != "") {
				if(sessionStorage.searchId == response[0].id) {
					console.log(response);
					$('input:radio[value="'+ response[0].type +'"]').attr('checked', true);
					$('input[name="name"]').val(response[0].name);
					$('input[name="last-name"]').val(response[0].lastName);
					$('input[name="email"]').val(response[0].email);
					imgSrc = response[0].image;
					$('#editAvatar').attr('src', imgSrc);
					//$('option[value="'+ response[0].empresa_id +'"]').attr('selected', true);
					$('#empresas').val(response[0].empresa_id);
				}
				else {
					//window.location.href = "declareUser";
					console.log('hubo error' + response[0].id);
				}
			}
			else {
				window.location.href = "asearch";
			}
		}
	});
}

$(document).ready(function(){
	//Revisar sesión
	if(localStorage.getItem('userType') == 1)
	{
		$('img#avatar').attr('src', localStorage.getItem('userImage'));
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
		//Buscar usuario por ID
		if(sessionStorage.searchId != "" && sessionStorage.searchId != undefined) {
			searchUserById(sessionStorage.searchId);
		}
	});

	function empresa (item){
		var optionEmpresa = new Option();
		optionEmpresa.value = item.id;
		optionEmpresa.innerHTML = item.companyName;
		$('#empresas').append(optionEmpresa);
	}
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
						optionEmpresa.innerHTML = response.companyName;
						optionEmpresa.selected = true;
						$('#empresas').append(optionEmpresa);
					}
			});
		}
		else{
			alert('Pon un nombre de empresa');
		}
	});

	//Registrar el usuario
	$('#edit').click(function(){
		//Leer todos los datos
		var user_type = $('input:radio[name="user-type"]:checked').val();
		var user_name = $('input[name="name"]').val();
		var user_lastname = $('input[name="last-name"]').val();
		var user_email = $('input[name="email"]').val();
		var user_password = $('input[name="password"]').val();
		var user_company = $('#empresas').val();

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
				//console.log(user_name);
				var formData = new FormData();
				formData.append('type', user_type);
				formData.append('name', user_name);
				formData.append('lastName', user_lastname);
				formData.append('email', user_email);
				formData.append('password', user_password);
				formData.append('image', imgSrc);
				formData.append('company', user_company);
				$.ajax({
					type:'POST',
					url: 'update/' + sessionStorage.searchId,
					data: 	formData,
					processData:false,
					contentType:false,
					success:function(data){
						console.log(data);
						window.location.href = "asearch";
					}
				});
			}
			else {
				alert("Incluye Email válido");
			}
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
	//delete
	$('#delete').click(function(){
		if(confirm('¿Estás seguro de eliminar el usuario')) {
			//var searchData = new FormData();
			//searchData.append('searchById', sessionStorage.searchId);
			//Es seguro eliminar así???
			$.ajax({
				type:'POST',
				url: 'deleteUser/' + sessionStorage.searchId,
				data: 	'',
				processData:false,
				contentType:false,
				success:function(response) {
					if(response != "") {
						console.log(response);
					}
					else {
						window.location.href = "asearch";
					}
				}
			});
		}
	});
});