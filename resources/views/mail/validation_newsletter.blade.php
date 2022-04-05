  
@component('mail::message')
# Bonjour

Pour valider votre enregistrement à la newsletter de STUD'AFRIK, veuillez confirmer votre adresse email.



@component('mail::button', ['url' => route('newsletter.validation', $id) ])
Confirmer mon email
@endcomponent


<img src="{{asset('images/logo.png')}}" width="120px" height="100px" alt="logo">

@endcomponent