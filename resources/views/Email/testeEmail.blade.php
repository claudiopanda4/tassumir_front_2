
@component('mail::message')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('Tassumir') }}
@endcomponent
@endslot

	Ao criar uma conta no Tassumir, aceitas os nossos termos!

	Este é o código gerado: {{$codHugo}}

	@component('mail::button',['url'=>''])
	
			Validar o codigo

	@endcomponent



@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('Tassumir') }}. @lang('Todos Direitos Reservados.')
@endcomponent
@endslot
@endcomponent