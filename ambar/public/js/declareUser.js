$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function(){
	$.get("checkEmpresas", function(response){
	console.log(response);
	});

	// $.ajax({
	// 		type:'GET',
	// 		url: 'checkEmpresas',
	// 		processData:false,
	// 		contentType:false,
	// 		success:function(data){
	// 			console.log(data);
	// 		}
	// 	});

	var imgSrc = "";
	$('#register').click(function(){
		var user_type = $('input[name="user-type"]').val();
		var user_name = $('input[name="name"]').val();
		var user_lastname = $('input[name="last-name"]').val();
		var user_email = $('input[name="signup-email"]').val();
		var user_password = $('input[name="signup-password"]').val();
		//console.log(imageFile.files[0]);

		//$('h2').after('<img src="' + imgSrc + '" alt="ejemplo">');
		
		$.ajax({
			type:'POST',
			url: 'store',
			data: 	{
						type:user_type,
						name:user_name,
						lastName:user_lastname,
						email:user_email,
						password:user_password,
						image:imgSrc
					},
			processData:false,
			contentType:false,
			success:function(data){
				console.log(data);
			}
		});
		
		// $.post('store', {
		// 	type:user_type,
		// 	name:user_name,
		// 	lastName:user_lastname,
		// 	email:user_email,
		// 	password:user_password,
		// 	image:file
		// }, function(data){
		// 	console.log(data);
		// });
	});
	$('#imageFile').change(function(){
	    file = imageFile.files[0];

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
});