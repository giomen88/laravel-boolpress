@component('mail::message')
<h1>E' stato pubblicato un nuovo post!</h1>

<h3>{{$post->title}}</h3>

@component('mail::button', ['url' => ''])
Vai al post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
