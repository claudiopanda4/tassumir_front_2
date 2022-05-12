$(document).ready(function () {
	let route = document.location.href.split('/');
	let route_root = route[0] + '//' + route[1] + route[2];
	//alert(route_root);
	var id, cont, height, top, height_component, final, any_class;
	var initialY, clientY;
	$('.play_button_tv').click(function (e) {
		id = e.target.id.split('_')[1];
		play_video(id);
	});
	$.ajax({
		url: '/user_photo/',
		type: 'get',
		data: {},
		dataType: 'json',
		success:function(response){
			$('#user-account-container-img-id').attr('src', response.photo);
			$('#user-account-container-img-id').removeClass('invisible-component');
			$('#user-account-container-img-id').addClass(response.add);
			$('#user-account-container-img-container').addClass('transparent-back');
		}
	});

	$('#main-component-main-tv-id').addClass('main-component-main-tv-hidden');
	//$("#nav-video-option-id").addClass('invisible-component');
	$("#header-main-component-1-tv").addClass('fixed-header-two');
	$("#header-main-component-2-tv").addClass('fixed-header-two');
	$('.comment-a-react').click(function (e) {
		e.preventDefault();
    	id = e.target.id.split('_')[1];
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
		    	if (response.state == 'like') {
		    		$('#' + e.target.id).attr('src', route_root + '/css/uicons/loved_tv.png');
		    	} else {
		    		$('#' + e.target.id).attr('src', route_root + '/css/uicons/love_tv.png');
		    	}
		    	//alert('#text-li-tv-icon-like_' + e.target.id.split('_')[1]);
		    	if (response.reactions) {
		    		$('#text-li-tv-icon-like_' + e.target.id.split('_')[1]).text(response.reactions);
		    	} else {
		    		$('#text-li-tv-icon-like_' + e.target.id.split('_')[1]).text('');
		    	}
		    }
    		
		});
    });
	function play_video (id) {
		if ($('#video-tv-clicked_' + id).val() == 0) {
			$('#video-component-video_' + id).attr('src', $('#video-tv-source_' + id).val());
			document.getElementById('video-component-video_' + id).addEventListener('loadeddata', function () {
				if (document.getElementById('video-component-video_' + id).paused) {
					document.getElementById('video-component-video_' + id).play();
				}
			});
			$('#video-component-video_' + id).removeClass('invisible-component');
			$('#loaded-video-play-tv').val(id);
			$('#play-button-tv_' + id).addClass('invisible-component');
			$('#thumb-video-tv_' + id).addClass('invisible-component');
			$('#video-component-video_' + id).addClass('video-play');
			$('#video-component-video_' + id).removeClass('height-minim-video-tv');
			$.ajax({
				url: '/view/',
				type: 'get',
				data: {'id' : id, 'video_add' : false},
				dataType: 'json',
				success:function(response){
				   $('#view-tv-save_' + id).val('on');
			    }
			});
			//$("#nav-video-option-id").addClass('invisible-component');
			$("#header-main-component-1-tv").addClass('fixed-header-two');
			$("#header-main-component-2-tv").addClass('fixed-header-two');
		}
	}
	document.getElementById('main-container-video-component').addEventListener("touchstart", function (e) {
		initialY = e.touches[0].clientY;
		//console.log(initialY);
	}, false);
	document.getElementById('main-container-video-component').addEventListener("touchmove", function (e) {
		clientY = e.touches[0].clientY;
		id = initialY - clientY;
		//console.log(id);
		if (id >= 10) {
			if ($('#margin-video-play-x-y').val() != 'up') {
				console.log('up');
				id = parseInt($('#margin-video-play-tv').val()) - 100 + 'vh';
				$('#main-container-video-component').css({
					marginTop : id,
				});	
				$('#margin-video-play-x-y').val('up');	
				$('#margin-video-play-tv').val(parseInt($('#margin-video-play-tv').val()) - 100);		
			}

		} else if (id <= 10) {
			if ($('#margin-video-play-x-y').val() != 'down') {
				console.log('down');
				id = parseInt($('#margin-video-play-tv').val()) + 100 + 'vh';
				$('#main-container-video-component').css({
					marginTop : id,
				});
				$('#margin-video-play-tv').val(parseInt($('#margin-video-play-tv').val()) + 100);
				$('#margin-video-play-x-y').val('down');	
			}
		}

		any_class = document.getElementsByClassName('video_loaded');
		for (var i = 0; i <= any_class.length - 1; i++) {
			id = any_class[i].id;
			//console.log('top id = ' + id.split('_')[1] + " " + $('#' + id).offset().top + ' ' + $('#' + id).height());
			//console.log('top = ' + (parseInt($('#' + id).offset().top) + parseInt($('#' + id).height())));
			if (parseInt($('#' + id).offset().top) <= 0 && $('#view-tv-save_' + id.split('_')[1]).val() != 'on') {
				//console.log(' id entrou = ' + id.split('_')[1]);
				id = id.split('_')[1];
				$.ajax({
					url: '/view/',
					type: 'get',
					data: {'id' : id, 'video_add' : false},
					dataType: 'json',
					success:function(response){
					   $('#view-tv-save_' + id).val('on');
				    }
				});
			}
		}

	}, false);
	function add_view (any_class, state) {
		for (var i = 0; i <= any_class.length - 1; i++) {
			id = any_class[i].id;
			//console.log('top id = ' + id.split('_')[1] + " " + $('#' + id).offset().top + ' ' + $('#' + id).height());
			//console.log('top = ' + (parseInt($('#' + id).offset().top) + parseInt($('#' + id).height())));
			if (parseInt($('#' + id).offset().top) <= 0 && $('#view-tv-save_' + id.split('_')[1]).val() != 'on') {
				//console.log(' id entrou = ' + id.split('_')[1]);
				id = id.split('_')[1];
				$.ajax({
					url: '/view/',
					type: 'get',
					data: {'id' : id, 'video_add' : false},
					dataType: 'json',
					success:function(response){
					   $('#view-tv-save_' + id).val('on');
				    }
				});
			}
		}
	}
	$('.thumb-video').click(function (e) {
		play_video(e.target.id.split('_')[1]);
	});
	id = route[route.length - 1];
	$.ajax({
		url: '/tv/' + id,
		type: 'get',
		dataType: 'json',
		data : {},
		success : function (response) {
			console.log(response);
			$.each(response, function (key, data) {
				cont = $('#last-component-id-tv').val();
				//alert(cont);
				if (data.reagi) {
					$('#reaction-id-comment-user-' + cont).attr('src', route_root + '/css/uicons/loved_tv.png');
				}
				$('#video-tv-source_' + cont).val(route_root + '/storage/video/page/' + data.file);
				$('#video-tv-source_' + cont).attr('id', 'video-tv-source_' + data.uuid);
				$('#comment-tv-post-' + cont).attr('id', 'comment-tv-post_' + data.uuid);
				$('#thumb-video-tv_' + cont).attr('src', route_root + '/storage/img/thumbs/' + data.thumbnail);
				$('#thumb-video-tv_' + cont).attr('id', 'thumb-video-tv_' + data.uuid);
				$('#play-button-tv_' + cont).attr('id', 'play-button-tv_' + data.uuid);
				$('#video-tv-clicked_' + cont).attr('id', 'video-tv-clicked_' + data.uuid);
				$('#video-component-video_' + cont).attr('id', 'video-component-video_' + data.uuid);
				$('#video-tv-container_' + cont).addClass('video_loaded');
				$('#video-tv-container_' + cont).removeClass('invisible-component');
				$('#video-tv-container_' + cont).attr('id', 'video-tv-container_' + data.uuid);
				if (data.qtd_reacoes > 0) {
					$('#text-li-tv-icon-like-' + cont).text(data.qtd_reacoes);
				}	
				$('#reaction-id-comment-user-' + cont).attr('id', 'reaction-id-comment-user_' + data.uuid);
				$('#comment_tv-post-vid-' + cont).attr('href', route_root + '/post_index/' + data.uuid);
				$('#comment_tv-post-vid-' + cont).attr('id', 'comment_tv-post-vid_' + data.uuid);
				$('#text-li-tv-icon-like-' + cont).attr('id', 'text-li-tv-icon-like_' + data.uuid);
				if (data.qtd_comment > 0) {
					$('#text-li-tv-icon-comment-' + cont).text(data.qtd_comment);
				}
				$('#text-li-tv-icon-comment-' + cont).attr('id', 'text-li-tv-icon-comment_' + data.uuid);
				$('#view-tv-save_' + cont).attr('id', 'view-tv-save_' + data.uuid);
				cont++;
				$('#last-component-id-tv').val(cont);
				$('#last-post-id-tv').val(data.post_id);
				$('#loaded-post-id-tv').val(1);
				//$('#video-component-video_' + id).removeClass('invisible-component');
			});

		}
	});

	setInterval(function(){
		height = $('#main-container-video');
		final = -parseInt($('#main-container-video-component').offset().top) - parseInt($('#main-container-video-component').height())  + parseInt(height_component);
		height_component = document.getElementsByClassName('video-tv-container')[0].offsetHeight;
		top = document.getElementById('main-container-video-component').offsetTop;
		if ($('#main-container-video-component').offset().top < 20) {
			//console.log('entrou');
			/*$('#main-component-main-tv-id').addClass('main-component-main-tv-hidden');
			$("#nav-video-option-id").addClass('invisible-component');
			$("#header-main-component-1-tv").addClass('fixed-header-two');
			$("#header-main-component-2-tv").addClass('fixed-header-two');*/
			//$('#main-container-video').addClass('main-container-tv');
			$('.video-tv-container').css({
				marginBottom : 0,
			});
		} else {
			$("#header-main-component-1-tv").removeClass('fixed-header-two');
			$("#header-main-component-2-tv").removeClass('fixed-header-two');
			//$("#nav-video-option-id").removeClass('invisible-component');
		}
		any_class = document.getElementsByClassName('video_loaded');
		id = 'video-component-video_' + $('#loaded-video-play-tv').val();
		if ($('#loaded-video-play-tv').val() != 'none') {
			//console.log($('#video-component-video_' + $('#loaded-video-play-tv').val()).offset().top + ' ' + $('#' + id).height());
			if ((($('#' + id).offset().top + $('#' + id).height()) < ($('#' + id).height() / 2) + 50 || ($('#' + id).offset().top > $('#' + id).height() / 2)) && document.getElementById('video-component-video_' + id.split('_')[1]).currentTime > 2) {
				id = id.split('_')[1];
				if (!document.getElementById('video-component-video_' + id).paused) {
					document.getElementById('video-component-video_' + id).pause();
				} else {
					$('#loaded-video-play-tv').val('none');
				}
			}
		}

		if (final > - 100) {
			id = route[route.length - 1];
			if ($('#loaded-post-id-tv').val() != 0) {
					$.ajax({
					url: '/tv/' + id,
					type: 'get',
					dataType: 'json',
					data : {},
					success : function (response) {
						console.log(response);
						$.each(response, function (key, data) {
							cont = $('#last-component-id-tv').val();
							//alert(cont);
							$('#reaction-id-comment-user-' + cont).attr('id', 'reaction-id-comment-user_' + data.uuid);
							$('#video-tv-source_' + cont).val(route_root + '/storage/video/page/' + data.file);
							$('#video-tv-source_' + cont).attr('id', 'video-tv-source_' + data.uuid);
							$('#comment-tv-post-' + cont).attr('id', 'comment-tv-post_' + data.uuid);
							$('#thumb-video-tv_' + cont).attr('src', route_root + '/storage/img/thumbs/' + data.thumbnail);
							$('#thumb-video-tv_' + cont).attr('id', 'thumb-video-tv_' + data.uuid);
							$('#play-button-tv_' + cont).attr('id', 'play-button-tv_' + data.uuid);
							$('#video-tv-clicked_' + cont).attr('id', 'video-tv-clicked_' + data.uuid);
							$('#video-component-video_' + cont).attr('id', 'video-component-video_' + data.uuid);
							$('#video-tv-container_' + cont).addClass('video_loaded');
							$('#video-tv-container_' + cont).removeClass('invisible-component');
							$('#video-tv-container_' + cont).attr('id', 'video-tv-container_' + data.uuid);
							$('#view-tv-save_' + cont).attr('id', 'view-tv-save_' + data.uuid);
							//$('#current-time-video-tv-clicked_' + cont).attr('id', 'current-time-video-tv-clicked_' + data.uuid);
							if (data.qtd_reacoes > 0) {
								$('#text-li-tv-icon-like-' + cont).text(data.qtd_reacoes);
							}
							$('#text-li-tv-icon-like-' + cont).attr('id', 'text-li-tv-icon-like_' + data.uuid);
							if (data.qtd_comment > 0) {
								$('#text-li-tv-icon-comment-' + cont).text(data.qtd_comment);
							}
							$('#text-li-tv-icon-comment-' + cont).attr('id', 'text-li-tv-icon-comment_' + data.uuid);
							cont++;
							$('#last-component-id-tv').val(cont);
							//$('#video-component-video_' + id).removeClass('invisible-component');
						});
					}
				});
			}

		}
		if ($('#loaded-video-play-tv').val() != 'none') {
			//console.log('ct = ' + document.getElementById('video-component-video_' + $('#loaded-video-play-tv').val()).currentTime + ' ' + document.getElementById('video-component-video_' + $('#loaded-video-play-tv').val()).duration);
			$('#current-time-video-tv-clicked').val(document.getElementById('video-component-video_' + $('#loaded-video-play-tv').val()).currentTime);	
			if ($('#current-time-video-tv-clicked').val() >= document.getElementById('video-component-video_' + $('#loaded-video-play-tv').val()).duration) {
				id = parseInt($('#margin-video-play-tv').val()) - 100 + 'vh';
				if (window.innerWidth <= 1280) {
					$('#main-container-video-component').css({
						marginTop : id,
					});					
				}
				$('#margin-video-play-tv').val(parseInt($('#margin-video-play-tv').val()) - 100);
				$('#margin-video-play-x-y').val('down');	
				$('#loaded-video-play-tv').val('none');
				any_class = document.getElementsByClassName('video_loaded');
				any_class = document.getElementsByClassName('video_loaded');
				for (var i = 0; i <= any_class.length - 1; i++) {
					id = any_class[i].id;
					//console.log('top id = ' + id.split('_')[1] + " " + $('#' + id).offset().top + ' ' + $('#' + id).height());
					//console.log('top = ' + (parseInt($('#' + id).offset().top) + parseInt($('#' + id).height())));
					if (parseInt($('#' + id).offset().top) - $('#' + id).height() == 0) {
						//console.log(' id entrou = ' + id.split('_')[1]);
						id = id.split('_')[1];
						play_video (id);
						add_view (any_class, false);
					}
				}
			}
		}
		
	}, 1000);
	setInterval(function () {
		$('#margin-video-play-x-y').val('none');
	}, 1500);

});