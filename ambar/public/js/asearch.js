$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
var bandera = true;
function searchAnother(searchText, count) {
	var searchData = new FormData();
	searchData.append('searchText', searchText);
	searchData.append('lastId', sessionStorage.searchId);
	$.ajax({
		type:'POST',
		url: 'searchUser',
		data: 	searchData,
		processData:false,
		contentType:false,
		success:function(response){
			if(response != ""){
				if(sessionStorage.searchId != response.id)
				{
					console.log(response);
					sessionStorage.searchId = response.id;
					var item = '<div class="col-md-4 pall"><div class="bg-secondary pall"><img class="avatar-pic img-circle results" src="' + 
					response.image +
					'"><h2>' + 
					response.name +
					'</h2><p>' +
					response.companyName +
					'</p><p><a href="#" class="edit" userid="' +
					response.id +
					'"><span class="glyphicon glyphicon-edit btn-icon"></span></a></p></div></div>';
					$('#catalogArea').append(item);
					if(count < 3)
					{
						count++;
						searchAnother(searchText, count);
					}
				}
				
				bandera = true;
			}
		}
	});
}

$(document).ready(function(){
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
	sessionStorage.searchId = 0;
	$('#btnSearchUser').click(function(){
		var searchText = $('#search').val();
		if(searchText != ""){
			searchAnother(searchText, 1);
		}
	});
	$(window).scroll(function(){
		var searchText = $('#search').val();
		if(searchText != "" && bandera){
			bandera = false;
			searchAnother(searchText, 1);
		}
	});

	//editar
	$('body').on('click','.edit', function(event){
		event.preventDefault();
		//console.log("click");
		sessionStorage.searchId = $(this).attr('userid');
		window.location.href = 'aedit';
		//console.log($(this).attr('userid'));
	});
});