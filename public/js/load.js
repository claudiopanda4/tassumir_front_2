$(document).ready(function () {
	let length = $('#host').val().split('/').length;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[length - 2];
	var any_class, any_id, text, src, component, url, type, cont, ajax, href, file, classList;
	let components = [];
	$('#login-enter').click(function () {
		document.getElementById('target-loading-app-load').checked = true;
	});

	function attr (class_name, id_name, key, ident) {
		class_name = document.getElementsByClassName(class_name);
		if (class_name[key]) {
			class_name[key].setAttribute('id', id_name + '_' + ident);
		}
	}
	$('.comment-like-a').click(function(e){
		any_id = e.target.id.split('_')[1];
		console.log(any_id);
	});
	$('#add-edit-profile-owner').click(function () {
		$('#file-id-profile').click();
	});
	$('#more-options-profile-btn-profile').click(function(){
		$.ajax({
			url: route + '/profile/more/' + $('#ident-profile-id').val(),
			type: 'GET',
			dataType: 'json',
			data: {},
			success: function(response){
				console.log(response);
				$('#age-profile').text(response.age);
				$('#aderiu').text(response.aderiu);
			}
		});
	});
	$('.delete-post-option-component').click(function (e) {
		any_id = e.target.id.split('_')[1];
	});
	if($('#comment_index').val()){
		$('#title-header-component').css({
			marginTop : '5px',
			marginLeft : '-10px',
		})
		$('#title-header-component').text('Publicação de ' + $('#page-name-post_' + $('#ident-post-page').val()).text());
	}
	//console.log(window.history);
	$('.component-back-container').click(function() {
		window.history.back();
	});
	if (window.innerWidth <= 540) {
		$('.go-profile').click(function (e) {
			/*e.preventDefault();
			window.history.go('/profile');*/
		});
		if($('#control-component-page-profile').val()){
			$('#header-main-container').addClass('invisible-component');			
		} else {
			$('#header-main-container-page-profile').addClass('invisible-component');
		}
		$('.search-icon-footer-a').click(function(e){
			e.preventDefault();
			text = $('#search-tass-item').val();
			file = '/components/search_item.html';
			read_component(file, 'component-read-search');
			file = '/components/search_page.html';
			read_component(file, 'component-read-search-page');
			document.getElementById('search-pop-up-check').checked = true;
		});
		
		function read_component (file, ident) {	
			href = route + file;
			let myHeaders = new Headers();
			myHeaders.append('Content-Type', 'text/plain; charset=utf-08');
			fetch(href, myHeaders).then(function (response) {
				return response.text();
			}).then(function (result) {
				$('#' + ident).val(result);
			});
		}

		function createComponents (components, component_append, class_name, read_component, type) {
			numb_components = components.length;
			if (numb_components <= 0) {
				$('#' + component_append).empty();
			}
			any_id = 0;
			component = '';
			while(any_id < numb_components){
				component = component + '' + $('#' + read_component).val();
				any_id++;
			}
			$('#' + component_append).html(component);
			any_class = document.getElementsByClassName(class_name[0]);
			//console.log(class_name[0].split('-')[3]);
			for (let i = 0; i <= any_class.length - 1; i++) {
				//console.log(components[i]);
				if (components[i] != undefined && components[i]) {
					//console.log(components[i].uuid);
					any_class[i].setAttribute('id', 'search-container_' + components[i].uuid);
					attr(class_name[1], 'search-img-container', i, components[i].uuid);
					attr(class_name[2], 'search-img-container-img', i, components[i].uuid);
					text = components[i].nome;
					if (components[i].apelido) {
						text = components[i].nome + ' ' + components[i].apelido;
					}
					attr(class_name[3], 'search-context-text-top', i, components[i].uuid);
					attr(class_name[4], 'search-context-text-item-top', i, components[i].uuid);
					attr(class_name[5], 'search-context-text-bottom', i, components[i].uuid);
					attr(class_name[6], 'search-context-text-item-bottom', i, components[i].uuid);
					attr(class_name[7], 'search-item-action-person', i, components[i].uuid);
					attr(class_name[8], 'search-item-action-person-a', i, components[i].uuid);
					$('#search-context-text-top_' + components[i].uuid).text(text);
					$('#search-context-text-top_' + components[i].uuid).addClass('transparent-back');
					if (components[i].foto) {
						$('#search-img-container-img_' + components[i].uuid).attr('src', route + '/storage/img/users/' + components[i].foto);
						if (type == 2) {
							$('#search-img-container-img_' + components[i].uuid).attr('src', route + '/storage/img/page/' + components[i].foto);
						}
					} else {
						if (type == 2) {
							$('#search-img-container-img_' + components[i].uuid).attr('src', route + '/css/uicons/page_icon.jpg');
						}else {
							$('#search-img-container-img_' + components[i].uuid).addClass('null');
							$('#search-img-container-img_' + components[i].uuid).attr('src', route + '/css/uicons/user.png');
						}
						
					}
					if (type == 1) {
						$('#search-context-text-bottom_' + components[i].uuid).addClass('transparent-back');
						$('#search-context-text-bottom_' + components[i].uuid).addClass('search-info-people');
						if (!components[i].verify_page) {
							if (!components[i].relationship) {
								if (!components[i].have_relationship && !components[i].equal_genre && !components[i].accept_request) {
									$('#search-item-action-person_' + components[i].uuid).html('ASSUMIR');
									$('#search-item-action-person_' + components[i].uuid).addClass('transparent-back');
									$('#search-item-action-person_' + components[i].uuid).addClass('assumir-search-container');
									$('#search-item-action-person_' + components[i].uuid).addClass('target-relationship-assumir');
									$('#search-item-action-person_' + components[i].uuid).removeClass('invisible-component');	
								}
							}
							$('#search-context-text-bottom_' + components[i].uuid).html('Sem relacionamento');
						} else {
							$('#search-context-text-bottom_' + components[i].uuid).html('Em um relacionamento');
						}
					}	
					$('#search-img-container-img_' + components[i].uuid).removeClass('invisible-component');
					text = "";					
				}
			}
		}
		$('#search-tass-item').keyup(function () {
			if ($('#search-tass-item').val() == '' || $('#search-tass-item').val() == ' ') {
				$('#container-search-container').empty();
			} else {
				text = $('#search-tass-item').val();
				$.ajax({
					url: '/search/people/',
					type: 'get',
					data: {dados : text, v : 1},
					dataType: 'json',
					success:function(response){
						console.log(response);
						//console.log(response.length);
						if (response.length) {
							$('#people-search').removeClass('invisible-component');
						} else {
							$('#people-search').addClass('invisible-component');
						}
						classList = [
							'search-container-get',
							'search-container-get-1',
							'search-container-get-2',
							'search-container-get-3',
							'search-container-get-4',
							'search-container-get-5',
							'search-container-get-6',
							'search-container-get-7',
							'search-container-get-8',
							'search-container-get-9',
						];
						createComponents(response, 'container-search-container', classList, 'component-read-search', 1);
					} 
				});
			}
		});
		$('#search-tass-item').keyup(function () {
			if ($('#search-tass-item').val() == '' || $('#search-tass-item').val() == ' ') {
				$('#container-search-container-page').empty();
			} else {
				text = $('#search-tass-item').val();
				$.ajax({
					url: '/search/page/',
					type: 'get',
					data: {dados : text, v : 1},
					dataType: 'json',
					success:function(response){
						//console.log(response);
						//console.log(response.length);
						if (response.length) {
							$('#page-search').removeClass('invisible-component');
						} else {
							$('#page-search').addClass('invisible-component');
						}
						classList = [
							'search-container-get-page',
							'search-container-get-page-1-page',
							'search-container-get-page-2-page',
							'search-container-get-page-3-page',
							'search-container-get-page-4-page',
							'search-container-get-page-5-page',
							'search-container-get-page-6-page',
							'search-container-get-page-7-page',
							'search-container-get-page-8-page',
							'search-container-get-page-9-page',
						];
						createComponents(response, 'container-search-container-page', classList, 'component-read-search-page', 2);
					} 
				});
			}
		});
	}
	$('#target-invited-relationship-id').click(function () {
		$('#target-invited-relationship').removeAttr('checked');
	});
	$('.accept-confirm').click(function(){
		$('#options-invited-pop-up').attr('checked', true);
	});
	$('.logo-home').click(function (e) {
		e.preventDefault();
		$('#restart').val('off');
		$('#refresh-profile-photo-id').addClass('invisible-component');
		$('#alert-info-about-us-2').css({
			marginTop : '15px',
			marginBottom : '10px',
		});

		if ($('#current-video-id').val() != '') {
			if (document.getElementById($('#current-video-id').val())) {
				document.getElementById($('#current-video-id').val()).pause();
			}
		}
		$('#current-video-id').val('');
		$('#alert-info-about-us-2').addClass('invisible-component');
		$('#sugest_index_3').addClass('invisible-component');
		any_class = document.getElementsByClassName('post-loaded');
		$('#posts-following').val(0);
		$('#loading-finished').val('1');
		$('#current-video-id').val('');
		getvideo = document.getElementsByClassName('has-file');
	    for (var i = 0; i <= getvideo.length - 1; i++) {
		    id = getvideo[i].id;
		    //console.log(id);
		    $('#' + id).val('none');
	    }
		getvideo = document.getElementsByClassName('post-viewed');
	    for (var i = 0; i <= getvideo.length - 1; i++) {
		    id = getvideo[i].id;
		    $('#' + id).removeClass('post-viewed');
	    }
		getvideo = document.getElementsByClassName('getvideo');
	    for (var i = 0; i <= getvideo.length - 1; i++) {
		    id = getvideo[i].id;
		    $('#' + id).removeClass('getvideo');
	    }
		getvideo = document.getElementsByClassName('getcover');
	    for (var i = 0; i <= getvideo.length - 1; i++) {
		    id = getvideo[i].id;
		    $('#' + id).removeClass('getcover');
	    }
		for (var i = 0; i <= any_class.length - 1; i++) {
			any_id = any_class[i].id.split('_')[2];
			$('#' + any_class[i].id).addClass('invisible-post');
			//console.log(any_class[i].id + ' ' + any_id + ' ' + i);
			$('page-cover-post_' + any_id).attr('id', 'page-cover-post-' + i);
			$('#m_post_' + any_id).attr('id', 'm_post-' + i);
			$('#m_post_' + any_id).removeClass('post-loaded');
			$('#post_view_' + any_id).attr('id', 'post_view_' + i);
			$('#a-page-name-post_' + any_id).attr('id', 'a-page-name-post-' + i);
			$('#page-name-post_' + any_id).attr('id', 'page-name-post-' + i);
			$('#time-posted_' + any_id).attr('id', 'time-posted-' + i);
			$('#seguir-1_' + any_id).attr('id', 'seguir-1-' + i);
			$('#loader-id-icon-post_' + any_id).attr('id', 'loader-id-icon-post-' + i);
			$('#seguir-span_' + any_id).attr('id', 'seguir-span-' + i);
			$('#seguir-a_' + any_id).attr('id', 'seguir-a-' + i);
			$('#target-option-post_' + any_id).attr('id', 'target-option-post-' + i);
			$('#target-option-post-i_' + any_id).attr('id', 'target-option-post-i-' + i);
			$('#p-post_' + any_id).attr('id', 'p-post-' + i);
			$('#p-post-more_' + any_id).attr('id', 'p-post-more-' + i);
			$('#post-cover-post-index_' + any_id).attr('id', 'post-cover-post-index-' + i);
			$('#cover-post-index_' + any_id).attr('id', 'cover-post-index-' + i);
			$('#video-post_' + any_id).attr('id', 'video-post-' + i);
			$('#play_button_' + any_id).attr('id', 'play_button_' + i);
			$('#loader_icon_' + any_id).attr('id', 'loader_icon_' + i);
			$('#video_' + any_id).attr('id', 'video_' + i);
			$('#video-post-link_' + any_id).attr('id', 'video-post-link-' + i);
			$('#video-post-video-cover-container_' + any_id).attr('id', 'video-post-video-cover-container-' + i);
			$('#thumb_' + any_id).attr('id', 'thumb_' + i);
			$('#watch-video_' + any_id).attr('id', 'watch-video-' + i);
			$('#vid_' + any_id).val('');
			$('#vid_' + any_id).attr('id', 'vid-' + i);
			$('#vid-load_' + any_id).val('');
			$('#vid-load_' + any_id).attr('id', 'vid-load-' + i);
			$('#vid-cover-load_' + any_id).attr('id', 'vid-cover-load-' + i);
			$('#has-video_' + any_id).removeClass('has-file');
			$('#has-video_' + any_id).val('');
			$('#has-video_' + any_id).attr('id', 'has-video-' + i);
			$('#video-post-time_' + any_id).attr('id', 'video-post-time-' + i);
			$('#video-post-time-all_' + any_id).attr('id', 'video-post-time-all-' + i);
			$('#cover-post-load_' + any_id).val('');
			$('#cover-post-load_' + any_id).attr('id', 'cover-post-load-' + i);
			$('#insert-video_' + any_id).attr('id', 'insert-video-' + i);
			$('#video-just-clicked_' + any_id).attr('id', 'video-just-clicked-' + i);
			$('#likes-qtd_' + any_id).attr('id', 'likes-qtd-' + i);
			$('#comment_-post_' + any_id).attr('id', 'comment_-post-' + i);
			$('#loader-id-icon_' + any_id).attr('id', 'loader-id-icon-' + i);
			$('#reaction-id-a_' + any_id).attr('id', 'reaction-id-a-' + i);
			$('#off-id-i_' + any_id).attr('id', 'off-id-i-' + i);
			$('#comment_' + any_id).attr('id', 'comment-' + i);
			$('#comment_a_' + any_id).attr('id', 'comment_a-' + i);
			$('#comment_i_' + any_id).attr('id', 'comment_i-' + i);
			$('#savepost_' + any_id).attr('id', 'savepost-' + i);
			$('#savepost-a_' + any_id).attr('id', 'savepost-a-' + i);
			$('#savepost-i_' + any_id).attr('id', 'savepost-i-' + i);
			$('#savepost_' + any_id).attr('id', 'savepost-' + i);
			$('#comment-send_' + any_id).attr('id', 'comment-send-' + i);
			$('#comment-send-profile_' + any_id).attr('id', 'comment-send-profile-' + i);
			$('#comentario_' + any_id).attr('id', 'comentario-' + i);
			$('#comentario-a_' + any_id).attr('id', 'comentario-a-' + i);
			$('#comentario-i_' + any_id).attr('id', 'comentario-i-' + i);
			$('#comment-users-own_' + any_id).attr('id', 'comment-users-own-' + i);
			$('#comment-user-profile_' + any_id).attr('id', 'comment-user-profile-' + i);
			$('#comment-own_' + any_id).attr('id', 'comment-own-' + i);
			$('#comment-users_' + any_id).attr('id', 'comment-users-' + i);
			$('#user-identify-comment-feed_' + any_id).attr('id', 'user-identify-comment-feed-' + i);
			$('#loader_button_comment_' + any_id).attr('id', 'loader_button_comment-' + i);
			$('#comment-like-a_' + any_id).attr('id', 'comment-like-a-' + i);
			$('#comment-like-i_' + any_id).attr('id', 'comment-like-i-' + i);
			$('#vid_' + any_id).attr('id', 'vid-' + i);
			//$('#page-cover-post_' + any_id).attr('id', 'page-cover-post-' + i);
			//$('#page-cover-post_' + any_id).attr('id', 'page-cover-post-' + i);
			//$('#page-cover-post_' + any_id).attr('id', 'page-cover-post-' + i);
			//$('#' + any_class[i].id).addClass('invisible-component');
		}
		home_posts_assync();
		//$('#loading-finished').val('1');
	});
    $('#post-public-done').click(function () {
    	document.getElementById('target-loading-app').checked = true;
    });
	$('.seguir-page').click(function (e) {
		
		//seguir_page($('#page_ident').val(), e, 2);
	});
	$('#cancel-box-component-change').click(function(){
		$('#cover-done-profile-cover-choose-container').removeClass('invisible-component');
		$('#foto-view').addClass('invisible-component');
		document.getElementById('target-profile-cover').checked = false;
	});
	$('#close-cover-post-button').click(function(){
		document.getElementById('target-profile-cover').checked = false;
	});
	$('#file-id-profile').change(function(){
		any_id = document.getElementById('file-id-profile').src;
		url = URL.createObjectURL(this.files[0]);
		document.getElementById('foto-view-component').src = url;
		$('#foto-view').removeClass('invisible-component');
		$('#header-height-component-add-cover').addClass('invisible-component');
		$('#add-cover-profile').addClass('invisible-component');
		$('#cover-done-profile-cover-choose-container').addClass('invisible-component');
		$('#foto-view').removeClass('invisible-component');
		document.getElementById('target-profile-cover').checked = true;
		//console.log(url);
	});
	$('#cover-done-profile-cover-choose-id').click(function(){
		$('#file-id-profile').click();
	});
	$('.edit-option').click(function () {
		document.getElementById('target-option-post').checked = false;
	});
	$.ajax({
		url : '/header/button/',
		type : 'get',
		data : {},
		dataType : 'json',
		success: function (response) {
			$('#poupar-data-id').addClass(response.add);
			$('#poupar-data-id').text(response.text);
			if (response.remove) {
				$('#poupar-data-id').remove();
			} else {
				$('#poupar-data-id').removeClass(response.remove_class);
			}
			//console.log(response);
		}
	});
	$.ajax({
		url : '/page/auth/',
		type : 'get',
		data : {},
		dataType : 'json',
		success: function (response) {
			//console.log(response);
			$('#target-alert-post-denied-id').addClass(response.class);
			$('#page_denied').val(response.page);
		}
	});
	$('.relationship-type-item').click(function(e){
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
	if($('#ident-post-page').val()){
		any_id = document.getElementById('a-page-name-post_' + $('#ident-post-page').val()).href;
		any_id = any_id.split('/')[any_id.split('/').length - 1];
		$('#a-page-name-post_' + $('#ident-post-page').val()).attr('href', route + '/couple_page/' + any_id);
		
		$.ajax({
			url: '/posts/get/index/' + $('#ident-post-page').val(),
			type: 'get',
			data: {'id' : 0},
			dataType: 'json',
			success:function(response){
				//console.log(response);
				any_id = 'reacções';
				if (response.qtd_likes == 0) {
					$('#likes-qtd_' + response.id).text('');
				} else if (response.qtd_likes == 1) {
					$('#likes-qtd_' + response.id).text(response.likes + ' reacção');
				} else {
					$('#likes-qtd_' + response.id).text(response.likes + ' reacções');
				}
				

				if (response.qtd_likes == 0) {
					$('#comment_-post_' + response.id).text('');
				} else if (response.qtd_likes == 1) {
					$('#comment_-post_' + response.id).text(response.comment + ' comentário');
				} else {
					$('#comment_-post_' + response.id).text(response.comment + ' comentários');
				}
				
				$('#off-id-i_' + $('#ident-post-page').val()).addClass(response.add);
				$('#off-id-i_' + $('#ident-post-page').val()).removeClass(response.remove);
			}
		});	
		//alert('oii');
		$.ajax({
			url: '/posts/comments/' + $('#ident-post-page').val(),
			type: 'get',
			data: {'since' : $('#post_comment-qtd').val()},
			dataType: 'json',
			success:function(response){
				console.log(response);
				$.each(response, function(key, data){
					cont = $('#post_comment-qtd').val();
					$('#comment-users-' + cont).removeClass('invisible-component');
					$('#comment-users-' + cont).attr('id', 'comment-users_' + data.uuid);
					$('#description-comment-' + cont).text(data.comment);
					if (data.qtd_comment_reactions) {
						$('#reaction-id-comment-user-qtd-' + cont).text(data.qtd_comment_reactions);
					}
					if (data.ja_comment_reactions) {
						$('#reaction-id-comment-user-' + cont).addClass('fas');
						$('#reaction-id-comment-user-' + cont).removeClass('far');
						$('#reaction-id-comment-user-' + cont).addClass('liked');
					}
					$('#reaction-id-comment-user-qtd-' + cont).attr('id', 'reaction-id-comment-user-qtd_' + data.uuid);
					$('#description-comment-' + cont).attr('id', 'description-comment_' + data.uuid);
					$('#reaction-id-comment-user-' + cont).attr('id', 'reaction-id-comment-user_' + data.uuid);
					$('#comentario-reaction-post-' + cont).attr('id', 'comentario-reaction-post_' + data.uuid);
					any_id = '';
					if (data.apelido_comment != null) {
						any_id = data.apelido_comment;
					}
					$('#profille-img-commenter-' + cont).attr('src', route + '/css/uicons/user.png');
					$('#profille-img-commenter-' + cont).addClass('img-20 center');
					$('#profille-img-commenter-' + cont).removeClass('img-full');
					if (data.tipo_verify == 1) {
						$('#link-ident-commenter-' + cont).attr('href', route + '/profile/' + data.uuid_dono_comment);
						if (data.foto_comment) {
							$('#profille-img-commenter-' + cont).attr('src', route + '/storage/img/users/' + data.foto_comment);
							$('#profille-img-commenter-' + cont).removeClass('img-20');
							$('#profille-img-commenter-' + cont).addClass('img-full');
						}
					} else if (data.tipo_verify == 2) {
						$('#link-ident-commenter-' + cont).attr('href', route + '/couple_page/' + data.uuid_dono_comment);
						if (data.foto_comment) {
							$('#profille-img-commenter-' + cont).attr('src', route + '/storage/img/page/' + data.foto_comment);
							$('#profille-img-commenter-' + cont).removeClass('img-20');
							$('#profille-img-commenter-' + cont).addClass('img-full');
						}
					}
					$('#link-ident-commenter-' + cont).attr('id', 'link-ident-commenter_' + data.uuid);
					$('#user-commenter-' + cont).text(data.nome_comment + ' ' + any_id);
					$('#user-commenter-' + cont).attr('id', 'user-commenter_' + data.uuid);
					
					$('#profille-img-commenter-' + cont).attr('id', 'profille-img-commenter_' + data.uuid);
					cont--;
					$('#post_comment-qtd').val(data.comment_id);		
					if (response.length < 1) {
						$('#post_comment-verify').val(null);
					}
				});
				$('#loaded-initial-comments').val('ok');
			}
		});	
		$.ajax({
			url: '/posts/index/cover_commenter/' + $('#ident-post-page').val(),
			type: 'get',
			data: {},
			dataType: 'json',
			success:function(response){
				//console.log(response);
				if (response.foto) {
					$('#comment-send-profile_' + $('#ident-post-page').val()).addClass('img-full');
					$('#comment-send-profile_' + $('#ident-post-page').val()).removeClass('img-24');
					$('#comment-send-profile_' + $('#ident-post-page').val()).attr('src', route + response.foto);
				} else {
					$('#comment-send-profile_' + $('#ident-post-page').val()).attr('src', route + '/css/uicons/user.png')
				}
				
				$('#comment-send-profile_' + $('#ident-post-page').val()).removeClass('invisible-component');
			}
		});	
	}
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
		$('#text-profile-icon-profile').attr('src', route + '/css/uicons/text.png');
		any_class = document.getElementsByClassName('video-page-component');
		profile_content_filter(any_class, 1);
		if ($('#cover-loaded-profile-read').val() == 0) {
			$.ajax({
				url: '/get_nine_images_perfil',
				type: 'get',
				data: {'id' : 0, 'ident': $('#ident-profile-id').val()},
				dataType: 'json',
				success:function(response){
					//console.log(response);
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
		$('#text-profile-icon-profile').attr('src', route + '/css/uicons/text.png');
		$('#component-loaded-profile-read').val(2);
		any_class = document.getElementsByClassName('cover-page-component');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('get-page-text');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('video-page-component');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#' + any_class[i].id).removeClass('invisible-component');
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
				//console.log(response);
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
					//console.log(response);
					if (ident == 1) {
						$('#qtd-posts').text(response.qtd);
					}
					if (ident == 3) {
						//console.log(response.qtd);
						$('#qtd-followers').text(response.qtd);
						if (response.qtd == 1) {
							$('#title-header-component-statistics').text(response.qtd + ' seguidor');
						} else {
							$('#title-header-component-statistics').text(response.qtd + ' seguidores');
						}
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
			data: {'id' : 0, 'ident': $('#ident-profile-id').val()},
			dataType: 'json',
			success:function(response){
				//console.log(response);
				$.each(response, function(key, data){
					if (data.formato_id == 1) {
						$('#img-post-page-' + key).addClass('invisible-component');
						document.getElementById('video-post-page-' + key).preload = 'metadata';
						$('#img-post-video-component-cover-' + key).attr('src', route + '/storage/img/thumbs/' + data.thumbnail);
						$('#video-post-page-' + key).removeClass('invisible-component');
						$('#video-post-page-' + key).addClass('video-page-component');
					}
					$('#a-post-component-' + key).attr('href', route + '/post_index/' + data.uuid);
					$('#a-post-component-' + key).attr('id', 'a-post-component_' + data.uuid);
					$('#img-post-video-component-cover-' + key).attr('id', 'img-post-video-component-cover_' + data.uuid);
				});
				$('#video-loaded-profile-read').val(1);
				if (true) {
					$('#video-profile-icon-profile').attr('src', route + '/css/uicons/video_profile_liked.png');
				}
			}
		});
	}
	$('.cover-posts-component-page').click(function (e) {
		$('#control-state-posts').val(0);
		any_class = document.getElementsByClassName('get-page-video');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('get-page-video');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).addClass('invisible-component');
		}
		any_class = document.getElementsByClassName('get-page-text');
		for (var i = 0; i <= any_class.length - 1; i++) {
			$('#'+ any_class[i].id).addClass('invisible-component');
		}
		$.ajax({
			url: '/page/pictures/',
			type: 'get',
			data: {'id' : 0, 'uuid' : $('#page_ident').val()},
			dataType: 'json',
			success:function(response){
				//console.log('hipocrisia');
				//console.log(response);
				$.each(response, function(key, data){
					$('#last-post-page-img').val(data.post_id);
					$('#post-img-post-container-page-' + key).attr('src', route + '/storage/img/page/' + data.file)
					$('#post-img-post-container-page-' + key).attr('id', 'post-img-post-container-page_' + data.uuid);
					$('#post-img-container-page-link-' + key).attr('href', route + '/post_index/' + data.uuid)
					$('#post-img-container-page-link-' + key).attr('id', 'post-img-container-page-link_' + data.uuid);
					$('#post-img-container-page-' + key).removeClass('invisible-component');
					$('#post-img-container-page-' + key).addClass('get-page-img');
					$('#post-img-container-page-' + key).attr('id', 'post-img-container-page_' + data.uuid);
					
					$('#component-key-page-img').val(key + 1);
				});
				$('#control-state-posts').val(1);
			}
		});	
		$('#control-type-state-posts-checked').val(1);	
	});
	$('.video-posts-component-page').click(function (e) {
		$('#control-state-posts').val(1);
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
					$('#last-post-page-video').val(data.post_id);
				});
			}
		});	*/	

		$('#control-type-state-posts-checked').val(0);
	});
	$.ajax({
		url: '/app/notifications/numbers',
		type: 'get',
		data: {},
		dataType: 'json',
		success:function(response){
			//console.log(response);
			if (response.not_numbers > 0) {
				//alert(response.not_numbers);
				$('#number-notification-component').removeClass('invisible-component');
				$('#number-notification-id').text(response.not_numbers);
				$('#number-notification-component-footer').removeClass('invisible-component');
				$('#number-notification-id-footer').text(response.not_numbers);
			}
		}
	});
	$('#text-posts-component').click(function () {
		$('#control-state-posts').val(3);
		$('#text-profile-icon-profile').attr('src', route + '/css/uicons/text_checked.png');
		$('#img-profile-icon-profile').attr('src', route + '/css/uicons/images.png');
		$('#video-profile-icon-profile').attr('src', route + '/css/uicons/video_liked.png');

		for (var i = 0; i <= document.getElementsByClassName('get-page-video').length - 1; i++) {
			document.getElementsByClassName('get-page-video')[i].classList.add('invisible-component');
		}

		for (var i = 0; i <= document.getElementsByClassName('get-page-img').length - 1; i++) {
			document.getElementsByClassName('get-page-img')[i].classList.add('invisible-component');
		}

		for (var i = 0; i <= document.getElementsByClassName('get-page-text').length - 1; i++) {
			document.getElementsByClassName('get-page-text')[i].classList.remove('invisible-component');
		}
		$.ajax({
			url: '/page/text/',
			type: 'get',
			data: {'uuid' : $('#page_ident').val(), 'id' : 0},
			dataType: 'json',
			success:function(response){
				console.log(response);
				$.each(response, function(key, data) {
					$('#page-post-content-page-p-' + key).text(data.descricao);
					$('#text-posts-component-' + key).removeClass('invisible-component');
					$('#text-posts-component-' + key).addClass('get-page-text');
					$('#page-post-content-page-name-' + key).text(data.nome);
					$('#page-post-content-page-name-a-' + key).attr('href', route + '/couple_page/' + data.uuid_page);
					if (data.foto) {
						$('#page-cover-post-cover-img-' + key).attr('src', route + '/storage/img/page/' + data.foto);
					} else {
						$('#page-cover-post-cover-img-' + key).attr('src', route + '/css/uicons/page_icon.jpg');
					}
					$('#page-post-content-page-date-' + key).text(data.created_at);
					$('#text-posts-component-a-' + key).attr('href', route + '/post_index/' + data.uuid);
					$('#text-posts-component-' + key).attr('id', 'text-posts-component_' + data.uuid);
					$('#text-posts-component-a-' + key).attr('id', 'text-posts-component-a_' + data.uuid);
					$('#page-post-content-page-date-' + key).attr('id', 'page-post-content-page-date_' + data.uuid);
					$('#page-cover-post-cover-img-' + key).attr('id', 'page-cover-post-cover-img_' + data.uuid);
					$('#page-post-content-page-name-a-' + key).attr('id', 'page-post-content-page-name-a_' + data.uuid);
					$('#text-posts-component-' + key).attr('id', 'text-posts-component_' + data.uuid);
					$('#page-post-content-page-p-' + key).attr('id', 'page-post-content-page-p_' + data.uuid);
				});
			}
		});	
	});
	$('#alert-description').click(function(){
	   	//alert('oi');
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
			//console.log(response);
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
		console.log($('#name-page-text-choosed').val());
		if ($('#name-page-text-choosed').val() != '' 
			&& $('#name-page-text-choosed').val() != ' '
			&& $('#name-page-text-choosed').val() != '  '
			&& $('#name-page-text-choosed').val() != '   '
			&& $('#name-page-text-choosed').val() != '    '
			&& $('#name-page-text-choosed').val() != '     '
			&& $('#name-page-text-choosed').val() != '      '
			&& $('#name-page-text-choosed').val() != '       '
			&& $('#name-page-text-choosed').val() != '        '
			&& $('#name-page-text-choosed').val().length > 1) {
			document.getElementById('assumir-now-relationship').classList.remove('invisible-component');
			$('#name-invited-page-home').val($('#name-page-text-choosed').val());
		} else {
			$('#assumir-now-relationship').addClass('invisible-component');
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
				//console.log(response);
				any_class = document.getElementsByClassName('a-result-search');
				if (response.state) {
					$.each(response.search, function(key, data){
						//console.log(data.nome);
						any_id = data.uuid;
						components = [
							'#assumir-item_' + any_id, 
							'#name-search-data_' + any_id,
							'#a-result-search_' + any_id,
							'#assumir-item-text_' + any_id
						];
						empty(any_class, components);
						$('#assumir-item-' + key).removeClass('invisible-component');
						$('#name-search-data-' + key).text(data.nome + ' ' + data.apelido);
						$('#cover-result-search-component-' + key).removeClass('invisible-component');
						$('#name-search-data-' + key).attr('id', 'name-search-data_' + data.uuid);
						$('#assumir-item-' + key).attr('id', 'assumir-item_' + data.uuid);
						$('#a-result-search-' + key).removeClass('invisible-component');
						$('#assumir-item-text-' + key).attr('id', 'assumir-item-text_' + data.uuid);
						$('#cover-result-search-component-' + key).attr('id', 'cover-result-search-component_' + data.uuid);
						$('#cover-result-search-component-img-' + key).attr('id', 'cover-result-search-component-img_' + data.uuid);
						$('#a-result-search-' + key).addClass('a-result-search');
						$('#a-result-search-' + key).attr('id', 'a-result-search_' + data.uuid);
					});					
				} else {
					$('#a-result-search-0').removeClass('invisible-component');
					$('#cover-result-search-component-0').addClass('invisible-component');
					$('#name-search-data-0').text('Parece que não existe um usuário semelhante a este nome ou apelido');
					$('#assumir-item-0').addClass('invisible-component');
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
				$('#refresh-profile-photo-id').remove();
        	} else {
				$('#user-account-container-img-id').addClass('no-img');
				$('#refresh-profile-photo-id').removeClass('invisible-component');
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
							//console.log(response);
							$('#data-profile-' + i).text(response.data);
							if (i == 1) {
								if (response.data == 1) {
									$('#title-header-component-statistics').text(response.data + ' reacção');
								} else {
									$('#title-header-component-statistics').text(response.data + ' reacções');
								}
							}
						}
					});
				}
				$.ajax({
					url: '/profile/maritalstatus',
					type: 'get',
					data: {'id': $('#ident-profile-id').val(), 'genre' : $('#ident-genre').val()},
					dataType: 'json',
					success: function (response) {
						//console.log(response);
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
						//console.log(response);
						if (response.reject) {
							$('#btn-profile-redirect').attr('href', route + '' + response.reject);
						}
						if (response.relationship) {
							$('#relationship-selected-type-profile').text(response[0].relationship + ' ');
							$('#spouse-profile').text(response[0].spouse_name + ' ' + response[0].spouse_apelido);
							$('#spouse-profile').attr('href', route + '/profile/' + response[0].spouse_uuid);							
						} else {
							$('#inform-profile-detail-couple').addClass('invisible-component');
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
    	$('#home-icon-footer-a').addClass('logo-home');
    	$('#home-icon-footer').attr('src', route + '/css/uicons/home_focus.png');
    	$('#home-icon-footer').addClass('logo-home');
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
		    			} else if (data.formato_id == 1) {
		    				//$('#li-component-stories-cover-video-' + key).attr('src', route + "/storage/img/thumbs/" + data.thumbnail);
		    				$('#li-component-stories-img-back-' + key).attr('src', route + "/storage/img/thumbs/" + data.thumbnail);
		    				/*if (data.page_foto != null) {
				    			$('#li-component-stories-cover-video-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
				    		}
				    		if (window.innerWidth > 540 && key < 5) {
				    			document.getElementById('li-component-stories-video-post-' + key).preload = 'metadata';
				    			$('#li-component-stories-video-post-' + key).attr('src', route + "/storage/video/page/" + data.file);
				    		}*/

		    				$('#li-component-stories-video-post-' + key).removeClass('invisible');
		    				$('#li-component-stories-cover-video-' + key).removeClass('invisible-component');
		    			}
		    			$('#li-component-stories-img-back-' + key).removeClass('invisible');	
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
		    $('#m_post-' + key).addClass('post-loaded');
		    $('#vid-load-' + key).attr('id', 'vid-load_' + data.uuid);
		   	$('#p-post-' + key).text(data.descricao);
		   	if (data.descricao) {
		   		$('#p-post-' + key).removeClass('invisible-component');
		   	}	
		   	any_id = '';
		    for (var i = 0; i <= data.descricao.length - 1; i++) {
				if (data.descricao[i] == '\n') {
					any_id = any_id + '<br>' + data.descricao[i];
				} else {
					any_id = any_id + '' + data.descricao[i];
				}
			}
		    $('#p-post-more-' + key).val(any_id);
		    any_id = '';
		    if (data.descricao.length >= 50) {
			    for (var i = 0; i <= 50; i++) {
			    	if (data.descricao[i] == '\n') {
			    		any_id = any_id + '<br>' + data.descricao[i];
			    	} else {
			    		any_id = any_id + '' + data.descricao[i];
			    	}
			    }	
			    any_id = any_id + '... <a class="see-full-text-post" id="a-p-more_' + data.uuid + '"> Ver mais</a>';
		   		$('#p-post-' + key).addClass('see-full-text-post');	    	
		    } else {
		    	any_id = $('#p-post-more-' + key).val();
		    }
		    $('#p-post-' + key).html(any_id);
    		$('#page-cover-post-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		    if (data.page_foto != null) {
		    	$('#page-cover-post-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
    		}
		    $('#p-post-more-' + key).attr('id', 'p-post-more_' + data.uuid);
		    if (data.formato_id == 3) {
		   		$('#post-cover-post-index-' + key).addClass('invisible-component');
		    	$('#post-cover-post-index-' + key).addClass('invisible-component');
		   		$('#video-post-' + key).addClass('invisible-component');
		    }
		    $('#loader_button_' + key).addClass('invisible-component');
			$('#has-video-' + key).val('');
			$('#has-video-' + key).addClass('has-file');
			$('#has-video-' + key).attr('id', 'has-video_' + data.uuid);
		    if (data.formato_id == 1) {
		    	$('#thumb_' + key).attr('src', route + '/storage/img/thumbs/' + data.thumbnail);
		    	$('#thumb_' + key).attr('id', 'thumb_' + data.uuid);
		    	$('#vid-cover-load-' + key).val(route + '/storage/img/thumbs/' + data.thumbnail);
		    	$('#vid-cover-load-' + key).attr('id', route + 'vid-cover-load_' + data.uuid);
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
			    $('#video-post-video-cover-container-' + key).attr('id', 'video-post-video-cover-container_' + data.uuid);
		    	$('#play_button_' + key).removeClass('invisible-component');
		    	$('#loader_button_' + key).attr('id', 'loader_button_' + data.uuid);
		    	$('#play_button_' + key).attr('id', 'play_button_' + data.uuid);
		    	$('#video-just-clicked-' + key).attr('id', 'video-just-clicked_' + data.uuid);
		    	$('#video-post-time-' + key).attr('id', 'video-post-time-' + data.uuid);
		    	$('#video-post-time-all-' + key).attr('id', 'video-post-time-all-' + data.uuid);
		    	$('#insert-video-' + key).attr('id', 'insert-video_' + data.uuid);
		    	$('#loader_icon_' + key).addClass('invisible-component');
		    	$('#loader_icon_' + key).attr('id', 'loader_icon_' + data.uuid);
		    }
		    if (data.formato_id == 2) {
		   		$('#post-cover-post-index-' + key).addClass('post-cover-imgless');
		    	$('#video-post-' + key).addClass('invisible-component');
		    	if (key == 0) {
		    		//$('#cover-post-index-' + key).attr('src', route + "/storage/img/page/" + data.file);
		    		//$('#post-cover-post-index-' + key).removeClass('post-cover-imgless');
		    	}
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
			$('#restart').val('on');
			$('#posts').val(1);
			$('#m_post-145').addClass('invisible-component');
		   	$('#m_post-144').addClass('invisible-component');
		   	document.getElementById('target-loading-app-load').checked = false;
    	}
    }
    $('.hidden-post').click(function(){
    	$('#m_post_' + $('#ident-key').val()).addClass('invisible-component');
    	$.ajax({
		    url: '/view/',
		    type: 'get',
		    data: {'id' : $('#ident-key').val(), 'video_add' : false},
		    dataType: 'json',
		    success:function(response){
		    	//console.log(response);
		    }
		});
    	document.getElementById('target-option-post').checked = false;
    });
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
				//console.log(response);
				$.each(response, function(key, data){
					$('#last-post-page-video').val(data.post_id);
					$('#a-video-page-target-' + key).attr('href', route + '/post_index/' + data.uuid);
					$('#a-video-page-target-' + key).attr('id', 'a-video-page-target_' + data.uuid);
					$('#post-video-container-page-video-' + key).attr('src', route + '/storage/img/thumbs/' + data.thumbnail);
					$('#post-video-container-page-' + key).removeClass('invisible-component');
					$('#post-video-container-page-' + key).addClass('get-page-video');
					$('#post-video-container-page-' + key).attr('id', 'post-video-container-page_' + data.uuid);
					$('#post-video-container-page-video-' + key).attr('id', 'post-video-container-page-video_' + data.uuid);
					$('#control-state-posts').val(1);
					$('#component-key-page-video').val(key + 1);
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
				//console.log('spouses');
				console.log(response);
				if (response.state) {
					$('#spouse-masc').text(response.homem);
					$('#spouse-fem').text(response.mulher);
					$('#spouse-fem').attr('href', route + '/profile/' + response.woman_uuid);
					$('#spouse-masc').attr('href', route + '/profile/' + response.man_uuid);
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
   	$('.seguir-page-a').click(function (e) {
   		e.preventDefault();
   		id = e.target.id.split('_')[1];
   		seguir_page(id, e, 2);
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
		        		$('#li-component-suggest-' + key).attr('id', 'li-component-suggest_' + data.uuid);
		        		$('#seguir-index-mobile-' + key).attr('id', 'seguir-index-mobile_' + data.uuid);
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
		        		$('#following-page-aside-' + key).attr('id', 'following-page-aside_' + data.uuid);
		        		$('#li-component-sugest-' + key).addClass('seguir-a-class_' + data.uuid);
		        		$('#li-component-sugest-' + key).removeClass('invisible-component');
		        		$('#li-component-sugest-' + key).attr('id', 'li-component-sugest_' + data.uuid);
		        	});
		        }
		    });
	    }    	
    }
    cont = 0;
    var top_video;
    let id_video;
    let link_video;
    let getvideo;
    let post_view;
    let offset_post;
    function videos(id){
    }
    setInterval(function (e) {
    	if ($('#home-page-checked').val()) {
	    	if ($('#current-video-id').val() != '') {
	            let id_video = $('#current-video-id').val().split('_');
	            let size_id_video = id_video.length;
	            let id_video_final = id_video[size_id_video - 1];
	            if (document.getElementById('video_' + id_video_final).paused) {
	                if (document.getElementById('play_button_' + id_video_final)) {
	                    document.getElementById('play_button_' + id_video_final).classList.remove('invisible-component');
	            	} else if (document.getElementById('playbutton_' + id_video_final)) {
	                    document.getElementById('playbutton_' + id_video_final).classList.remove('invisible-component');
	                }
	            }
	           /*let state_ = $("#video_" + id_video_final)[0].paused != true &&
	            !$("#video_" + id_video_final)[0].seeking &&
	            $("#video_" + id_video_final)[0].currentTime > 0 &&
	            $("#video_" + id_video_final)[0].readyState >= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA;
	            console.log(id_video_final + ' ' + state_);
	            console.log('paused ' + $("#video_" + id_video_final)[0].paused);
	            console.log('.HAVE_FUTURE_DATA ' + $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA);
	            console.log('readyState ' + $("#video_" + id_video_final)[0].readyState);
	            console.log('seeking ' + $("#video_" + id_video_final)[0].seeking);
	            console.log('currentTime ' + $("#video_" + id_video_final)[0].currentTime);*/
	            if ($("#video_" + id_video_final)[0].paused != true &&
	                !$("#video_" + id_video_final)[0].seeking &&
	                $("#video_" + id_video_final)[0].currentTime > 0 &&
	                $("#video_" + id_video_final)[0].readyState >= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA) {
	                    $("#loader_icon_" + id_video_final).addClass('invisible-component');
	            	} else {
	                    if ($("#video_" + id_video_final)[0].readyState <= $("#video_" + id_video_final)[0].HAVE_FUTURE_DATA){
	                        $("#loader_icon_" + id_video_final).removeClass('invisible-component');
	                    }
	                }
	        }
    	}

    	if ($('#restart').val() == 'on') {
		    getvideo = document.getElementsByClassName('getvideo');
		    for (var i = 0; i <= getvideo.length - 1; i++) {
			    id = getvideo[i].id.split('_')[2];
			    if (document.getElementById('video_' + id)) {
				    if (document.getElementById('video_' + id).readyState == 4) {
				  		$('#vid-load_' + id).val('ready');  	
				  		$('#loader_button_' + id).addClass('invisible-component');
				    } 			    	
			    }
				if ($('#vid-load_' + id).val() == 'ready') {
					$('#loader_button_' + id).addClass('invisible-component');	
				}
		    } 
		    getcover = document.getElementsByClassName('getcover');
		    for (var i = 0; i <= getcover.length - 1; i++) {
			    id = getcover[i].id.split('_')[2];
			    if (window.innerHeight > 650) {
			    	//console.log($('#m_post_' + id).offset().top);
		    		if ($('#m_post_' + id).offset().top < 720 && $('#has-video_' + id).val() != 'ok') {
			    		$('#cover-post-index_' + id).attr('src', $('#cover-post-load_' + id).val());
			    		$('#post-cover-post-index_' + id).removeClass('post-cover-imgless');
			    		$('#post-cover-post-index_' + id).removeClass('invisible-component');
			    		$('#cover-post-index_' + id).removeClass('invisible-component');
			    		//console.log('entrou ' + id);
			    		$('#has-video_' + id).val('ok');
			    	}
		    	} else {
					if ($('#m_post_' + id).offset().top < 510 && $('#has-video_' + id).val() != 'ok') {
						$('#cover-post-index_' + id).attr('src', $('#cover-post-load_' + id).val());
			    		$('#post-cover-post-index_' + id).removeClass('post-cover-imgless');
			    		$('#post-cover-post-index_' + id).removeClass('invisible-component');
			    		$('#cover-post-index_' + id).removeClass('invisible-component');
			    		console.log('entrou ' + id);
						$('#has-video_' + id).val('ok');
					}
		    	}
		    }   		
    	}

    }, 1000);
    setInterval(function (e) {
    	let main = $('.main-container').offset();
    	let document_height = $('#main-home').height();
    	let final = ($(window).height()) - main.top;
    	let document_height_general = $('.main-container').height();
    	cont = parseInt($('#posts-following').val());
    	
    	//console.log($('#single-page-container-body').height() + " " + component_single_page + ' ' + document_height_general);

    	if ((final + 100 >= document_height) && (parseInt($('#loading-finished').val()) == 0)) {
    		$('#loading-finished').val('1');
    		
    		if ($('#restart').val() == 'on') {
    			home_posts_assync();
    		}
    	}

    	//console.log('final ' + final + ' ' + document_height_general);
    	if (final + 70 >= document_height_general) {
    		
    		if ($('#comment_index').val() && $('#loaded-initial-comments').val() == 'ok') {
    			//console.log('final ' + $('#post_comment-qtd').val());
    			$.ajax({
					url: '/posts/comments/' + $('#ident-post-page').val(),
					type: 'get',
					data: {'since' : $('#post_comment-qtd').val()},
					dataType: 'json',
					success:function(response){
						console.log(response);
						if (response.length < 1) {
							$('#post_comment-verify').val(null);
						}
						$.each(response, function(key, data){
							cont = $('#post_comment-qtd').val();
							$('#comment-users-' + cont).removeClass('invisible-component');
							$('#comment-users-' + cont).attr('id', 'comment-users_' + data.uuid);
							$('#description-comment-' + cont).text(data.comment);
							$('#description-comment-' + cont).attr('id', 'description-comment_' + data.uuid);
							//console.log('#comentario-reaction-post-' + cont);
							$('#reaction-id-comment-user-' + cont).attr('id', 'reaction-id-comment-user_' + data.uuid);
							$('#comentario-reaction-post-' + cont).attr('id', 'comentario-reaction-post_' + data.uuid);
							any_id = '';
							if (data.apelido_comment != null) {
								any_id = data.apelido_comment;
							}
							$('#profille-img-commenter-' + cont).attr('src', route + '/css/uicons/user.png');
							$('#profille-img-commenter-' + cont).addClass('img-20 center');
							$('#profille-img-commenter-' + cont).removeClass('img-full');
							if (data.tipo_verify == 1) {
								$('#link-ident-commenter-' + cont).attr('href', route + '/profile/' + data.uuid_dono_comment);
								if (data.foto_comment) {
									$('#profille-img-commenter-' + cont).attr('src', route + '/storage/img/users/' + data.foto_comment);
									$('#profille-img-commenter-' + cont).removeClass('img-20');
									$('#profille-img-commenter-' + cont).addClass('img-full');
								}
							} else if (data.tipo_verify == 2) {
								$('#link-ident-commenter-' + cont).attr('href', route + '/couple_page/' + data.uuid_dono_comment);
								if (data.foto_comment) {
									$('#profille-img-commenter-' + cont).attr('src', route + '/storage/img/page/' + data.foto_comment);
									$('#profille-img-commenter-' + cont).removeClass('img-20');
									$('#profille-img-commenter-' + cont).addClass('img-full');
								}
							}
							$('#link-ident-commenter-' + cont).attr('id', 'link-ident-commenter_' + data.uuid);
							$('#user-commenter-' + cont).text(data.nome_comment + ' ' + any_id);
							$('#user-commenter-' + cont).attr('id', 'user-commenter_' + data.uuid);
							
							$('#profille-img-commenter-' + cont).attr('id', 'profille-img-commenter_' + data.uuid);
							cont--;
							$('#post_comment-qtd').val(data.comment_id);
						});
					}
				});	
    		}
    	}
    	//console.log(final);
    	//console.log(document_height_general);
    	if (final + 110 >= document_height_general && $('#control-state-posts').val() == 1) {
    		//console.log('final');
    		$('#control-state-posts').val(0);
    		if ($('#control-type-state-posts-checked').val() == 1) {
				url = '/page/pictures/';
				any_id = $('#last-post-page-img').val();
				type = 0;
				//console.log('component-key-page-img ' + $('#component-key-page-img').val());
    		} else if ($('#control-type-state-posts-checked').val() == 0){
				url = '/couple_page/page/content/videos/';
				any_id = parseInt($('#last-post-page-video').val());
				type = 1;
				//console.log('component-key-page-video ' + $('#component-key-page-video').val());
    		} else if($('#control-type-state-posts-checked').val() == 3){
				url = '/page/pictures/';
				type = 2;
    		}
    		 //console.log(url + ' ' + any_id);
    		$.ajax({
			url: url,
			type: 'get',
			data: {'id' : any_id, 'uuid' : $('#page_ident').val()},
			dataType: 'json',
			success:function(response){
				//console.log('hipocrisia');
				//console.log(response);
				$.each(response, function(key, data){
					if (type == 0) {
						$('#last-post-page-img').val(data.post_id);
						cont = parseInt($('#component-key-page-img').val());
						$('#post-img-post-container-page-' + cont).attr('src', route + '/storage/img/page/' + data.file)
						$('#post-img-post-container-page-' + cont).attr('id', 'post-img-post-container-page_' + data.uuid);
						$('#post-img-container-page-link-' + cont).attr('href', route + '/post_index/' + data.uuid)
						$('#post-img-container-page-link-' + cont).attr('id', 'post-img-container-page-link_' + data.uuid);
						$('#post-img-container-page-' + cont).removeClass('invisible-component');
						$('#post-img-container-page-' + cont).addClass('get-page-img');
						$('#post-img-container-page-' + cont).attr('id', 'post-img-container-page_' + data.uuid);	
						cont++;
						$('#component-key-page-img').val(cont);			
					} else if (type == 1) {
						cont = parseInt($('#component-key-page-video').val());
						$('#last-post-page-video').val(data.post_id);
						$('#a-video-page-target-' + cont).attr('href', route + '/post_index/' + data.uuid);
						$('#a-video-page-target-' + cont).attr('id', 'a-video-page-target_' + data.uuid);
						$('#post-video-container-page-video-' + cont).attr('src', route + '/storage/img/thumbs/' + data.thumbnail);
						$('#post-video-container-page-' + cont).removeClass('invisible-component');
						$('#post-video-container-page-' + cont).addClass('get-page-video');
						$('#post-video-container-page-' + cont).attr('id', 'post-video-container-page_' + data.uuid);
						$('#post-video-container-page-video-' + cont).attr('id', 'post-video-container-page-video_' + data.uuid);
						$('#control-state-posts').val(1);
						$('#component-key-page-video').val(key + 1);
						cont++;
						$('#component-key-page-video').val(cont);
					}

					$('#control-state-posts').val(1);
				});
				/*if (type == 0) {
					any_class = document.getElementsByClassName('get-page-video');
					for (var i = 0; i <= any_class.length - 1; i++) {
						$('#'+ any_class[i].id).addClass('invisible-component');
					}
					any_class = document.getElementsByClassName('get-page-img');
					for (var i = 0; i <= any_class.length - 1; i++) {
						$('#'+ any_class[i].id).removeClass('invisible-component');
					}
				}
				if (type == 1) {
					any_class = document.getElementsByClassName('get-page-video');
					for (var i = 0; i <= any_class.length - 1; i++) {
						$('#'+ any_class[i].id).removeClass('invisible-component');
					}
					any_class = document.getElementsByClassName('get-page-img');
					for (var i = 0; i <= any_class.length - 1; i++) {
						$('#'+ any_class[i].id).addClass('invisible-component');
					}
				}*/
			}
		});	
    	}
    	//alert('post_val ' + $('#posts').val());
    	if ($('#posts').val() == 1) {
    		if ($('#restart').val('on')) {
	            post_view = document.getElementsByClassName('post-viewed');
	            console.log()
	            for (var i = post_view.length - 1; i >= 0 ; i--) {
	                id = post_view[i].id.split('_')[2];
	                //console.log(id);
	                if (id) {
	                	//console.log(id);
			    		if ($('#m_post_' + id).offset().top < 400) {
	                		//console.log(id);
			    			$.ajax({
							    url: '/view/',
							    type: 'get',
							    data: {'id' : id, 'video_add' : false},
							    dataType: 'json',
							    success:function(response){
							    	
							    }
							});
							$('#m_post_' + id).removeClass('post-viewed');
				   		}	                	
	                }
	            }	
    		}
	    	getvideo = document.getElementsByClassName('getvideo');
	    	for (var i = 0; i <= getvideo.length - 1; i++) {
	    		id = getvideo[i].id.split('_')[2];
    			//console.log('vid_' + id);
    			if (id) {
    				//console.log('vid_' + id);
    				if (document.getElementById('vid_' + id)) {
    					link_video = document.getElementById('vid_' + id).value;
    				}
		    		if (window.innerHeight > 660) {
		    			if ($('#m_post_' + id).offset().top < 790 && $('#has-video_' + id).val() != 'ok') {
			    			//$('#video-post-link_' + id).attr('src', link_video);
			    			//document.getElementById('video_' + id).preload = 'metadata';
			    			//$('#video_' + id).attr('src', link_video);
			    			$('#has-video_' + id).val('ok');
			    			videos(id);
			    		}
		    		} else {
						if ($('#m_post_' + id).offset().top < 410 && $('#has-video_' + id).val() != 'ok') {
			    			//$('#video-post-link_' + id).attr('src', link_video);
			    			//$('#video_' + id).attr('src', link_video);
			    			$('#has-video_' + id).val('ok');
			    			videos(id);
							//console.log(("id = #" + id));
			    			//$("#loading-finished-video").val(id);
			    		}
		    		}
		    		if (document.getElementById('video_' + id)) {
			    		$('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
		                if (!(document.getElementById('video_' + id).paused)) {
		                    currentTime = document.getElementById('video_' + id).currentTime;
		                    duration = document.getElementById('video_' + id).duration;
		                    $('#video-post-time-' + id).val(currentTime);
		                    if ($('#insert-video_' + id).val() != 'saved') {
		                    	//console.log('s => ' + $('#insert-video_' + id).val());
		                    	//console.log('cT => ' + currentTime);
			                    if (currentTime >= (duration / 2) && currentTime >= 30) {
			                        watched_video = $('#watch-video-' + id).val();
			                        $.ajax({
									    url: '/view/',
									    type: 'get',
									    data: {'id' : id, 'video_add' : true},
									    dataType: 'json',
									    success:function(response){
									    	//console.log('insert-video_' + response.ident);
									    	document.getElementById('insert-video_' + response.ident).value = 'saved';
									    	//console.log('saved true ' + response.ident);
									    }
									});
			                    }                	
		                	}
		                }	
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
		    	//console.log(response);
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
    });
    function seguir_page(id, e, type){
    	$.ajax({
		    url: '/page/follow',
		    type: 'get',
		    data: {'uuid' : id},
		    dataType: 'json',
		    success:function(response){
		    	//console.log(response);
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
		    		if ($('#seguir-index-mobile_' + id).text() == "seguir") {
		    			$('#seguir-index-mobile_' + id).text('não seguir');
		    			$('#seguir-index-mobile_' + id).addClass('no-following');
		    		} else {
		    			$('#seguir-index-mobile_' + id).text('seguir');
		    			$('#seguir-index-mobile_' + id).removeClass('no-following');
		    		}    		
		    	}
		    }
    		
		});
    }
    let class_name;
    $('.seguir-a').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	alert(id);
    	$('#loader-id-icon-post_' + id).removeClass('invisible-component');
    	$('#loader-id-icon-post-index_' + id).removeClass('invisible-component');
    	//alert(id);
    	seguir_page(id, e, 1);
    	//alert();
    });
    $('.icon-back-container-label').click(function(){
    	//$('#loaded-item-ident').val('0');
    	$('#loaded-item-ident').val(0);
    	$('#loaded-initial-comments').val('none');
    	$('#single-page-container-body').empty();
    });
    $('.video-post-video').click(function (e) {
    	any_id = e.target.id.split('_')[1];
    	play_now(any_id);
    });
    $('.play_button').click(function (e) {
    	any_id = e.target.id.split('_')[2];
    	play_now(any_id);
    });
    function play_now(any_id) {
    	if ($('#video-just-clicked_' + any_id).val() != any_id) {
	    	link_video = document.getElementById('vid_' + any_id).value;
			$('#video-post-link_' + any_id).attr('src', link_video);
			document.getElementById('video_' + any_id).preload = 'metadata';
	    	$('#video_' + any_id).attr('src', link_video);
			$('#video_' + any_id).removeClass('invisible-component');
	    	$('#video-post-video-cover-container_' + any_id).addClass('invisible-component');
	    	$('#video-just-clicked_' + any_id).val(any_id);    		
    	}
    	if (document.getElementById('video_' + any_id).paused) {
			document.getElementById('video_' + any_id).play();
            document.getElementById('play_button_' + any_id).classList.add('invisible-component');
    	} else {
			document.getElementById('video_' + any_id).pause();
            document.getElementById('play_button_' + any_id).classList.remove('invisible-component');
    	}
	    
    	 $('#current-video-id').val('video_' + any_id);
    }
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
		    	//console.log(response);
		    	if (response.owner) {
		    		document.getElementById('user-identify-comment-feed_' + response.id).src = response.img_scr;
		    	}
		    	//console.log('#comment-post_' + response.id);
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
				//console.log(response);
				$('#reaction-id-comment-user_' + id).addClass(response.add);
				$('#reaction-id-comment-user-qtd_' + id).text(response.qtd_reactions);
				$.each(response.remove, function(key, data) {
					//console.log(data);
					$('#reaction-id-comment-user_' + id).removeClass(data);
				});
			}
		});
    });
    $('.target-options').click(function (e) {
    	any_id = e.target.id.split('_')[1];
		$('#ident-key').val(any_id);
    	$.ajax({
		    url: '/ismyne/',
		    type: 'get',
		    data: {'uuid' : any_id},
		    dataType: 'json',
		    success: function(response){
		    	//console.log(response);
				if (response.state) {
					$('#edit-option-component-id').removeClass('invisible-component');
					$('#edit-option-component-id').addClass('edit-option-component');
					$('#delete-option-component').removeClass('invisible-component');
					$('#delete-option-component-id').removeClass('invisible-component');
					$('#delete-option-component').addClass('delete-post-option-component');
					$('#delete-option-component-id').text('Apagar publicação');
					$('#edit-option-component-id').text('Editar');
					$('#delete-option-component').attr('id', 'delete-option-component_' + any_id);
					$('#delete-option-component-id').attr('id', 'delete-option-component-id_' + any_id);
					$('#edit-option-component-id').attr('id', 'edit-option-component-id_' + any_id);
					$('#edit-option-edit-component').attr('id', 'edit-option-edit-component_' + any_id);
				} else {
					$('#edit-option-component-id').removeClass('edit-option-component');
					$('#edit-option-component-id').addClass('invisible-component');	
					$('#delete-option-component').addClass('invisible-component');	
					$('#delete-option-component-id').addClass('invisible-component');
					$('#edit-option-component-id').text('');	
					$('#delete-option-component-id').text('');
				}
			}
		});
    });
    $('#cancel-options').click(function () {  
    	any_id = $('#ident-key').val(); 
        $('#edit-option-component-id_' + any_id).attr('id', 'edit-option-component-id');
    	$('#edit-option-edit-component_' + any_id).attr('id', 'edit-option-edit-component');
		$('#delete-option-component_' + any_id).attr('id', 'delete-option-component');
		$('#delete-option-component-id_' + any_id).attr('id', 'delete-option-component-id');	
    });
    $('.edit-option-component').click(function (e) {
    	any_id = e.target.id.split('_')[1];
    	$('#pass_post_uuid').val(any_id);
    	document.getElementById('name_page_edit_post').innerText = $('#page-name-post_' + any_id).text();
    	$('#message').text($('#p-post_' + any_id).text());
    	any_id = document.getElementById('page-cover-post_' + any_id).src;
    	component = document.createElement('img');
    	component.setAttribute('src', any_id);
    	component.classList.add('img-full');
    	component.classList.add('circle');
    	document.getElementById('foto-edit_id').append(component);
    	//$('#edit-option-component-id_' + any_id).attr('id', 'edit-option-component-id');
    	document.getElementById('target-option-post').checked = false;
    	document.getElementById('options-edit-pop-up').checked = true;
    	//alert(any_id);
    });
    $('.cover-done-edit').click(function(evt){
        evt.preventDefault();
        $.ajax({
          url: "/edit_post",
          type: 'get',
          data: {'uuid': $('#pass_post_uuid').val(), 'message': $('#message').val()},
          dataType: 'json',
          success:function(response){
          	$('#p-post_' + $('#pass_post_uuid').val()).text(response.description);
			$('#edit-option-component-id_' + $('#pass_post_uuid').val()).addClass('invisible-component');
			$('#edit-option-edit-component_' + $('#pass_post_uuid').val()).addClass('invisible-component');
			$('#delete-option-component_' + $('#pass_post_uuid').val()).addClass('invisible-component');
			$('#delete-option-component-id_' + $('#pass_post_uuid').val()).addClass('invisible-component');
          	document.getElementById('options-edit-pop-up').checked = false;
          	$('#p-post_' + $('#pass_post_uuid').val()).removeClass('invisible-component');
          	$('#message').val('');
          	$('#edit-option-component-id_' + $('#pass_post_uuid').val()).attr('id', 'edit-option-component-id');
    		$('#edit-option-edit-component_' + $('#pass_post_uuid').val()).attr('id', 'edit-option-edit-component');
			$('#delete-option-component_' + $('#pass_post_uuid').val()).attr('id', 'delete-option-component');
			$('#delete-option-component-id_' + $('#pass_post_uuid').val()).attr('id', 'delete-option-component-id');
          }
        });
    });
    $('.target-relationship-alert-assumir-menu-footer').click(function(){
    	document.getElementById('target-alert-tassumir').checked = true;
    });
    //$('#reaction-id-a-')
});
window.addEventListener('load', function () {
	if (document.getElementById('file-id')) {

	}
});
document.addEventListener('click', function (e) {
	let any_id;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[$('#host').val().split('/').length - 2];
	if (e.target.className.indexOf('get-page-text-a') > -1) {
		document.location.href = route + '/post_index/' + e.target.id.split('_')[1];
	}
	if (e.target.className.indexOf('alert-assumir-make-money-now') > -1) {
		document.getElementById('target-alert-make-tassumir').checked = true;
	}
	if (e.target.className.indexOf('assumir-now-pop-up') > -1) {
		document.getElementById('target-alert-tassumir').checked = true;
	}
	if (e.target.className.indexOf('no-pages-post') > -1) {
		e.preventDefault();
		document.getElementById('target-alert-post-denied').checked = true;
	}
	if (e.target.className.indexOf('see-full-text-post') > -1) {
		/*alert($('#p-post-more_' + e.target.id.split('_')[1]).val());
		alert(e.target.id.split('_')[1]);*/
		any_id = e.target.id.split('_')[1];
		component = $('#p-post_' + any_id).html();
		$('#p-post_' + any_id).html($('#p-post-more_' + any_id).val());
		$('#p-post-more_' + any_id).val(component);
	}
	if (e.target.className.indexOf('add-new-profile') > -1) {
		document.getElementById('target-profile-cover').checked = true;
	}
	
	if (e.target.className.indexOf('couple_page_redirect') > -1) {
		//alert('oi');
		document.location.href = route + '/couple_page/' + $('#page_denied').val() + '?add-post=true';
	}
		
	if (e.target.className.indexOf('a-btn-flw-edt') > -1) {
		e.preventDefault();
	}
	if (e.target.className.indexOf('multi-page') > -1) {
		document.location.href = route + '/my_pages/';
	}
	if (e.target.className.indexOf('relationship-type-item-selected') > -1) {
		any_id = e.target.id.split('_')[1];
		$.ajax({
			url : '/relationship/paymment/',
			type : 'get',
			data : {'ident' : any_id},
			dataType : 'json',
			success: function (response) {
				//console.log(response);
				$('#price-type-relationship').text('Kz ' + response.preco);
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
		$('#header-title-alert').text('Tassumir Mensagens');
		document.getElementsByClassName('target-relationship-alert-assumir-menu-footer')[0].classList.add('invisible-component');
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
		    	//console.log('responda ' + response.answer);
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
		    	//console.log(response);
		    	$('#btn_seguir').text(response.text);
		    	if (response.state) {
		    		$('#btn_seguir').removeClass('no-following');
		    	} else {
		    		$('#btn_seguir').addClass('no-following');
		    	}
		    }
    		
		});
    }
    if (e.target.className.indexOf('search-container-get-page-3-page') > -1) {
    	//alert(e.target.split('_')[1]);
    	document.location.href = '/couple_page/' + e.target.id.split('_')[1];
    }
    if (e.target.className.indexOf('search-container-get-3') > -1) {
    	//alert(e.target.split('_')[1]);
    	document.location.href = '/profile/' + e.target.id.split('_')[1];
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
		option_empty();
	}

	function option_empty(){
		document.getElementById('target-option-post').checked = false;
		any_id = $('#ident-key').val();
		$('#edit-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-edit-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-component-id_' + any_id).attr('id', 'edit-option-component-id');
		$('#edit-option-edit-component_' + any_id).attr('id', 'edit-option-edit-component');
		$('#delete-option-component_' + any_id).attr('id', 'delete-option-component');
		$('#delete-option-component-id_' + any_id).attr('id', 'delete-option-component-id');
		$('#ident-key').val('');
	}

	if (e.target.className.indexOf('pop-up-option') > -1) {
		e.preventDefault();
		document.getElementById('target-option-post').checked = false;
		any_id = $('#ident-key').val();
		$('#edit-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-edit-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-component-id_' + any_id).attr('id', 'edit-option-component-id');
		$('#edit-option-edit-component_' + any_id).attr('id', 'edit-option-edit-component');
		$('#delete-option-component_' + any_id).attr('id', 'delete-option-component');
		$('#delete-option-component-id_' + any_id).attr('id', 'delete-option-component-id');
		$('#ident-key').val('');
	}
	if (e.target.className.indexOf('delete-post-option-component') > -1 
		|| e.target.className.indexOf('delete_post') > -1 ) {
		e.preventDefault();
		any_id = e.target.id.split('_')[1];
		//alert(any_id);
		$.ajax({
			url: '/post/delete',
			type: 'get',
			dataType: 'json', 
			data: {id : any_id},
			success: function(response) {
				console.log(response);
				$('#m_post_' + any_id).addClass('invisible-component');
				option_empty();
			}
		});
	}
	if (e.target.className.indexOf('target-invited-relationship-close') > -1) {
		any_id = $('#ident-key').val();
		$('#edit-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-edit-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component_' + any_id).addClass('invisible-component');
		$('#delete-option-component-id_' + any_id).addClass('invisible-component');
		$('#edit-option-component-id_' + any_id).attr('id', 'edit-option-component-id');
		$('#edit-option-edit-component_' + any_id).attr('id', 'edit-option-edit-component');
		$('#delete-option-component_' + any_id).attr('id', 'delete-option-component');
		$('#delete-option-component-id_' + any_id).attr('id', 'delete-option-component-id');
		$('#ident-key').val('');
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
	if (e.target.className.indexOf('logo-home') > -1) {
		e.preventDefault();
	}
});