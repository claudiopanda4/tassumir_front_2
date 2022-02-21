@component('mail::message')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('Confirme a tua Conta Tassumir') }}
@endcomponent
@endslot
	Ao criar uma conta no Tassumir, aceitas os nossos termos!
	@component('mail::panel')
	Este é o código gerado: {{$codHugo}}
	@endcomponent
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('Tassumir') }}. @lang('Todos Direitos Reservados.')
@endcomponent
@endslot
@endcomponent