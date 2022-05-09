window.addEventListener('click', function (e) {
	var read_file, key, containers, id;
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

	function read_component(file, elements) {
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
			document.getElementById('single-page-container-body').innerHTML = containers;
		});
	}
	function attr (class_name, id_name, key, ident) {
		class_name = document.getElementsByClassName(class_name);
		if (class_name[key]) {
			class_name[key].setAttribute('id', id_name + '_' + ident);
		}
	}



});