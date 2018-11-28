$(document).ready(function() {
	$('#loader').hide();
	$('button#updateProfile').click( function(e){
		e.preventDefault();

		$('#loader').show();
		$.post('/user/edit_profile', $('form#form-project').serialize(), function(data) {
				console.log(data);
				$('#firstName').text(data.user_info.first_name);
				$('#lastName').text(data.user_info.last_name);
				$('#loader').hide();
		});
	});

	$('input#uploadAvatar').on('change', function(e){
		var	img = e.target.files[0];
		var token =  $('input[name="_token"]');
		// console.log(img);
		var data = new FormData();
		data.append('image', img);
		data.append("_token", token.attr('value'));
		$('#loader').show();
		$.ajax({
			url: '/user/upload_avatar',
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			success:function(response) {
				console.log(response);
				$('#avatar').attr("src", response.image);
				$('#loader').hide();
			}
		});
	});
});
















// // ------------------------------------------------------ //
// // CUSTOM FILE INPUTS FOR IMAGES
// // Custom file inputs with image preview and 
// // image file name on selection.
// // ------------------------------------------------------ //
// // console.log(userPhoto);
// $(document).ready(function() {
// 	$('input[type="file"]').each(function(){
// 		var $file = $(this),
// 			$label = $file.next('label'),
// 			// $labelCloseLink = $label.find('a'),
// 			$labelText = $label.find('span'),
// 			labelDefault = $labelText.text();
// 		if (userPhoto) {
// 			$label
// 				.addClass('file-ok')
// 				.css('background-image', 'url(' + userPhoto + ')');
// 			// $labelCloseLink.css('display', 'block');
// 			// $file.prop('disabled', true);
// 		}
// 		// When a new file is selected
// 		$file.on('change', function(event){
// 			var	tmppath = event.target.files[0];
// 			var bg_img = URL.createObjectURL(tmppath);
// 			var data = new FormData();
// 			var token =  $('input[name="_token"]');
// 			data.append("photo", tmppath);
// 			data.append("_token", token.attr('value'));
// 			console.log(data);
// 			$.ajax({
// 				url: '/user/upload_avatar',
// 				type: 'POST',
// 				method: 'POST',
// 				data: data,
// 				cache: false,
// 				// dataType: 'json',
// 				processData: false, // Don't process the files
// 				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
// 				success: function(data, textStatus, jqXHR)
// 				{
// 					console.log('success');
// 					var obj = JSON.parse(data);
// 					token.val(obj[0].csrf_name);
// 					// STOP LOADING SPINNER
// 					$label
// 						.addClass('file-ok')
// 						.css('background-image', 'url(' + obj.file_name + ')');
// 					// $labelCloseLink.css('display', 'block');
// 					$file.prop('disabled', true);
// 				},
// 				error: function(jqXHR, textStatus, errorThrown)
// 				{
// 					// Handle errors here
// 					console.log('ERRORS: ' + textStatus);
// 					// STOP LOADING SPINNER
// 				}
// 			});
// 		});

// 		// When close link is clicked
// 		// $labelCloseLink.on('click', function(event) {
// 		// 	var imgSrc = $(this).parent().css('background-image');
// 		// 	imgSrc = imgSrc.replace('url(','').replace(')','').replace(/\"/gi, "");
// 		// 	var data = new FormData();
// 		// 	var tokenName =  $('input[name="csrf_name"]');
// 		// 	var tokenValue =  $('input[name="csrf_value"]');
// 		// 	data.append(imgSrc, "delphoto");
// 		// 	data.append("csrf_name", tokenName.attr('value'));
// 		// 	data.append("csrf_value", tokenValue.attr('value'));
// 		// 	// console.log(data);
// 		// 	$.ajax({
// 		// 		url: '/user/edit/photo_delete',
// 		// 		type: 'POST',
// 		// 		method: 'POST',
// 		// 		data: data,
// 		// 		cache: false,
// 		// 		// dataType: 'json',
// 		// 		processData: false, // Don't process the files
// 		// 		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
// 		// 		success: function(data, textStatus, jqXHR)
// 		// 		{
// 		// 			console.log(data);
// 		// 			var obj = JSON.parse(data);
// 		// 			tokenName.val(obj.csrf_name);
// 		// 			tokenValue.val(obj.csrf_value);
// 		// 			$label.removeClass('file-ok')
// 		// 			.css('background-image', '');
// 		// 			$labelText.text(labelDefault);
// 		// 			$labelCloseLink.css('display', 'none');
// 		// 			$file.prop('disabled', false);
// 		// 			// STOP LOADING SPINNER
// 		// 		},
// 		// 		error: function(jqXHR, textStatus, errorThrown)
// 		// 		{
// 		// 			// Handle errors here
// 		// 			console.log('ERRORS: ' + textStatus);
// 		// 			// STOP LOADING SPINNER
// 		// 		}
// 		// 	});
// 		// });
		
// 	// End loop of file input elements  
// 	});
// 	// End ready function
// });



