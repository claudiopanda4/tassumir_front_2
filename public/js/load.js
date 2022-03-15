$(document).ready(function () {
	let length = $('#host').val().split('/').length;
	let route = $('#host').val().split('/')[0] + '//' + $('#host').val().split('/')[length - 2];
	$.ajax({
        url: '/user_data',
        type: 'get',
        data: {},
        dataType: 'json',
        success:function(response){
        	console.log(response);
        	if (response.foto != null) {
				$('#user-account-container-img-id').attr('src', route + "/storage/img/users/" + response.foto);
				$('#user-account-container-img-id').removeClass('invisible-component');
				$('.user-account-container-img').addClass('transparent-back');
				$('#complete_name_id').text(response.nome + ' ' + response.apelido);
				$('#route_account').removeClass('invisible-component');
        	}
        	
        }
    });
    
	$.ajax({
        url: '/user_data',
        type: 'get',
        data: {},
        dataType: 'json',
        success:function(response){
        	console.log(response);
        	if (response.foto != null) {
				$('#user-account-container-img-id').attr('src', route + "/storage/img/users/" + response.foto);
				$('#user-account-container-img-id').removeClass('invisible-component');
				$('.user-account-container-img').addClass('transparent-back');
				$('#complete_name_id').text(response.nome + ' ' + response.apelido);
				$('#route_account').removeClass('invisible-component');
        	}
        	
        }
    });
});
window.addEventListener('load', function () {
	//alert('oiii');
});