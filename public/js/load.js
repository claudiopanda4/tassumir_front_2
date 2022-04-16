$(document).ready(function () {
	let length = $('#host').val().split('/').length;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[length - 2];
	let any_class, any_id, text, src, component;
	let components = [];
	$('#target-invited-relationship-id').click(function () {
		$('#target-invited-relationship').removeAttr('checked');
	});
	$('.accept-confirm').click(function(){
		$('#options-invited-pop-up').attr('checked', true);
	});
	$('.seguir-page').click(function (e) {
		
		//seguir_page($('#page_ident').val(), e, 2);
	});
	$('.relationship-type-item').click(function(e){
		alert('oi');
	});
	$('.choosed-type-relationship').click(function(e){
		/*alert('oi');
		any_id = e.target.id.split('_')[1];
		$.ajax({
			url : '/relationship/paymment/',
			type : 'post',
			data : {'ident' : any_id},
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#price-type-relationship').text('Kz ' + response.price + ',00');
			}
		});*/
	});
	function profile_content_filter(class_name, filter){
		for (var i = 0; i <= class_name.length - 1; i++) {
			if (filter == 1) {
				$('#' + any_class[i].id).addClass('invisible-component');
			} else if (filter == 2) {
				$('#' + any_class[i].id).addClass('invisible-component');
			}
		}
	}
	$('.has-img-profile').click(function (e) {
		document.getElementById('target-profile-cover-full').checked = true;
		//alert(document.getElementById('img-profile-component').src);
		document.getElementById('profile-cover-full').src = document.getElementById('img-profile-component').src;
	});
	$('#cover-posts-component').click(function (e) {
		e.preventDefault();
		$('#img-profile-icon-profile').attr('src', route + '/css/uicons/image_liked_profile.png');
		$('#video-profile-icon-profile').attr('src', route + '/css/uicons/video_liked.png');
		any_class = document.getElementsByClassName('video-page-component');
		profile_content_filter(any_class, 1);
		if ($('#cover-loaded-profile-read').val() == 0) {
			$.ajax({
				url: '/get_nine_images_perfil',
				type: 'get',
				data: {'id' : 0},
				dataType: 'json',
				success:function(response){
					console.log(response);
					$.each(response, function(key, data){
						if (data.formato_id == 2) {
							$('#img-post-page-container-' + key).attr('src', route + '/storage/img/page/' + data.file);
							$('#video-post-page-' + key).addClass('invisible-component');
							$('#img-post-page-' + key).addClass('cover-page-component');
							$('#img-post-page-' + key).removeClass('invisible-component');
						}
						$('#a-post-component-cover-' + key).attr('href', route + '/post_index/' + data.uuid);
						$('#a-post-component-cover-' + key).attr('id', 'a-post-component-cover_' + data.uuid);
					});
					$('#cover-loaded-profile-read').val(1);
					$('#component-loaded-profile-read').val(1);
				}
			});			
		}
		any_class = document.getElementsByClassName('cover-page-component');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).removeClass('invisible-component');
		}
	});
	$('.posts-content-filter').click(function (e) {
		e.preventDefault();
	});
	$('#video-posts-component').click(function(){
		//any_class = document.getElementsByClassName('video-page-component');
		//profile_content_filter(any_class, 2);
		$('#img-profile-icon-profile').attr('src', route + '/css/uicons/images.png');
		$('#video-profile-icon-profile').attr('src', route + '/css/uicons/video_profile_liked.png');
		$('#component-loaded-profile-read').val(2);
		any_class = document.getElementsByClassName('video-page-component');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).removeClass('invisible-component');
		}

		any_class = document.getElementsByClassName('cover-page-component');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).addClass('invisible-component');
		}
	});
	$('#see-more-description').click(function (e) {
		e.preventDefault();
		$('#see-more-description').addClass('invisible-component');
		$('#more-text-description').removeClass('invisible-component');
		$('#p-description-couple-all-container').addClass('full-text-p-couple');
		$('#p-description-couple-all').addClass('full-text-p-couple');
	});
	if($('#page_couple').val()){
		$('#p-description-couple-all-container').click(function (e) {
			any_class = e.target.className;
			if ($('#more-text-description').text().length > 0) {
				if (any_class.indexOf('full-text-p-couple') >= 0) {
					$('#see-more-description').removeClass('invisible-component');
					$('#more-text-description').addClass('invisible-component');
					$('#text-ellips-description').removeClass('invisible-component');
					$('#p-description-couple-all-container').removeClass('full-text-p-couple');
					$('#more-text-description').removeClass('full-text-p-couple');
					$('#see-more-description').removeClass('full-text-p-couple');
				    $('#p-description-couple-all').removeClass('full-text-p-couple');
				    $('#text-ellips-description').removeClass('full-text-p-couple');
				    $('#part-text').removeClass('full-text-p-couple');
				} else {
					$('#see-more-description').addClass('invisible-component');
					$('#more-text-description').removeClass('invisible-component');
					$('#p-description-couple-all-container').addClass('full-text-p-couple');
					$('#more-text-description').addClass('full-text-p-couple');
					$('#see-more-description').addClass('full-text-p-couple');
					$('#p-description-couple-all').addClass('full-text-p-couple');
				    $('#part-text').addClass('full-text-p-couple');
				    $('#text-ellips-description').addClass('invisible-component');
				    $('#text-ellips-description').addClass('full-text-p-couple');
				}			
			}

			});	
		$.ajax({
			url: '/page/description/' + $('#page_ident').val(),
			type: 'get',
			data: {},
			dataType: 'json',
			success:function(response){
				console.log(response);
				text = "";
				if (response.description) {
					if (response.description.length > 80) {
						for (var i = 0; i < 80; i++) {
							if (response.description[i] == '\n') {
								text = text + '<br>' + response.description[i];
							} else {
								text = text + '' + response.description[i];
							}
						}
						$('#part-text').html(text);
						$('#text-ellips-description').removeClass('invisible-component');
						text = '';
						for (var i = 80; i < response.description.length; i++) {
							text = text + '' + response.description[i];
						}
						$('#more-text-description').html(text);
						$('#see-more-description').removeClass('invisible-component');
					} else {
						$('#part-text').html(response.description);
					}					
				}
			}
		});
		data_page('/page/posts/numbers/' + $('#page_ident').val(), 1);
		data_page('/page/posts/reactions/', 2);
		data_page('/page/posts/followers/', 3);
		data_page('/page/following/ami', 4);

		function data_page(routing, ident) {
			$.ajax({
				url: routing,
				type: 'get',
				data: {'ident' : $('#page_ident').val()},
				dataType: 'json',
				success:function(response){
					console.log(response);
					if (ident == 1) {
						$('#qtd-posts').text(response.qtd);
					}
					if (ident == 3) {
						console.log(response.qtd);
						$('#qtd-followers').text(response.qtd);
					}
					if (ident == 2) {
						$('#qtd-reactions').text(response.qtd);
					}
					if (ident == 4) {
						$('#btn_seguir').text(response.qtd);
						$('#more-option-btn-page').attr('src', route + '/css/uicons/' + response.icon);
						$('#more-option-btn-page').removeClass('invisible-component');
						if (response.owner) {
							$('#add-post-label-ident').removeClass('invisible-component');
							$('#add-cover').removeClass('invisible-component');
						} else {
							$('#add-post-label-ident').remove();
							$('#add-cover').remove();
						}
						if (response.state) {
							$('#btn_seguir').addClass('no-following');
						} else {
							$('#btn_seguir').removeClass('no-following');
						}
						$.each(response.class, function(key, data) {
							//$('#a-btn-flw-edt').addClass(data);
							$('#btn_seguir').addClass(data);
							//$('#btn_follwing_container').addClass(data);
						});
					}
				}
			});	
		}	
	}

	if($('#profile-container-id').val()){
		$.ajax({
			url: '/get_nine_videos_perfil',
			type: 'get',
			data: {'id' : 0},
			dataType: 'json',
			success:function(response){
				console.log(response);
				$.each(response, function(key, data){
					if (data.formato_id == 1) {
						$('#img-post-page-' + key).addClass('invisible-component');
						document.getElementById('video-post-page-' + key).preload = 'metadata';
						$('#video-post-page-' + key).attr('src', route + '/storage/video/page/' + data.file + '#t=5,10');
						$('#video-post-page-' + key).removeClass('invisible-component');
						$('#video-post-page-' + key).addClass('video-page-component');
					}
					$('#a-post-component-' + key).attr('href', route + '/post_index/' + data.uuid);
					$('#a-post-component-' + key).attr('id', 'a-post-component_' + data.uuid);
				});
				$('#video-loaded-profile-read').val(1);
				if (true) {
					$('#video-profile-icon-profile').attr('src', route + '/css/uicons/video_profile_liked.png');
				}
			}
		});
	}
	$('.cover-posts-component-page').click(function (e) {
		any_class = document.getElementsByClassName('get-page-video');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('get-page-img');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).removeClass('invisible-component');
		}
		$.ajax({
			url: '/page/pictures/',
			type: 'get',
			data: {'id' : 0, 'uuid' : $('#page_ident').val()},
			dataType: 'json',
			success:function(response){
				console.log('hipocrisia');
				console.log(response);
				$.each(response, function(key, data){
					$('#post-img-post-container-page-' + key).attr('src', route + '/storage/img/page/' + data.file)
					$('#post-img-post-container-page-' + key).attr('id', 'post-img-post-container-page_' + data.uuid);
					$('#post-img-container-page-link-' + key).attr('href', route + '/post_index/' + data.uuid)
					$('#post-img-container-page-link-' + key).attr('id', 'post-img-container-page-link_' + data.uuid);
					$('#post-img-container-page-' + key).removeClass('invisible-component');
					$('#post-img-container-page-' + key).addClass('get-page-img');
					$('#post-img-container-page-' + key).attr('id', 'post-img-container-page_' + data.uuid);

				});
			}
		});		
	});
	$('.video-posts-component-page').click(function (e) {
		any_class = document.getElementsByClassName('get-page-img');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('get-page-video');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).removeClass('invisible-component');
		}
		/*$.ajax({
			url: '/page/videos/',
			type: 'get',
			data: {'id' : 0, 'uuid' : $('#page_ident').val()},
			dataType: 'json',
			success:function(response){
				console.log('hipocrisia');
				console.log(response);
				$.each(response, function(key, data){
					$('#post-img-post-container-page-' + key).attr('src', route + '/storage/img/page/' + data.file)
					$('#post-img-post-container-page-' + key).attr('id', 'post-img-post-container-page_' + data.uuid);
					$('#post-img-container-page-link-' + key).attr('href', route + '/post_index/' + data.uuid)
					$('#post-img-container-page-link-' + key).attr('id', 'post-img-container-page-link_' + data.uuid);
					$('#post-img-container-page-' + key).removeClass('invisible-component');
					$('#post-img-container-page-' + key).addClass('get-page-img');
					$('#post-img-container-page-' + key).attr('id', 'post-img-container-page_' + data.uuid);

				});
			}
		});	*/	
	});
	$.ajax({
		url: '/app/notifications/numbers',
		type: 'get',
		data: {},
		dataType: 'json',
		success:function(response){
			console.log(response);
			if (response.not_numbers > 0) {
				//alert(response.not_numbers);
				$('#number-notification-component').removeClass('invisible-component');
				$('#number-notification-id').text(response.not_numbers);
				$('#number-notification-component-footer').removeClass('invisible-component');
				$('#number-notification-id-footer').text(response.not_numbers);
			}
		}
	});

	$('#alert-description').click(function(){
	   	alert('oi');
		if (e.target.className.indexOf('alert-description-class') > -1) {
		   	if ($('#checked-load-all').val() == 0) {
		    	$('#more-content-alert').removeClass('invisible-component');
		    	$('#alert-description-see-more').removeClass('invisible-component');
		   		$('#checked-load-all').val(1);
			} else {
				$('#alert-description-see-more').addClass('invisible-component');
				$('#more-content-alert').addClass('invisible-component');
				$('#checked-load-all').val(0);
			}
	   	}
	});
	function empty(class_name, components) {
		for (var i = 0; i <= any_class.length - 1; i++) {
			any_id = any_class[i].id.split('_')[1];
			console.log(any_id);
			$(components[0]).attr('id', 'assumir-item-' + i);
			$(components[1]).attr('id', 'name-search-data-' + i);
			$(components[2]).addClass('invisible-component');
			$(components[2]).attr('id', 'a-result-search-' + i);
			$(components[3]).attr('id', 'assumir-item-text-' + i);
		}
	}
	$.ajax({
		url: '/relationship/requests/pedinte',
		type: 'get',
		data: {},
		dataType: 'json',
		success: function (response) {
			console.log(response);
			if (!response.state) {
			} else {
				$('#alert-info-about-us-0').remove();
				$('#alert-info-about-us-6').remove();
			}
		}
	});
	$.ajax({
		url: '/relationship/requests',
		type: 'get',
		data: {},
		dataType: 'json',
		success: function (response) {
			if (response.state) {
				$('#relationship-requests').removeClass('invisible-component');	
			} else {$('#relationship-requests').remove();}
		}
	});
	$('#choose-type-relationship-id').click(function (e) {
		if ($('#checked-load').val() != 1) {
			$.ajax({
				url: '/relationship/type',
				type: 'get',
				data: {},
				dataType: 'json',
				success: function (response) {
					console.log(response[0]);
					$.each(response[0], function(key, data) {
						console.log(data.tipo_relacionamento);
						component = '<label for="choose-type-relationship" id="choosed-type-relationship_' + data.tipo_relacionamento_id 
						+ '" class="choosed-type-relationship relationship-type-item-selected" style="display: block;"><h1 class="relationship-type-item relationship-type-item-selected" id="choosed-type-relationship-text_' + data.tipo_relacionamento_id + '">' + data.tipo_relacionamento + '</h1></label>';
						$('#tipo_relac_id').append(component);
					});
					$('#checked-load').val(1); 
				}
			});
		}
	});
	$('.assumir-relationship-user').click(function (e) {
		e.preventDefault();
		any_id = e.target.id.split('_')[1];
		$('#uuid_user_assumir').val(any_id);
		$('#search-person-assumir').val('');
		$('#name-search-data-selected').text($('#name-search-data_' + any_id).text());
		$('#selected-user-assumir').removeClass('invisible-component');
		any_class = document.getElementsByClassName('a-result-search');
		components = [
			'#assumir-item_' + any_id, 
			'#name-search-data_' + any_id,
			'#a-result-search_' + any_id,
			'#assumir-item-text_' + any_id
		];
		empty(any_class, components);
		$('#choose-type-relationship-id').removeClass('invisible-component');
		$('#search-container-user-assumir').addClass('invisible-component');
	});
	$('#name-page-text-choosed').keyup(function() {
		if ($('#name-page-text-choosed').val() != '' 
			&& $('#name-page-text-choosed').val() != ' '
			&& $('#name-page-text-choosed').val() != '  '
			&& $('#name-page-text-choosed').val() != '   '
			&& $('#name-page-text-choosed').val() != '    '
			&& $('#name-page-text-choosed').val() != '     '
			&& $('#name-page-text-choosed').val() != '      '
			&& $('#name-page-text-choosed').val() != '       '
			&& $('#name-page-text-choosed').val() != '        ') {
			$('#assumir-now').removeClass('invisible-component');
			$('#name-invited-page-home').val($('#name-page-text-choosed').val());
		} else {
			$('#assumir-now').addClass('invisible-component');
		}
	});
	$('.choosed-type-relationship').click(function (e) {
		any_id = e.target.id.split('_')[1];
		$('#type-data-selected').text($('#choosed-type-relationship-text_' + any_id).text());
		$('#selected-relationship-assumir').removeClass('invisible-component');
		$('#choose-type-relationship-id').addClass('invisible-component');
		$('#name-page-container').removeClass('invisible-component');
		$('#relationship-type-tassumir').val(any_id);
		$('#checked-load').val(1);
	});
	$('#assumir-item-text-selected').click(function(){
		$('#name-search-data-selected').text('');
		$('#choose-type-relationship-id').addClass('invisible-component');
		$('#selected-user-assumir').addClass('invisible-component');
		$('#search-container-user-assumir').removeClass('invisible-component');
	});
	$('#search-person-assumir').keyup(function(){
		text = $('#search-person-assumir').val();
		$.ajax({
			url: '/relationship/user/search',
			type: 'get',
			data: {'text' : text},
			dataType: 'json',
			success: function (response) {
				console.log(response);
				any_class = document.getElementsByClassName('a-result-search');
				components = [
					'#assumir-item_' + any_id, 
					'#name-search-data_' + any_id,
					'#a-result-search_' + any_id,
					'#assumir-item-text_' + any_id
				];
				empty(any_class, components);
				if (response.state) {
					$.each(response.search, function(key, data){
						console.log(data.nome);
						$('#name-search-data-' + key).text(data.nome + ' ' + data.apelido);
						$('#name-search-data-' + key).attr('id', 'name-search-data_' + data.uuid);
						$('#assumir-item-' + key).attr('id', 'assumir-item_' + data.uuid);
						$('#a-result-search-' + key).removeClass('invisible-component');
						$('#assumir-item-text-' + key).attr('id', 'assumir-item-text_' + data.uuid);
						$('#a-result-search-' + key).addClass('a-result-search');
						$('#a-result-search-' + key).attr('id', 'a-result-search_' + data.uuid);
					});					
				}
			}
		});
	});
	$.ajax({
        url: '/user_data',
        type: 'get',
        data: {},
        dataType: 'json',
        success:function(response){
        	$('#user-account-container-img-id').attr('src', route + "/css/uicons/user.png");
			$('#user-account-container-img-id').removeClass('invisible-component');
        	if (response.foto != null) {
				$('#user-account-container-img-id').attr('src', route + "/storage/img/users/" + response.foto);
				$('.user-account-container-img').addClass('transparent-back');
				$('#route_account').removeClass('invisible-component');
        	} else {
				$('#user-account-container-img-id').addClass('no-img');
        		if (document.getElementById('refresh-profile-photo-id')) {
        			document.getElementById('refresh-profile-photo-id').remove();
        		}
        	}

			$('#complete_name_id').text(response.nome + ' ' + response.apelido);
        	if($('#profile-container-id').val()){
        		//$('#profille-name').text(response.nome + ' ' + response.apelido);
		    	//src = document.getElementById('user-account-container-img-id').src;
		    	$('#img-profile-component').attr('src', src);
				$('#img-profile-component').removeClass('invisible-component');
				$('#img-profile-container').addClass('transparent-back');
				for(let i = 0; i < 3; i++){
					$.ajax({
						url: '/profile/data',
						type: 'get',
						data: {'type': i, 'id' : $('#ident-profile-id').val()},
						dataType: 'json',
						success: function (response) {
							console.log(response);
							$('#data-profile-' + i).text(response.data);
						}
					});
				}
				$.ajax({
					url: '/profile/maritalstatus',
					type: 'get',
					data: {'id': $('#ident-profile-id').val(), 'genre' : $('#ident-genre').val()},
					dataType: 'json',
					success: function (response) {
						console.log(response);
						if (response.payment) {
							$('#relationship-requests').remove();
							$('#name-requested').text($('#profille-name').text())
							$('#relationship-requests-payment').removeClass('invisible-component');
						} else {
							$('#relationship-requests-payment').remove();
						}
						$('#btn-profile-redirect').removeClass(response.addClass);
						$('#option-btn-profile').addClass(response.addClass);
						if (response.my_profile) {
							$('#option-btn-profile').text(response.state);
							$('#btn-profile-redirect').attr('href', route + '/profile/edit/' + $('#ident-profile-id').val());
							$('#more-option-visit-profile-details').remove();
							$('#more-option-btn-profile').removeClass('invisible');
							$('#more-option-btn-profile').attr('src', route + '/css/uicons/bookmark.png');
							$('#add-edit-profile-owner').removeClass('invisible-component');
						} else {
							$('#option-btn-profile').text(response.state);
							$('#more-option-target-profile-details').remove();
							$('#more-option-btn-profile').attr('src', route + '/css/uicons/message.png');
							$('#more-option-btn-profile').addClass('target-message-alert');
							$('#more-option-btn-profile').removeClass('invisible');
							$('#add-edit-profile-owner').remove();
						}
						console.log(response);
						if (response.reject) {
							$('#btn-profile-redirect').attr('href', route + '' + response.reject);
						}
						if (response.relationship) {
							$('#relationship-selected-type-profile').text(response[0].relationship + ' ');
							$('#spouse-profile').text(response[0].spouse_name + ' ' + response[0].spouse_apelido);
							$('#spouse-profile').attr('href', route + '/profile/' + response[0].spouse_uuid);							
						}
						if (response.relationship_request) {
							$('#btn-request-profile').addClass('accept-confirm');
							$('#uuid_has_relationship').val(response.reject.split('/')[3]);
							$('#btn-request-profile').text('Aceitar Pedido');
							$('#button-request-profile').text('Rejeitar');	
							$('#options-profile-mobile-user-log').addClass('request-option-active');
							$('#btn-profile-redirect-2').attr('href', route + '' + response.reject);
							//$('#btn-profile-redirect-1').attr('href', route + '' + response.accept);
							$('#btn-profile-redirect-1').addClass('nothing');
							$('#options-profile-btn-edit-profile').remove();
							$('#profile-options-button-1').removeClass('invisible-component');
							$('#profile-options-button-2').removeClass('invisible-component');			
						} else {
							$('#uuid_has_relationship').remove();
						}
						if (response.relationship_ident) {
							$('#proof-file-send').val(response.relationship_ident);
							$('#notificacao').val(response.notification);
						}
					}
				});
		    }
        	
        }
    });
    let id;
    if ($('#search-checked').val()) {
    	$('#search-icon-footer').attr('src', route + '/css/uicons/search_focus.png');
    };
	page_no_following();
    if ($('#notification-checked').val()) {
    	$('#notify-icon-footer').attr('src', route + '/css/uicons/notification_checked.png');
    };
    if ($('#home-page-checked').val()) {
    	$('#home-icon-footer').attr('src', route + '/css/uicons/home_focus.png');
    	$.ajax({
		    url: '/home/destaques',
		    type: 'get',
		    data: {},
		    dataType: 'json',
		    success:function(response){
		    	$.each(response, function (key, data) {
		    		$('#name-page-dest-' + key).text(data.page_name);
		    		$('#name-page-dest-' + key).attr('id', 'name-page-dest_' + key);
		    		if (window.innerWidth > 540) {
			    		$('#li-component-stories-img-profile-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
			    		if (data.page_foto != null) {
			    			$('#li-component-stories-img-profile-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
			    		}		    			
		    		}
		    		$('#li-component-stories-img-back-' + key).attr('src', route + "/css/uicons/back_no_file.jpg");	
		    		if (data.formato_id == 3) {
		    			$('#li-component-stories-img-back-' + key).removeClass('invisible');
		    		}
		    		$('#a-stories-dest-' + key).attr('href', route + '/post_index/' + data.uuid);
		    		if (data.file != null) {
		    			if (data.formato_id == 2) {
		    				$('#li-component-stories-img-back-' + key).attr('src', route + "/storage/img/page/" + data.file);
		    				$('#li-component-stories-img-back-' + key).removeClass('invisible');
		    			}
		    			if (data.formato_id == 1) {
		    				$('#li-component-stories-cover-video-' + key).attr('src', route + "/css/uicons/casal_amor.jpg");
		    				if (data.page_foto != null) {
				    			$('#li-component-stories-cover-video-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
				    		}
				    		if (window.innerWidth > 540 && key < 5) {
				    			document.getElementById('li-component-stories-video-post-' + key).preload = 'metadata';
				    			$('#li-component-stories-video-post-' + key).attr('src', route + "/storage/video/page/" + data.file);
				    		}

		    				$('#li-component-stories-video-post-' + key).removeClass('invisible');
		    				$('#li-component-stories-cover-video-' + key).removeClass('invisible-component');
		    			}	
		    		}
		    		$('#headline-stories-' + key).text(data.descricao);
		    		$('#li-component-stories-img-profile-' + key).removeClass('invisible');
		    	});
		        	//console.log(response);
		    }
		});
	    home_posts_assync();
		page_following();
		page_no_following();
	    $(window).resize(function () {
	    	page_following();
			page_no_following();
	    });
    	function home_posts(data, key, option) {
		    $('#vid-load-' + key).attr('id', 'vid-load_' + data.uuid);
    		$('#page-cover-post-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		    if (data.page_foto != null) {
		    	$('#page-cover-post-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
    		}
		    if (data.formato_id == 3) {
		   		$('#post-cover-post-index-' + key).addClass('invisible-component');
		    	$('#post-cover-post-index-' + key).addClass('invisible-component');
		   		$('#video-post-' + key).addClass('invisible-component');
		   		$('#p-post-' + key).text(data.descricao);
		   		$('#p-post-' + key).removeClass('invisible-component');
		    }
		    $('#loader_button_' + key).addClass('invisible-component');
			$('#has-video-' + key).attr('id', 'has-video_' + data.uuid);
		    if (data.formato_id == 1) {
		    	$('#video-post-' + key).removeClass('invisible-component');
		    	$('#post-cover-post-index-' + key).addClass('invisible-component');
		    	$('#m_post-' + key).addClass('getvideo');
		    	$('#video_' + key).attr('type', 'video/' + data.file.split('.')[data.file.split('.').length - 1]);
		    	$('#vid-' + key).val(route + "/storage/video/page/" + data.file);
		    	//if (key == 0) {$('#video_' + key).attr('src', route + "/storage/video/page/" + data.file);}
		    	//$('#video-post-link-' + key).attr('src', route + "/storage/video/page/" + data.file);
		    	$('#video-post-link-' + key).attr('id', 'video-post-link_' + data.uuid);
			    $('#video-post-' + key).attr('id', 'video-post_' + data.uuid);
		   		$('#video_' + key).attr('id', 'video_' + data.uuid);
			    $('#vid-' + key).attr('id', 'vid_' + data.uuid);
		    	$('#play_button_' + key).removeClass('invisible-component');
		    	$('#loader_button_' + key).attr('id', 'loader_button_' + data.uuid);
		    	$('#play_button_' + key).attr('id', 'play_button_' + data.uuid);
		    	$('#video-post-time-' + key).attr('id', 'video-post-time-' + data.uuid);
		    	$('#video-post-time-all-' + key).attr('id', 'video-post-time-all-' + data.uuid);
		    }
		    if (data.formato_id == 2) {
		   		$('#post-cover-post-index-' + key).addClass('post-cover-imgless');
		    	$('#video-post-' + key).addClass('invisible-component');
		    	//$('#cover-post-index-' + key).attr('src', route + "/storage/img/page/" + data.file);
				$('#cover-post-load-' + key).val(route + "/storage/img/page/" + data.file);
				$('#cover-post-load-' + key).attr('id', 'cover-post-load_' + data.uuid);
		    	$('#m_post-' + key).addClass('getcover');
		    	$('#cover-post-index-' + key).addClass('invisible-component');
		    }

		    //console.log('uuid ' + data.uuid);
		    $('#target-option-post-i-' + key).attr('id', 'target-option-post-i_' + data.uuid);
		    $('#target-option-post-' + key).attr('id', 'target-option-post_' + data.uuid);
		    $('#page-name-post-' + key).text(data.page_nome);
		    $('#time-posted-' + key).text(data.created_at);
		    $('#a-page-name-post-' + key).attr('href', route + '/couple_page/' + data.page_uuid);
		    $('#likes-qtd-' + key).text(data.qtd_reacoes + " reacções");
		    $('#page-cover-post-' + key).removeClass('invisible-component');
		    $('#m_post-' + key).removeClass('invisible-post');
		    $('#m_post-' + key).addClass('post-viewed');
		    if (data.qtd_reacoes == 1) {
		    	$('#likes-qtd-' + key).text(data.qtd_reacoes + " reacção");	    	
		    }
		    if (data.qtd_reacoes == 0) {
		    	$('#likes-qtd-' + key).text("");	    	
		    }
		    $('#comment-like-a-' + key).attr('id', 'comment-like-a_' + data.uuid);
		    $('#comment-like-i-' + key).attr('id', 'comment-like-i_' + data.uuid);
		    $('#comment-own-' + key).attr('id', 'comment-own_' + data.uuid);
		    $('#comment-users-own-' + key).attr('id', 'comment-users-own_' + data.uuid);
		    $('#comment-users-' + key).attr('id', 'comment-users_' + data.uuid);
		    $('#comentario-' + key).attr('id', 'comentario_' + data.uuid);
		    $('#comentario-i-' + key).attr('id', 'comentario-i_' + data.uuid);
		    $('#comment-user-comment-feed-' + key).attr('id', 'comment-user-comment-feed_' + data.uuid);
		    $('#comentario-a-' + key).attr('id', 'comentario-a_' + data.uuid);
		    $('#comment-send-profile-' + key).attr('src', document.getElementById('user-account-container-img-id').src);
		    if (document.getElementById('user-account-container-img-id').src.indexOf('user.png')) {
		    	$('#comment-send-profile-' + key).addClass('img-32');
		    	$('#comment-send-profile-' + key).removeClass('img-24');
		    }
		    $('#comment-send-profile-' + key).attr('id', 'comment-send-profile_' + data.uuid);
		    $('#comment-user-profile-' + key).attr('id', 'comment-user-profile_' + data.uuid);
		    $('#likes-qtd-' + key).attr('id', 'likes-qtd_' + data.uuid);	
		    $('#comment_-post-' + key).text(data.qtd_comment + " comentários");
		    if (data.qtd_comment == 1) {
		    	$('#comment_-post-' + key).text(data.qtd_comment + " comentário");
		    }
		    $('#comment_-post-' + key).attr('href',  route + '/post_index/' + data.uuid);	
		    if (data.qtd_comment == 0) {
		    	$('#comment_-post-' + key).text("");
		    }
		    $('#comment_-post-' + key).attr('id', 'comment-post_' + data.uuid);	
		    $('#user-identify-comment-feed-' + key).removeClass("invisible");
		    $('#user-identify-comment-feed-' + key).attr('src', document.getElementById('user-account-container-img-id').src);
		    $('#user-identify-comment-feed-' + key).attr('id', 'user-identify-comment-feed_' + data.uuid);
		    if (data.reagi > 0) {
		    	//alert('yha');
			    $('#off-id-i-' + key).removeClass('far');
			    $('#off-id-i-' + key).removeClass('unliked');
			    $('#off-id-i-' + key).addClass('fas');
			    $('#off-id-i-' + key).addClass('liked');
			    $('#off-id-i-' + key).attr('id', 'on-id-i_' + data.uuid);    
		    } else { 
				$('#off-id-i-' + key).attr('id', 'off-id-i_' + data.uuid);
		    }
		    if (data.segui == 0) {
		    	$('#seguir-a-' + key).text('seguir');
		    	$('.seguir-a-' + key).addClass('seguir-a-class_' + data.page_uuid);
		  	}
		  	$('#comment-send-profile-' + key).attr('src', (document.getElementById('user-account-container-img-id').src));
    		
			if (key >= 0) {
				$('#alert-info-about-us-0').removeClass('invisible-component');
			}
			if (key >= 2) {
				$('#alert-info-about-us-2').removeClass('invisible-component');
				$('#btn-alert-info-2').text('Saber mais');
			    $('#content-p-2').text('Como ganhar dinheiro usando o tassumir?')
			}
			if (key >= 6) {
				$('#alert-info-about-us-6').removeClass('invisible-component');
				$('#btn-alert-info-6').text('Assumir o Meu Relacionamento');
				$('#btn-alert-info-6').css({
					fontSize : '11px',
				});
			    $('#content-p-9').text('Ao assumir o seu relacionamento no tassumir, você ganhará automaticamente uma página, e poderá publicar e ganhar dinheiro por meio dos seus conteúdos')
			}
			$('#savepost-a-' + key).attr('id', 'savepost-a_' + data.uuid);
			$('#savepost-i-' + key).attr('id', 'savepost-i_' + data.uuid);
			$('#loader-id-icon-post-' + key).attr('id', 'loader-id-icon-post_' + data.uuid);
		    $('#page-name-post-' + key).attr('id', 'page-name-post_' + data.uuid);
		    $('#p-post-' + key).attr('id', 'p-post_' + data.uuid);
		    $('#reaction-id-a-' + key).attr('id', 'reaction-id-a_' + data.uuid);
		    $('#seguir-a-' + key).attr('id', 'seguir-a_' + data.page_uuid);
		    $('#seguir-span-' + key).attr('id', 'seguir-span_' + data.page_uuid);
		    $('#reaction-id-i-' + key).attr('id', 'reaction-id-a_' + data.uuid);
		    $('#loader-id-icon-' + key).attr('id', 'loader-id-icon_' + data.uuid);
		    $('#post_view_' + key).attr('id', 'post_view_' + data.uuid);
		    $('#cover-post-index-' + key).attr('id', 'cover-post-index_' + data.uuid);
		    $('#a-page-name-post-' + key).attr('id', 'a-page-name-post_' + data.uuid);
		    $('#post-cover-post-index-' + key).attr('id', 'post-cover-post-index_' + data.uuid);
		    $('#m_post-' + key).attr('id', 'm_post_' + data.uuid);
    		$('#page-cover-post-' + key).attr('id', 'page-cover-post_' + data.uuid);
			//alert('loader_button_comment_' + key);
		    $('#loader_button_comment_' + key).attr('id', 'loader_button_comment_' + data.uuid);

			if (key == 3) {
				if (window.innerWidth <= 720){
					$('#sugest_index_3').removeClass('invisible-component');
					suggest_page();
				}
			}
    	}

    	function home_posts_assync(){
    		$.ajax({
			    url: '/home/posts',
			    type: 'get',
			    data: {},
			    dataType: 'json',
			    success:function(response){
			    	$('#posts').val(0);
			    	let length = response.length;
			    	let cont = parseInt($('#posts-following').val());
			    	$.each(response, function (key, data) {
			    		cont = parseInt($('#posts-following').val());
			    		home_posts(data, cont, 1);
			    		cont++;
			    		$('#posts-following').val(cont);
			    	});
			    	$('#post_loading').val('checked');
			    	let limit = 6 - length;
			    	home_posts_no_following(limit);	
			    	
			        //console.log(response);
			    }
			});
    	}
    	function home_posts_no_following(limit){
    		let cont = parseInt($('#posts-following').val());
    		$.ajax({
			    url: '/home/posts_page_no_follow',
			    type: 'get',
			    data: {'limit': limit},
			    dataType: 'json',
			    success:function(response){
			    	$.each(response, function (key, data) {
			    		cont = parseInt($('#posts-following').val());
			    		//alert('limit cont ' + cont);
			    		home_posts(data, cont, 2);
			    		cont++;
			    		$('#posts-following').val(cont);
			    	});
			    	if (response.length > 0) {
			    		$('#loading-finished').val('0');
			    	}
			    	$('#loading-finished').val(0);
			        //console.log(response);
					//videos();
			    }
			});
			$('#posts').val(1);
			$('#m_post-145').addClass('invisible-component');
		   	$('#m_post-144').addClass('invisible-component');
    	}
    }

	if ($('#page_couple').val()) {
		if (window.innerWidth <= 720){
			suggest_page();
			$('#sugest_index_page').removeClass('invisible-component');
		}
		$.ajax({
			url: 'page/content/videos/',
			type: 'get',
			data: {'id' : 0, 'uuid' : $('#page_ident').val()},
			dataType: 'json',
			success: function (response) {
				console.log(response);
				$.each(response, function(key, data){
					$('#a-video-page-target-' + key).attr('href', route + '/post_index/' + data.uuid);
					$('#a-video-page-target-' + key).attr('id', 'a-video-page-target_' + data.uuid);
					$('#post-video-container-page-video-' + key).attr('src', route + '/storage/video/page/' + data.file);
					$('#post-video-container-page-' + key).removeClass('invisible-component');
					$('#post-video-container-page-' + key).addClass('get-page-video');
					$('#post-video-container-page-' + key).attr('id', 'post-video-container-page_' + data.uuid);
					$('#post-video-container-page-video-' + key).attr('id', 'post-video-container-page-video_' + data.uuid);
				});
				
			}
		});
		//alert($('#page_ident').val());
		$.ajax({
			url: '/page/spouses/name',
			type: 'get',
			data: {'id' : $('#page_ident').val()},
			dataType: 'json',
			success: function (response) {
				console.log('spouses');
				console.log(response);
				if (response.state) {
					$('#spouse-masc').text(response.homem);
					$('#spouse-fem').text(response.mulher);
					$('#relationship-type-spouse').text(' - ' + response.relacionamento);
					$('#spouses-component').removeClass('invisible-component');
				}
			}
		});
	}
    $('.sugest_component_div').click(function (e) {
    	id = e.target.id.split('-')[4];
   		document.location.href = $('#link_page_' + e.target.id.split('-')[4]).val();
   	});
    function suggest_page(){
    	$.ajax({
		    url: '/page/following/index',
		    type: 'get',
		    data: {},
		    dataType: 'json',
		    success:function(response){
		    	$.each(response, function (key, data) {
		    		if (response.length > 0) {
		        		$('#li-component-suggest-index-' + key).addClass('seguir-a-class_' + data.uuid);
		    			$('#name-suggest-index-page-' + key).text(data.nome);
		    			//$('#a-name-suggest-index-page-' + key).attr('href', route + '/couple_page/' + data.uuid);
		    			$('#suggest-index-page-a-' + key).attr('href', route + '/couple_page/' + data.uuid);
		    			$('#cover-suggest-index-page-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		        		if (data.foto != null) {
		        			$('#cover-suggest-index-page-' + key).attr('src', route + "/storage/img/page/" + data.foto);
		        		}
		        		$('#link_page_' + key).val(route + '/couple_page/' + data.uuid);
		        		$('#loader-id-icon-post-index-' + key).addClass('loader-id-icon-post_' + data.uuid);
		        		$('#loader-id-icon-post-index-' + key).attr('id', 'loader-id-icon-post-index_' + data.uuid);
		        		$('#seguir-span-' + key).attr('id', 'seguir-span_' + data.uuid);
		        		$('#seguir-index_' + key).attr('id', 'seguir-index_' + data.uuid);
		        		$('#li-component-suggest-index-' + key).attr('id', 'li-component-suggest-index_' + data.uuid);
		    		}
		    	});
		        //console.log(response);
		    }
		});
	}

    function page_following() {
	    /*if (window.innerWidth >= 720) {
			$.ajax({
		        url: '/page/following',
		        type: 'get',
		        data: {},
		        dataType: 'json',
		        success:function(response){
		        	//console.log(response);
		        }
		    });
	    } */   	
    }
    function page_no_following() {
	    if ((window.innerWidth > 1148)) {
			$.ajax({
		        url: '/page/no_following',
		        type: 'get',
		        data: {},
		        dataType: 'json',
		        success:function(response){
		        	//console.log(response);
		        	$.each(response, function (key, data) {
		        		$('#page-name-suggest-id-' + key).text(data.nome);
		        		$('#page-followers-suggest-id-' + key).text(data.seguidores + " seguidores");
		        		$('#page-cover-suggest-id-' + key).removeClass('invisible-component');
		        		$('#a-suggest-id-aside-name-' + key).attr('href', route + '/couple_page/' + data.uuid);
		        		$('#a-suggest-id-aside-' + key).attr('href', route + '/couple_page/' + data.uuid);
		        		$('#follwing-' + key).attr('id', data.page_id);
		        		$('#page-cover-suggest-id-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		        		if (data.foto != null) {
		        			$('#page-cover-suggest-id-' + key).attr('src', route + "/storage/img/page/" + data.foto);
		        		}
		        		$('#li-component-sugest-' + key).addClass('seguir-a-class_' + data.uuid);
		        		$('#li-component-sugest-' + key).removeClass('invisible-component');
		        		$('#li-component-sugest-' + key).attr('id', 'li-component-sugest_' + data.uuid);
		        	});
		        }
		    });
	    }    	
    }
    let cont = 0;
    var top_video;
    let id_video;
    let link_video;
    let getvideo;
    let post_view;
    let offset_post;
    function videos(id){
    }
    setInterval(function (e) {
	    getvideo = document.getElementsByClassName('getvideo');
	    for (var i = 0; i <= getvideo.length - 1; i++) {
		    id = getvideo[i].id.split('_')[2];
		    if (document.getElementById('video_' + id).readyState == 4) {
		  		$('#vid-load_' + id).val('ready');  	
		  		$('#loader_button_' + id).addClass('invisible-component');
		    } 
			if ($('#vid-load_' + id).val() == 'ready') {
				$('#loader_button_' + id).addClass('invisible-component');	
			}
	    }
	    getcover = document.getElementsByClassName('getcover');
	    for (var i = 0; i <= getcover.length - 1; i++) {
		    id = getcover[i].id.split('_')[2];
		    if (window.innerHeight > 680) {
	    		if ($('#m_post_' + id).offset().top < 775 && $('#has-video_' + id).val() != 'ok') {
		    		$('#cover-post-index_' + id).attr('src', $('#cover-post-load_' + id).val());
		    		$('#post-cover-post-index_' + id).removeClass('post-cover-imgless');
		    		$('#cover-post-index_' + id).removeClass('invisible-component');
		    		$('#has-video_' + id).val('ok');
		    	}
	    	} else {
				if ($('#m_post_' + id).offset().top < 410 && $('#has-video_' + id).val() != 'ok') {
					$('#cover-post-index_' + id).attr('src', $('#cover-post-load_' + id).val());
		    		$('#post-cover-post-index_' + id).removeClass('post-cover-imgless');
		    		$('#cover-post-index_' + id).removeClass('invisible-component');
					$('#has-video_' + id).val('ok');
				}
	    	}
	    }
    }, 10);
    setInterval(function (e) {
    	let main = $('.main-container').offset();
    	let document_height = $('#main-home').height();
    	let final = ($(window).height()) - main.top;
    	cont = parseInt($('#posts-following').val());
    	if ((final >= document_height) && (parseInt($('#loading-finished').val()) == 0)) {
    		$('#loading-finished').val('1');
    		//console.log('final');
    		home_posts_assync();
    	}
    	//alert('post_val ' + $('#posts').val());
    	if ($('#posts').val() == 1) {
            post_view = document.getElementsByClassName('post-viewed');
            for (var i = post_view.length - 1; i >= 0 ; i--) {
                id = post_view[i].id.split('_')[2];
                //console.log(id);
	    		if ($('#m_post_' + id).offset().top < 400) {
	    			$.ajax({
					    url: '/view/',
					    type: 'get',
					    data: {'id' : id, 'video_add' : false},
					    dataType: 'json',
					    success:function(response){
					    	//console.log(response);
					    }
					});
					$('#m_post_' + id).removeClass('post-viewed');
		   		}
            }
	    	getvideo = document.getElementsByClassName('getvideo');
	    	for (var i = 0; i <= getvideo.length - 1; i++) {
	    		id = getvideo[i].id.split('_')[2];
    			//console.log('vid_' + id);
	    		link_video = document.getElementById('vid_' + id).value;

		    	document.getElementById('video_' + id).oncanplay = function() {
		           	$.ajax({
					    url: '/return/id',
					    type: 'get',
					    data: {'id' : 'loader_button_' + id, 'file' : false},
					    dataType: 'json',
					    success:function(response){
						    //$("#loading-finished-video").val(response.id);
					    }
					});
	           	}

	    		if (window.innerHeight > 680) {
	    			if ($('#m_post_' + id).offset().top < 300 && $('#has-video_' + id).val() != 'ok') {
		    			$('#video-post-link_' + id).attr('src', link_video);
		    			document.getElementById('video_' + id).preload = 'metadata';
		    			$('#video_' + id).attr('src', link_video);
		    			$('#has-video_' + id).val('ok');
		    			videos(id);
		    		}
	    		} else {
					if ($('#m_post_' + id).offset().top < 210 && $('#has-video_' + id).val() != 'ok') {
		    			$('#video-post-link_' + id).attr('src', link_video);
		    			$('#video_' + id).attr('src', link_video);
		    			$('#has-video_' + id).val('ok');
		    			videos(id);
						//console.log(("id = #" + id));
		    			//$("#loading-finished-video").val(id);
		    		}
	    		}
	    		$('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                if (!(document.getElementById('video_' + id).paused)) {
                    currentTime = document.getElementById('video_' + id).currentTime;
                    duration = document.getElementById('video_' + id).duration;
                    $('#video-post-time-' + id).val(currentTime);
                    if (currentTime >= (duration / 2) && currentTime >= 30) {
                        watched_video = $('#watch-video-' + id).val();
                        $.ajax({
						    url: '/view/',
						    type: 'get',
						    data: {'id' : id, 'video_add' : true},
						    dataType: 'json',
						    success:function(response){
						    }
						});
                    }
                }
	    	}    		
    	}
    }, 1000);
    $('.like-a').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	$('#loader-id-icon_' + id).removeClass('invisible-component');

    	$.ajax({
		    url: '/post/like',
		    type: 'get',
		    data: {'id' : id},
		    dataType: 'json',
		    success:function(response){
		    	console.log(response);
		    	$.each(response.add, function(key, data) {
		    		$('#' + e.target.id).addClass(data);
		    	});
		    	$.each(response.remove, function(key, data) {
		    		$('#' + e.target.id).removeClass(data);
		    	});
		    	$('#' + response.loader).addClass('invisible-component');
		    	$('#' + e.target.id).attr('id', response.id);
		    	$('#likes-qtd_' + e.target.id.split('_')[1]).text(response.reactions + " reacções");
		    	if (response.reactions == 0) {
					$('#likes-qtd_' + e.target.id.split('_')[1]).text("");
		    	}
		    	if (response.reactions == 1) {
					$('#likes-qtd_' + e.target.id.split('_')[1]).text(response.reactions + " reacção");
		    	}
		    }
    		
		});
    })
    function seguir_page(id, e, type){
    	$.ajax({
		    url: '/page/follow',
		    type: 'get',
		    data: {'uuid' : id},
		    dataType: 'json',
		    success:function(response){
		    	console.log(response);
		    	if (type == 1) {
			    	class_name = "seguir-a-class_" + e.target.id.split('_')[1];
			    	seguir_a = document.getElementsByClassName("seguir-a-class_" + id).length;
			    	for (var i = document.getElementsByClassName(class_name).length - 1; i >= 0; i--) {
			    		document.getElementsByClassName(class_name)[i].classList.add('invisible-component');
			    	}
			    	$('#loader-id-icon-post_' + response.uuid).addClass('invisible-component');
	    			$('#loader-id-icon-post-index_' + response.uuid).addClass('invisible-component');		    		
		    	}
		    	if (type == 2) {
		    		alert('entrou');	    		
		    	}
		    }
    		
		});
    }
    let class_name;
    $('.seguir-a').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	$('#loader-id-icon-post_' + id).removeClass('invisible-component');
    	$('#loader-id-icon-post-index_' + id).removeClass('invisible-component');
    	//alert(id);
    	seguir_page(id, e, 1);
    	//alert();
    });
  	text = "";
    $('.comentar-a').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	$('#loader_button_comment_' + id).removeClass('invisible-component');
    	text = $('#comentario_' + id).val();
    	$("#comentario_" + id).val('');
    	$('#comment-user-comment-feed_' + id).text(text);
		document.getElementById('comment-users_' + id).classList.remove('invisible-component');
    	$.ajax({
		    url: '/post/index/comment',
		    type: 'get',
		    data: {'id' : id, 'comment' : text, 'img_scr' : document.getElementById('page-cover-post_' + id).src},
		    dataType: 'json',
		    success: function(response){
		    	console.log(response);
		    	if (response.owner) {
		    		document.getElementById('user-identify-comment-feed_' + response.id).src = response.img_scr;
		    	}
		    	console.log('#comment-post_' + response.id);
		    	$('#comment-post_' + response.id).text(response.qtd + ' comentários');
		    	if(response.qtd == 1){
		    		$('#comment-post_' + response.id).text(response.qtd + ' comentário');
		    	}
		    	$('#' + response.loader).addClass('invisible-component');
		    	$('#comment-like-i_' + response.id).attr('id', 'comment-like-i_' + response.id_comment);
		    	$('#comment-like-a_' + response.id).attr('id', 'comment-like-a_' + response.id_comment);
		    }
    		
		});
    });

    $('.save-post').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	$.ajax({
		    url: '/post/index/save',
		    type: 'get',
		    data: {'id' : id},
		    dataType: 'json',
		    success: function(response){
		    	//console.log(response);
		    	$.each(response.add, function(key, data){
		    		$('#' + e.target.id).addClass(data);
		    	});
		    	$.each(response.remove, function(key, data){
		    		$('#' + e.target.id).removeClass(data);
		    	});
		    }
		});
    });
    $('.add-post-footer').click(function (e) {
    	e.preventDefault();
    	document.getElementById('target-alert-post-denied').checked = true;
    });
	$('.comment-a-react').click(function (e) {
		e.preventDefault();
    	id = e.target.id.split('_')[1];
    	class_name = e.target.className;
		if (class_name.indexOf('far') < 0) {
			$('#comment-like-i_' + id).addClass('far');
			$('#comment-like-i_' + id).removeClass('liked');
			$('#comment-like-i_' + id).removeClass('fas');
		} else {
			$('#comment-like-i_' + id).addClass('fas');
			$('#comment-like-i_' + id).addClass('liked');
			$('#comment-like-i_' + id).removeClass('far');
		}
	    $.ajax({
		    url: '/post/comment/reaction',
		    type: 'get',
		    data: {'id' : id},
		    dataType: 'json',
		    success: function(response){
				console.log(response);
			}
		});
    });
    $('#target-options').click(function () {
    	
    });
    //$('#reaction-id-a-')
});
window.addEventListener('load', function () {
	if (document.getElementById('file-id')) {

	}
});
document.addEventListener('click', function (e) {
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[$('#host').val().split('/').length - 2];
	if (e.target.className.indexOf('relationship-type-item-selected') > -1) {
		any_id = e.target.id.split('_')[1];
		$.ajax({
			url : '/relationship/paymment/',
			type : 'get',
			data : {'ident' : any_id},
			dataType : 'json',
			success: function (response) {
				console.log(response);
				$('#price-type-relationship').text('Kz ' + response.preco + ',00');
			}
		});
	}
	if (e.target.className.indexOf('paymment-to-do') > -1) {
		$('#target-proof').attr('checked', true);
	}
	if (e.target.className.indexOf('target-relationship-assumir') > -1) {
		//document.getElementById('target-invited-relationship').checked = true;
		e.preventDefault();
		document.getElementById('target-alert-tassumir').checked = true;
		$('#uuid_user_assumir').val($('#ident-profile-id').val());
		$('#search-container-user-assumir').addClass('invisible-component');
		$('#choose-type-relationship-id').removeClass('invisible-component');
		$('#assumir-relationship-user-desfazer').addClass('invisible-component');
		$('#name-search-data-selected').text($('#profille-name').text());
		$('#selected-user-assumir').removeClass('invisible-component');
	}
	if (e.target.className.indexOf('target-message-alert') > -1) {
		$('#concluir_file_ok').addClass('invisible-component');
		$('#header-title-alert').text('Tassumir Mensagens')
		$('#alert-description').text('Brevemente você poderá interagir por mensagens no Tassumir... Quando estiver disponível, anunciaremos pra você. Estamos desenvolvendo com muito cuidado para poder proporcionar a você uma experiência melhor e mais PRIVADA no Tassumir. Por favor, AGUARDE...');
		document.getElementById('target-alert-post-denied').checked = true;
	}
	if (e.target.className.indexOf('accept-confirm') > -1) {
		e.preventDefault();
		document.getElementById('options-invited-pop-up').checked = true;
		any_id = $('#uuid_has_relationship').val();
		$.ajax({
		    url: '/relationship/confirm/' + any_id,
		    type: 'get',
		    data: {'uuid' : any_id},
		    dataType: 'json',
		    success:function(response){
		    	console.log('responda ' + response.answer);
		    	$('#textr').text(response.answer);
		    	$('#accept_relacd_ident').val(any_id);
		    	$('#load_accpet').addClass('invisible-component');
		    	document.getElementById('accept_form').setAttribute('action', route + '/relationship/accept/');
		    }
		});
	}
	function seguir_page(id){
    	$.ajax({
		    url: '/page/follow',
		    type: 'get',
		    data: {'uuid' : id},
		    dataType: 'json',
		    success:function(response){
		    	console.log('chegou ' + response);
		    	$('#btn_seguir').text(response.text);
		    	if (response.state) {
		    		$('#btn_seguir').removeClass('no-following');
		    	} else {
		    		$('#btn_seguir').addClass('no-following');
		    	}
		    }
    		
		});
    }
	if (e.target.className.indexOf('seguir-page') > -1) {
		e.preventDefault();
		$('#btn_seguir').text('...');
		seguir_page($('#page_ident').val());
	}
	if (e.target.className.indexOf('relationship-type-item') > -1) {
		any_id = e.target.id.split('_')[1];
		$('#type-data-selected').text($('#choosed-type-relationship-text_' + any_id).text());
		$('#type-relationship-choosed').text($('#choosed-type-relationship-text_' + any_id).text());
		$('#selected-relationship-assumir').removeClass('invisible-component');
		$('#choose-type-relationship-id').addClass('invisible-component');
		$('#name-page-container').removeClass('invisible-component');
		$('#relationship-type-tassumir').val(any_id);
	}
	if (e.target.className.indexOf('pop-up-option') > -1) {
		e.preventDefault();
		document.getElementById('target-option-post').checked = false;
	}
	if (e.target.className.indexOf('nothing') > -1) {
		e.preventDefault();
	}
	if (e.target.className.indexOf('alert-description-class') > -1) {
	   	if ($('#checked-load-all').val() == 0) {
	    	$('#more-content-alert').removeClass('invisible-component');
	    	$('#alert-description-see-more').addClass('invisible-component');
	    	$('#elips-p').addClass('invisible-component');
	   		$('#checked-load-all').val(1);
		} else {
			$('#alert-description-see-more').removeClass('invisible-component');
			$('#more-content-alert').addClass('invisible-component');
	    	$('#elips-p').removeClass('invisible-component');
			$('#checked-load-all').val(0);
		}
	}
});