  
@component('mail::message')
# Bonjour

Un candidat vient de postuler à votre offre : <br> ({{ $offre->titre }}). <hr>

@component('mail::button', ['url' => config('app.url') ])
Se connecter
@endcomponent

Bien cordialement,<br>
L'Équipe STUDAFRIK.
<img src="{{asset('images/logo.png')}}" width="120px" height="100px" alt="logo">

@endcomponent