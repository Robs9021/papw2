$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

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
					$('#editAvatar').attr('src', response[0].image);
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
});