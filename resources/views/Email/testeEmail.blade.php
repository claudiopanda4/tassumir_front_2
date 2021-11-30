
@component('mail::message')

	Vista do Email Enviado

	Este é o código gerado: {{$codHugo}}

	@component('mail::button',['url'=>'http://127.0.0.1:8001/'])
	
			Validar o codigo

	@endcomponent

@endcomponent