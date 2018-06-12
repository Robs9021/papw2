$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});



$(document).ready(function(){
	
	
	//Registrar el usuario
	$('#edit').click(function(){
		//Leer todos los datos
		
		var user_password = $('input[name="password"]').val();
		
		if(user_password != "") {
				var formData = new FormData();
				formData.append('password', user_password);
				$.ajax({
					type:'POST',
					url: 'massUpdateProc',
					data: 	formData,
					processData:false,
					contentType:false,
					success:function(data){
						console.log(data);
					}
				});
			}
		else {
			alert("Llena todos los campos");
		}
		
	});
	
});