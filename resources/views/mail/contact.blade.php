  
@component('mail::message')
 # Vous avez reçu un nouveau mail via le formulaire de contact

 
 Nom ou Raison sociale :  {{$nom}} <br>
 email :  {{$email}}  <br>
 Sujet :  {{$sujet}}  <br>
 Message : {{$message}}  <br>



@component('mail::button', ['url' => config('app.url') ])
Se connecter
@endcomponent


<img src="{{asset('images/logo.png')}}" width="130px" height="65px" alt="logo">

@endcomponent