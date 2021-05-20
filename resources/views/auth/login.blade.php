@section('title') 
Connexion

@endsection
@include('layouts.topmenupage')

<style>
     input[type="text"],
 input[type="password"],
 input[type="email"],
 textarea {
     background: #e4e4e4 none repeat scroll 0 0;

     border: medium none;
     float: left;
     font-size: 12px;
     font-weight: 400;
     margin-bottom: 20px;
     padding: 19px 28px;
     width: 100%;
 }
</style>
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3>Connexion</h3>
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                               
                              
								<form method="POST" action="{{ route('login') }}">
                                @csrf
								
                                 

                                    <div class="cfield">
										<input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
										<i class="la la-envelope-o"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="Mot de passe" id="password" name="password" required  />
										<i class="la la-key"></i>
									</div>
									
                                    <div class="flex items-center justify-end mt-4">
                                        <p> Vous n'avez pas de compte ? </p>
                                        <a style="color: blue"  class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                                            Créez votre compte
                                        </a>              
                                    </div>
									
                                    <button  type="submit">Se connecter</button>
                                    <a  style="color: red" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>   
								</form>
								<div class="extra-login" >
									{{-- <span>Se connecter avec :</span>
									<div class="login-social">
										<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
										<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
									</div> --}}
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>


{{-- 
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="nom" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@include('layouts/footer')
