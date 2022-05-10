window.addEventListener('click', function (e) {
	var read_file, key, containers, id, element, class_;
	var route = window.location.href.split('/');
	route = route[0] + '//' + route[2] + '/'; 
	if (e.target.className.indexOf('comment-single-page-link') > -1) {
		/*e.preventDefault();
		id = e.target.id.split('_')[1];
		//alert(id);
		console.log(route);
		read_component(route + 'components/comments.html', 10);
		document.getElementById('target-single-page-component').checked = true;
		get_data('/posts/comments/' + id);*/
	}
	if (e.target.className.indexOf('comment_tv-post') > -1) {
		//e.preventDefault();
		/*id = e.target.id.split('_')[1];
		$('#id_clicked_component').val(id);
		console.log(route);
		//read_component(route + 'components/comments.html', 10);
		document.getElementById('target-single-page-component').checked = true;
		$.ajax({
			url: '/posts/comments/' + id,
			type: 'get',
			data: {'since' : 0},
			dataType: 'json',
			success:function(response){
				//console.log(response);
				read_component(route + 'components/comments.html', response.length, 1);
			}
		});*/	
		//alert(id);
		//get_data('/posts/comments/' + id);
	}

	function get_data (route) {
		data = {
			'since' : 2,
			'since1' : 3,
		}
		http = new XMLHttpRequest();
		http.onreadystatechange = function () {
			if (http.readyState == 4 && http.status == 200) {
				console.log(http.response);
			}
		}
		console.log(data);
		http.open('GET', route);
		http.responseType = 'json';
		//http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.send('?nome=4');
	}

	function read_component(file, elements, type) {
		read_file = new Headers();
		read_file.append('Content-Type', 'text/plain; charset=utf-08');
		fetch(file, read_file)
		.then(function (response) {
			return response.text();
		})
		.then(function (result) {
			//console.log(result);
			document.getElementById('loaded-component').value = result;
			key = 0;
			containers = "";
			while(key < elements){
				containers = containers + '' + result;
				key++;
			}
			if (type == 2) {
				//console.log('entrou');
				element = document.createElement('div');
				element.innerHTML = containers;
				document.getElementById('single-page-container-body').appendChild(element);
			} else if (type == 1) {
				document.getElementById('single-page-container-body').innerHTML = containers;
			}
			$.ajax({
				url: route + 'posts/comments/' + $('#id_clicked_component').val(),
				type: 'get',
				data: {'since' : $('#loaded-item-ident').val()},
				dataType: 'json',
				success:function(response){
					//console.log(response);
					$.each(response, function(key, data){
						comment(key, data);
					});
					class_components = [
						'comment-single-page-5',
						'comment-single-page-7',
						'comment-single-page-8',
						'comment-single-page-9',
						'comment-single-page-12'
					];
					removeClass(class_components);
					$('#loaded-component-full').val('ok');
				}
			});

				
		});	
	}
	function removeClass(class_components) {
		for (var i = class_components.length - 1; i >= 0; i--) {
			class_ = document.getElementsByClassName(class_components[i]);
			for (var ii = class_.length - 1; ii >= 0; ii--) {
				//console.log(class_[ii]);
				//console.log(class_components[i] + ' ' + ii);
				class_[ii].classList.remove(class_components[i]);
			}
		}
	}
	function comment(key, data) {
		attr ('comment-single-page-5', 'comment-single-page-img', key, data.uuid);
		attr ('comment-single-page-7', 'comment-single-page-a', key, data.uuid);
		attr ('comment-single-page-8', 'comment-single-page', key, data.uuid);
		attr ('comment-single-page-9', 'comment-single-page-p', key, data.uuid);
		attr ('comment-single-page-12', 'comment-single-page-comment', key, data.uuid);

		/*$('#comment-single-page-img_' + data.uuid).removeClass('comment-single-page-5');
		$('#comment-single-page-a_' + data.uuid).removeClass('comment-single-page-7');
		$('#comment-single-page_' + data.uuid).removeClass('comment-single-page-8');
		$('#comment-single-page-p_' + data.uuid).removeClass('comment-single-page-9');
		$('#comment-single-page-comment_' + data.uuid).removeClass('comment-single-page-12');*/

		$('#comment-single-page_' + data.uuid).text(data.nome_comment);
		if (data.apelido_comment) {
			$('#comment-single-page_' + data.uuid).text($('#comment-single-page_' + data.uuid).text() + " " + data.apelido_comment);
		}
		$('#comment-single-page-p_' + data.uuid).text(data.comment);
		$('#comment-single-page-a_' + data.uuid).attr('href', route + 'profile/' + data.uuid_dono_comment);
		if (data.foto_comment) {
			if (data.tipo_verify == 1) {
				id = route + 'storage/img/users/' + data.foto_comment;
			} else {
				id = route + 'storage/img/page/' + data.foto_comment;
			}
		} else {
			id = route + 'css/uicons/user.png';
			$('#comment-single-page-img_' + data.uuid).css({
				width : '20px',
				height : '20px',
			});
			$('#comment-single-page-img_' + data.uuid).addClass('center');
			$('#comment-single-page-img_' + data.uuid).removeClass('img-full');
		}
		$('#comment-single-page-img_' + data.uuid).attr('src', id);
		if (data.ja_comment_reactions) {
			$('#comment-single-page-comment_' + data.uuid).addClass('fas liked');
			$('#comment-single-page-comment_' + data.uuid).removeClass('far');
		}

		$('#loaded-item-ident').val(data.comment_id);
	}
	function attr (class_name, id_name, key, ident) {
		class_ = document.getElementsByClassName(class_name);

		if (class_[key]) {
			class_[key].setAttribute('id', id_name + '_' + ident);
		}
	}
	if (e.target.className.indexOf('comment-a-react') > -1) {
		e.preventDefault();
    	id = e.target.id.split('_')[1];
	    $.ajax({
		    url: route + 'post/comment/reaction',
		    type: 'get',
		    data: {'id' : id},
		    dataType: 'json',
		    success: function(response){
				//console.log(response);
				$('#comment-single-page-comment_' + id).addClass(response.add);
				//$('#reaction-id-comment-user-qtd_' + id).text(response.qtd_reactions);
				$.each(response.remove, function(key, data) {
					//console.log(data);
					$('#reaction-id-comment-user_' + id).removeClass(data);
				});
			}
		});
	}

	setInterval(function () {
    	let component_single_page = window.innerHeight - document.getElementById('single-page-container-body').getBoundingClientRect().top;
    	if ((component_single_page >= $('#single-page-container-body').height()) && $('#loaded-component-full').val() == 'ok') {
    		//$('#loaded-component-full').val('ok');
    		//console.log('final');
    		$.ajax({
				url: route + 'posts/comments/' + $('#id_clicked_component').val(),
				type: 'get',
				data: {'since' : $('#loaded-item-ident').val()},
				dataType: 'json',
				success:function(response){
					console.log(response);
					read_component(route + 'components/comments.html', response.length, 2);
					$('#loaded-component-full').val('none');
				}
			});
    	}
	}, 1000);
});