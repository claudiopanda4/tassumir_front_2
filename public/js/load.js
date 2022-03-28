$(document).ready(function () {
	let length = $('#host').val().split('/').length;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[length - 2];
	let src;
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
		    	src = document.getElementById('user-account-container-img-id').src;
		    	$('#img-profile-component').attr('src', src);
				$('#img-profile-component').removeClass('invisible-component');
				$('#img-profile-container').addClass('transparent-back');
		    }
        	
        }
    });
    let id;
	page_no_following();
    if ($('#home-page-checked').val()) {
    	$.ajax({
		    url: '/home/destaques',
		    type: 'get',
		    data: {},
		    dataType: 'json',
		    success:function(response){
		    	$.each(response, function (key, data) {
		    		$('#name-page-dest-' + key).text(data.page_name);
		    		$('#name-page-dest-' + key).attr('id', 'name-page-dest_' + key);
		    		$('#li-component-stories-img-profile-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		    		if (data.page_foto != null) {
		    			$('#li-component-stories-img-profile-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
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
		    				$('#li-component-stories-video-post-' + key).attr('src', route + "/storage/video/page/" + data.file);
		    				$('#li-component-stories-video-post-' + key).removeClass('invisible');
		    				$('#li-component-stories-cover-video-' + key).removeClass('invisible-component');
		    			}	
		    		}
		    		$('#headline-stories-' + key).text(data.descricao);
		    		$('#li-component-stories-img-profile-' + key).removeClass('invisible');
		    	});
		        	console.log(response);
		    }
		});
	    home_posts_assync();
		page_following();
	    $(window).resize(function () {
	    	page_following();
			page_no_following();
	    });
    	//home_posts();
    	function home_posts(data, key, option) {
    		$('#page-cover-post-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		    if (data.page_foto != null) {
		    	$('#page-cover-post-' + key).attr('src', route + "/storage/img/page/" + data.page_foto);
    		}
		    if (data.formato_id == 3) {
		   		$('#post-cover-post-index-' + key).addClass('invisible-component');
		   		$('#video-post-' + key).addClass('invisible-component');
		   		$('#p-post-' + key).text(data.descricao);
		   		$('#p-post-' + key).removeClass('invisible-component');
		    }
		    if (data.formato_id == 1) {
		    	$('#video-post-' + key).removeClass('invisible-component');
		    	$('#post-cover-post-index-' + key).addClass('invisible-component');
		    	$('#m_post-' + key).addClass('getvideo');
		    	$('#video_' + key).attr('type', 'video/' + data.file.split('.')[data.file.split('.').length - 1]);
		    	//$('#video_' + key).attr('src', route + "/storage/video/page/" + data.file);
		    	//$('#video-post-link-' + key).attr('src', route + "/storage/video/page/" + data.file);
		    	$('#vid-' + key).val(route + "/storage/video/page/" + data.file);
		    	$('#video-post-link-' + key).attr('id', 'video-post-link_' + data.uuid);
			    $('#video-post-' + key).attr('id', 'video-post_' + data.uuid);
		   		$('#video_' + key).attr('id', 'video_' + data.uuid);
				$('#has-video-' + key).attr('id', 'has-video_' + data.uuid);
			    $('#vid-' + key).attr('id', 'vid_' + data.uuid);
			    //alert('data.uuid ' + data.uuid);
		    	$('#loader_button_' + key).addClass('invisible-component');
		    	$('#play_button_' + key).removeClass('invisible-component');
		    	$('#loader_button_' + key).attr('id', 'loader_button_' + data.uuid);
		    	$('#play_button_' + key).attr('id', 'play_button_' + data.uuid);
		    	$('#video-post-time-' + key).attr('id', 'video-post-time-' + data.uuid);
		    	$('#video-post-time-all-' + key).attr('id', 'video-post-time-all-' + data.uuid);
		    }
		    if (data.formato_id == 2) {
		    	$('#post-cover-post-index-' + key).removeClass('invisible-component');
		    	$('#video-post-' + key).addClass('invisible-component');
		    	$('#cover-post-index-' + key).attr('src', route + "/storage/img/page/" + data.file);
		    }

		    //console.log('uuid ' + data.uuid);
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
		    $('#comment-own-' + key).attr('id', 'comment-own_' + data.uuid);
		    $('#comment-users-own-' + key).attr('id', 'comment-users-own_' + data.uuid);
		    $('#comentario-' + key).attr('id', 'comentario_' + data.uuid);
		    $('#comentario-i-' + key).attr('id', 'comentario-i_' + data.uuid);
		    $('#comment-user-comment-feed-' + key).attr('id', 'comment-user-comment-feed_' + data.uuid);
		    $('#comentario-a-' + key).attr('id', 'comentario-a_' + data.uuid);
		    $('#comment-send-profile-' + key).attr('src', document.getElementById('user-account-container-img-id').src);
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
    		
			if (key >= 2) {
				$('#alert-info-about-us-2').removeClass('invisible-component');
			}
			if (key >= 5) {
				$('#alert-info-about-us-5').removeClass('invisible-component');
				$('#btn-alert-info-5').text('Saber mais');
			    $('#content-p-5').text('Como ganhar dinheiro usando o tassumir? Veja algumas dicas importantes pra si.')
			}
			if (key >= 9) {
				$('#alert-info-about-us-9').removeClass('invisible-component');
				$('#btn-alert-info-9').text('Assumir o Meu Relacionamento');
				$('#btn-alert-info-9').css({
					fontSize : '11px',
				});
			    $('#content-p-9').text('Ao assumir o seu relacionamento no tassumir, você ganhará automaticamente uma página, e poderá publicar e ganhar dinheiro por meio dos seus conteúdos')
			}

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
			    	let limit = 12 - length;
			    	home_posts_no_following(limit);	
			    	
			        console.log(response);
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
			        console.log(response);
			    }
			});
			$('#posts').val(1);
    	}
    }

	if ($('#page_couple').val()) {
		if (window.innerWidth <= 720){
			suggest_page();
			$('#sugest_index_page').removeClass('invisible-component');
		}
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
	    if (window.innerWidth >= 720) {
			$.ajax({
		        url: '/page/following',
		        type: 'get',
		        data: {},
		        dataType: 'json',
		        success:function(response){
		        	//console.log(response);
		        }
		    });
	    }    	
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
	    			console.log('id = ' + id);
	    			$.ajax({
					    url: '/view/',
					    type: 'get',
					    data: {'id' : id, 'video_add' : false},
					    dataType: 'json',
					    success:function(response){
					    	console.log(response);
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

	    		
	    		if (window.innerHeight > 650) {
	    			if ($('#m_post_' + id).offset().top < 300 && $('#has-video_' + id).val() != 'ok') {
		    			$('#video-post-link_' + id).attr('src', link_video);
		    			$('#video_' + id).attr('src', link_video);
		    			$('#has-video_' + id).val('ok');
		    		}
	    		} else {
					if ($('#m_post_' + id).offset().top < 210 && $('#has-video_' + id).val() != 'ok') {
		    			$('#video-post-link_' + id).attr('src', link_video);
		    			$('#video_' + id).attr('src', link_video);
		    			$('#has-video_' + id).val('ok');
		    		}
	    		}
	    		$('#video-post-time-all-' + id).val(document.getElementById('video_' + id).duration / 2);
                if (!(document.getElementById('video_' + id).paused)) {
                    currentTime = document.getElementById('video_' + id).currentTime;
                    duration = document.getElementById('video_' + id).duration;
                    $('#video-post-time-' + id).val(currentTime);
                    //console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                    console.log('currentTime de video_' + id + ' = ' + $('#video-post-time-' + id).val());
                    if (currentTime >= (duration / 2) && currentTime >= 30) {
                        watched_video = $('#watch-video-' + id).val();
                        //console.log('entrou no video watch-video ' + watched_video);
                        //add_view(watched_video);
                        $.ajax({
						    url: '/view/',
						    type: 'get',
						    data: {'id' : id, 'video_add' : true},
						    dataType: 'json',
						    success:function(response){
						    	console.log(response);
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
    let class_name;
    $('.seguir-a').click(function (e) {
    	e.preventDefault();
    	id = e.target.id.split('_')[1];
    	$('#loader-id-icon-post_' + id).removeClass('invisible-component');
    	$('#loader-id-icon-post-index_' + id).removeClass('invisible-component');
    	//alert(id);
    	$.ajax({
		    url: '/page/follow',
		    type: 'get',
		    data: {'uuid' : id},
		    dataType: 'json',
		    success:function(response){
		    	console.log(response);
		    	class_name = "seguir-a-class_" + e.target.id.split('_')[1];
		    	seguir_a = document.getElementsByClassName("seguir-a-class_" + id).length;
		    	for (var i = document.getElementsByClassName(class_name).length - 1; i >= 0; i--) {
		    		document.getElementsByClassName(class_name)[i].classList.add('invisible-component');
		    	}
		    	$('#loader-id-icon-post_' + id).addClass('invisible-component');
    			$('#loader-id-icon-post-index_' + id).addClass('invisible-component');
		    }
    		
		});
    	//alert();
    });
  	let text = "";
    $('.comentar-a').click(function (e) {
    	e.preventDefault();
    	//alert(e.target.id);
    	id = e.target.id.split('_')[1];
    	text = $('#comentario_' + id).val();
    	$("#comentario_" + id).val('');
    	$('#comment-user-comment-feed_' + id).text(text);
    	//alert(id);
    	//alert(text);
    });
    //$('#reaction-id-a-')
});
window.addEventListener('load', function () {
	//alert('oiii');
});