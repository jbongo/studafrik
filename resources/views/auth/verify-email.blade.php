@include('layouts.topmenupage')


    	
	<section>
	
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <h3 >Confirmation de l'adresse email </h3>
                <br><hr>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> Merci pour votre inscription! Avant de commencer, vérifiez votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer.<h5>
                 

                    
                  <p class="card-text">
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de l'inscription.
                        </div>
                    @endif
                  </p>
                  
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <button type="submit" class="btn btn-danger">
                       Déconnexion
                    </button>
                </form>
               

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
    
                    <div>
                        <button type="submit" class="btn btn-success" style="background: #0c2742; border-color:#0c2742 ">
                            Renvoyer le mail de vérification
                        </button>
                    </div>
                </form>
    
                
                </div>
              </div>
            </div>
          
          </div>


       

       

        <div class="mt-4 flex items-center justify-between">
           
        </div>

	</section>




@include('layouts/footer')

{{-- 

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
          xx  {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}
