  
@component('mail::message')
# Vous avez reçu un nouveau mail via le formulaire de contact


<strong>  Nom ou Raison sociale : </strong>  {{$nom}} <br>
<strong>  email : </strong>  {{$email}}  <br>
<strong>  Sujet : </strong>  {{$sujet}}  <br>
<strong>  Message : </strong> {{$message}}  <br>



@component('mail::button', ['url' => config('app.url') ])
Se connecter
@endcomponent


<img src="{{asset('images/logo.png')}}" width="120px" height="100px" alt="logo">

@endcomponent