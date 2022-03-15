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
        	}
        	
        }
    });
	page_following();
	page_no_following();
    $(window).resize(function () {
    	page_following();
	page_no_following();
    });
    function page_following() {
	    if ((window.innerWidth >= 720)) {
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
		        		$('#page-cover-suggest-id-' + key).attr('src', route + "/css/uicons/page_icon.jpg");
		        		$('#page-cover-suggest-id-' + key).removeClass('invisible-component');
		        		$('#a-suggest-id-aside-name-' + key).attr('href', route + '/couple_page/' + data.uuid);
		        		$('#a-suggest-id-aside-' + key).attr('href', route + '/couple_page/' + data.uuid);
		        		$('#follwing-' + key).attr('id', data.page_id);
		        		if (data.foto != null) {
		        			$('#page-cover-suggest-id-' + key).attr('src', route + "/storage/img/page/" + data.foto);
		        		}
		        		$('#li-component-sugest-' + key).removeClass('invisible-component');
		        	});
		        }
		    });
	    }    	
    }
});
window.addEventListener('load', function () {
	//alert('oiii');
});