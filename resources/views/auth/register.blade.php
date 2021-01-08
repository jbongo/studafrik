@include('layouts.topmenupage')
{{-- 
  <section>
		<div className="block no-padding  gray">
			<div className="container">
				<div className="row">
					<div className="col-lg-12">
						<div className="inner2">
							<div className="inner-title2">
								<h3>Inscription</h3>
							
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

    	
	<section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
                                <h3>Inscription</h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                               
                              
								<form method="POST" action="{{ route('register') }}">
                                @csrf
								
                                  <div class="cfield">
                                   
                                        <input type="radio" id="recruteur" name="role" value="recruteur" required>
                                        <label for="recruteur">Je suis Recruteur</label>
                                    
                                        <input type="radio" id="candidat" name="role" value="candidat" required>
                                        <label for="candidat"> Je suis Candidat</label>

                                </div>

                                    <div class="cfield">
										<input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
										<i class="la la-envelope-o"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="Mot de passe" id="password" name="password" required  />
										<i class="la la-key"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="Confirmer Mot de passe" id="password_confirmation" name="password_confirmation" required />
										<i class="la la-key"></i>
									</div>
									  <div class="flex items-center justify-end mt-4">
                                          <p>Déjà inscrit ?</p>
                                        <a  style="color: blue" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            Connectez-vous !
                                        </a>              
                                     </div>
									
									<button  type="submit">S'inscrire</button>
								</form>
								<div class="extra-login" >
									<span>S'inscrire avec :</span>
									<div class="login-social">
										<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
										<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
									</div>
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
