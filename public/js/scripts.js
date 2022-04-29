$(document).ready(function () {
	let route = document.location.href.split('/');
	let route_root = route[0] + '//' + route[1] + route[2];
	//alert(route_root);
	let id, cont, height, top, height_component, final, any_class;
	var initialY, clientY;
	$('.play_button_tv').click(function (e) {
		play_video(e);
	});
	function play_video (evt) {
		id = evt.target.id;
		id = id.split('_')[1];
		if ($('#video-tv-clicked_' + id).val() == 0) {
			$('#video-component-video_' + id).attr('src', $('#video-tv-source_' + id).val());
			$('#video-component-video_' + id).removeClass('invisible-component');
			document.getElementById('video-component-video_' + id).play();
			$('#loaded-video-play-tv').val(id);
			$('#play-button-tv_' + id).addClass('invisible-component');
			$('#thumb-video-tv_' + $('#loaded-video-play-tv').val()).addClass('invisible-component');
			$('#video-component-video_' + id).addClass('video-play');
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
	}, false);
	$('.thumb-video').click(function (e) {
		play_video(e);
	});
	id = route[route.length - 1];
	$.ajax({
		url: '/tv/' + id,
		type: 'get',
		dataType: 'json',
		data : {},
		success : function (response) {
			//console.log(response);
			$.each(response, function (key, data) {
				cont = $('#last-component-id-tv').val();
				//alert(cont);
				$('#video-tv-source_' + cont).val(route_root + '/storage/video/page/' + data.file);
				$('#video-tv-source_' + cont).attr('id', 'video-tv-source_' + data.uuid);
				$('#thumb-video-tv_' + cont).attr('src', route_root + '/storage/img/thumbs/' + data.thumbnail);
				$('#thumb-video-tv_' + cont).attr('id', 'thumb-video-tv_' + data.uuid);
				$('#play-button-tv_' + cont).attr('id', 'play-button-tv_' + data.uuid);
				$('#video-tv-clicked_' + cont).attr('id', 'video-tv-clicked_' + data.uuid);
				$('#video-component-video_' + cont).attr('id', 'video-component-video_' + data.uuid);
				$('#video-tv-container_' + cont).addClass('video_loaded');
				$('#video-tv-container_' + cont).removeClass('invisible-component');
				$('#video-tv-container_' + cont).attr('id', 'video-tv-container_' + data.uuid);
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
		//height = document.getElementById('main-container-video').offsetHeight;
		top = document.getElementById('main-container-video-component').offsetTop;
		//console.log(height + ' ' + top);
		//console.log(height);
		//console.log(final);
		//console.log($('#main-container-video-component').offset().top);
		if ($('#main-container-video-component').offset().top < 20) {
			//console.log('entrou');
			$('#main-component-main-tv-id').addClass('main-component-main-tv-hidden');
			$("#nav-video-option-id").addClass('invisible-component');
			$("#header-main-component-1-tv").addClass('fixed-header-two');
			$("#header-main-component-2-tv").addClass('fixed-header-two');
			//$('#main-container-video').addClass('main-container-tv');
			$('.video-tv-container').css({
				marginBottom : 0,
			});
		} else {
			$("#header-main-component-1-tv").removeClass('fixed-header-two');
			$("#header-main-component-2-tv").removeClass('fixed-header-two');
			$("#nav-video-option-id").removeClass('invisible-component');
		}
		any_class = document.getElementsByClassName('video_loaded');
		id = 'video-component-video_' + $('#loaded-video-play-tv').val();
		if ($('#loaded-video-play-tv').val() != 'none') {
			//console.log($('#video-component-video_' + $('#loaded-video-play-tv').val()).offset().top + ' ' + $('#' + id).height());
			if (($('#' + id).offset().top + $('#' + id).height()) < ($('#' + id).height() / 2) + 50 || ($('#' + id).offset().top > $('#' + id).height() / 2)) {
				id = id.split('_')[1];
				if (!document.getElementById('video-component-video_' + id).paused) {
					document.getElementById('video-component-video_' + id).pause();
				} else {
					$('#loaded-video-play-tv').val('none');
				}
			}
		}

		if (final > - 100) {
			if ($('#loaded-post-id-tv').val() != 0) {
				//console.log('Entrou');
					$.ajax({
					url: '/tv/' + id,
					type: 'get',
					dataType: 'json',
					data : {},
					success : function (response) {
						//console.log(response);
						$.each(response, function (key, data) {
							cont = $('#last-component-id-tv').val();
							//alert(cont);
							$('#video-tv-source_' + cont).val(route_root + '/storage/video/page/' + data.file);
							$('#video-tv-source_' + cont).attr('id', 'video-tv-source_' + data.uuid);
							$('#thumb-video-tv_' + cont).attr('src', route_root + '/storage/img/thumbs/' + data.thumbnail);
							$('#thumb-video-tv_' + cont).attr('id', 'thumb-video-tv_' + data.uuid);
							$('#play-button-tv_' + cont).attr('id', 'thumb-video-tv_' + data.uuid);
							$('#video-tv-clicked_' + cont).attr('id', 'video-tv-clicked_' + data.uuid);
							$('#video-component-video_' + cont).attr('id', 'video-component-video_' + data.uuid);
							$('#video-tv-container_' + cont).addClass('video_loaded');
							$('#video-tv-container_' + cont).removeClass('invisible-component');
							$('#video-tv-container_' + cont).attr('id', 'video-tv-container_' + data.uuid);
							cont++;
							$('#last-component-id-tv').val(cont);
							//$('#video-component-video_' + id).removeClass('invisible-component');
						});
					}
				});
			}

		}
		//console.log($('#main-container-video-component'));
		//console.log(height_component);
		//console.log(document.getElementById('main-container-video-component').getBoundingClientRect().y + );
	}, 1000);
	setInterval(function () {
		$('#margin-video-play-x-y').val('none');
	}, 2000);

});