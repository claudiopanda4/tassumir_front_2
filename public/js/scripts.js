$(document).ready(function () {
	let id;
	$('.play_button_tv').click(function (e) {
		play_video(e);
	});
	function play_video (evt) {
		id = evt.target.id;
		id = id.split('_')[1];
		
		if ($('#video-tv-clicked_' + id).val() == 0) {
			$('#thumb-video-tv_' + id).addClass('invisible-component');
			$('#play-button-tv_' + id).addClass('invisible-component');
			$('#video-component-video_' + id).attr('src', $('#video-tv-source_' + id).val());
			$('#video-component-video_' + id).removeClass('invisible-component');
			document.getElementById('video-component-video_' + id).play();
		}
	}
	$('.thumb-video').click(function (e) {
		play_video(e);
	});
});