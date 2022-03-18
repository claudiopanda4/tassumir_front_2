$(document).ready(function () {
	let length = $('#host').val().split('/').length;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[length - 2];
	$.ajax({
        url: '/user_data',
        type: 'get',
        data: {},
        dataType: 'json',
        success:function(response){
        	if (response.foto != null) {
				$('#user-account-container-img-id').attr('src', route + "/storage/img/users/" + response.foto);
				$('#user-account-container-img-id').removeClass('invisible-component');
				$('.user-account-container-img').addClass('transparent-back');
				$('#complete_name_id').text(response.nome + ' ' + response.apelido);
				$('#route_account').removeClass('invisible-component');
        	} else {
        		document.getElementById('refresh-profile-photo-id').remove();
        	}
        	
        }
    });
    let id;
    if ($('#home-page-checked').val()) {
    	$('.sugest_component_div').click(function (e) {
    		id = e.target.id.split('-')[4];
    		document.location.href = $('#link_page_' + e.target.id.split('-')[4]).val();
    	});
    	$.ajax({
		    url: '/home/destaques',
		    type: 'get',
		    data: {},
		    dataType: 'json',
		    success:function(response){
		    	$.each(response, function (key, data) {
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
		page_no_following();
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
		    	$('#video_' + key).attr('src', route + "/storage/video/page/" + data.file);
		    	$('#video-post-link-' + key).attr('src', route + "/storage/video/page/" + data.file);
		    	$('#loader_button_' + key).addClass('invisible-component');
		    	$('#play_button_' + key).removeClass('invisible-component');
		    	$('#video_' + key).attr('type', 'video/' + data.file.split('.')[data.file.split('.') - 1]);
		    }
		    if (data.formato_id == 2) {
		    	$('#post-cover-post-index-' + key).removeClass('invisible-component');
		    	$('#video-post-' + key).addClass('invisible-component');
		    	$('#cover-post-index-' + key).attr('src', route + "/storage/img/page/" + data.file);
		    }
		    $('#page-name-post-' + key).text(data.page_nome);
		    $('#time-posted-' + key).text(data.created_at);
		    $('#a-page-name-post-' + key).attr('href', route + '/couple_page/' + data.page_uuid)
		    $('#page-cover-post-' + key).removeClass('invisible-component');
		    $('#m_post-' + key).removeClass('invisible-post');
		    $('#likes-qtd-' + key).text(data.qtd_reacoes + " reacções");
		    if (data.qtd_reacoes == 1) {
		    	$('#likes-qtd-' + key).text(data.qtd_reacoes + " reacção");
		    }
		    $('#comment_-post-' + key).text(data.qtd_comment + " comentários");
		    if (data.qtd_comment == 1) {
		    	$('#comment_-post-' + key).text(data.qtd_comment + " comentário");
		    }
		    if (data.reagi > 0) {
			    $('#reaction-id-' + key).removeClass('far');
			    $('#reaction-id-' + key).removeClass('unliked');
			    $('#reaction-id-' + key).addClass('fas');
			    $('#reaction-id-' + key).addClass('liked');
		    }
		    if (data.segui == 0) {
		    	$('#seguir-a-' + key).text('seguir');
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
			    	let length = response.length;
			    	let cont = parseInt($('#posts-following').val());
			    	$.each(response, function (key, data) {
			    		if (response.length > 0) {
			    			//alert('cont ' + cont);
			    			home_posts(data, cont, 1);
			    			cont++;
			    		}
			    	});
			    	$('#posts-following').val(length);
			    	let limit = 12 - length;
			    	home_posts_no_following(limit);
			        console.log(response);
			    }
			});
    	}
    	function home_posts_no_following(limit){
    		//alert('limit ' + limit);
    		let cont = parseInt($('#posts-following').val());
    		$.ajax({
			    url: '/home/posts_page_no_follow',
			    type: 'get',
			    data: {'limit': limit},
			    dataType: 'json',
			    success:function(response){
			    	$.each(response, function (key, data) {
			    		if (response.length > 0) {
			    			//alert('limit cont ' + cont);
			    			home_posts(data, cont, 2);
			    			cont++;
			    		}
			    	});
			    	if (response.length > 0) {
			    		$('#loading-finished').val('0');
			    	}
			    	let num_post = response.length + parseInt($('#posts-following').val());
			    	//alert('posts ' + num_post);
			    	$('#posts-following').val(num_post);
			        console.log(response);
			    }
			});
    	}
    	function suggest_page(){
    		$.ajax({
			    url: '/page/following/index',
			    type: 'get',
			    data: {},
			    dataType: 'json',
			    success:function(response){
			    	$.each(response, function (key, data) {
			    		if (response.length > 0) {
			    			$('#name-suggest-index-page-' + key).text(data.nome);
			    			//$('#a-name-suggest-index-page-' + key).attr('href', route + '/couple_page/' + data.uuid);
			    			$('#suggest-index-page-a-' + key).attr('href', route + '/couple_page/' + data.uuid);
			    			$('#cover-suggest-index-page-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
			        		if (data.foto != null) {
			        			$('#cover-suggest-index-page-' + key).attr('src', route + "/storage/img/page/" + data.foto);
			        		}
			        		$('#link_page_' + key).val(route + '/couple_page/' + data.uuid);
			    		}
			    	});
			        console.log(response);
			    }
			});
    	}
    }
    function page_following() {
	    if (window.innerWidth >= 720) {
			$.ajax({
		        url: '/page/following',
		        type: 'get',
		        data: {},
		        dataType: 'json',
		        success:function(response){
		        	console.log(response);
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
		        	console.log(response);
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
		        		$('#li-component-sugest-' + key).removeClass('invisible-component');
		        	});
		        }
		    });
	    }    	
    }
    let cont = 0;
    setInterval(function (e) {
    	let main = $('.main-container').offset();
    	let document_height = $('#main-home').height();
    	let final = ($(window).height()) - main.top;
    	cont = parseInt($('#posts-following').val());
    	if ((final >= document_height) && (parseInt($('#loading-finished').val()) == 0)) {
    		$('#loading-finished').val('1');
    		console.log('final');
    		home_posts_assync();
    	}
    }, 2000);
});
window.addEventListener('load', function () {
	//alert('oiii');
});