$(document).ready(function() {
	$('button#updateProfile').click( function(e) {
		e.preventDefault();

		$.post('/user/edit_profile', $('form#form-project').serialize(), function(data) {
				console.log(data);
				if (data.success) {
					$('#firstName').text(data.user_info.first_name);
					$('#lastName').text(data.user_info.last_name);
					// success notification
					$("#alertNotification").html('<div class="alert alert-info d-flex m-t-15">'+data.success+'</div>');
					window.setTimeout(function () {
					$(".alert").fadeTo(500, 0).slideUp(500, function () {
					  $(this).remove();
					});
					}, 2000);
				}
				else {
					var msg = '';
					console.log(data.errors);
					$.each(data.errors[0], function(index, item) {
					  msg += '<p class="mr-auto overflow-ellipsis no-padding" id="alerText">'+item+'</p>'
					});
					$("#alertNotification").html('<div class="alert alert-danger m-t-15">'+msg+'</div>');
				}
		});
		// .fail(function(response) {
		// 	// show error notifications
		// 	var msg = '';
		// 	console.log(response.responseJSON.errors);
		// 	$.each(response.responseJSON.errors, function(index, item) {
		// 		  msg += '<p class="mr-auto overflow-ellipsis no-padding" id="alerText">'+item+'</p>'
		// 		});
		// 	$("#alertNotification").html('<div class="alert alert-danger m-t-15">'+msg+'</div>');
		// 	});
	});

	$('input#uploadAvatar').on('change', function(e) {
		var	img = e.target.files[0];
		var token =  $('input[name="_token"]');
		var data = new FormData();
		data.append('image', img);
		data.append("_token", token.attr('value'));
		$.ajax({
			url: '/user/upload_avatar',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			success:function(response) {
				console.log(response);
				$('#avatar').attr("src", 'http://127.0.0.1:8000/'+response.image);
				$('#avatar').attr("data-src", 'http://127.0.0.1:8000/'+response.image);
				$('#avatar').attr("data-src-retina", 'http://127.0.0.1:8000/'+response.image);
				// success notification
				$("#alertNotification").html('<div class="alert alert-info d-flex m-t-15">Your avatar was updated.</div>');
				window.setTimeout(function () {
				$(".alert").fadeTo(500, 0).slideUp(500, function () {
				  $(this).remove();
				});
				}, 2000);
			}
		});
	});
});
