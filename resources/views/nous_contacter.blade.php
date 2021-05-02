@include('layouts.topmenupage')


<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2" style="text-align: center; margin:-25px">
                        <div class="inner-title2">
                            <h3>Contact</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@if (session('ok'))
<div class="alert alert-success alert-dismissible ">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span class="color-danger"> <strong>  {{ session('ok') }}</strong></span>
</div>
@endif   


<section>
    <div class="block" style="margin-top: 50px">
        <div class="container">
             <div class="row">
                 <div class="col-lg-6 column">
                     <div class="contact-form">

                      

                     <form action="{{route('contact.store')}}" method="POST" id="demo-form">
                             <div class="row">
                            @csrf

                                <div class="col-lg-12">
                                    <span class="pf-title">Nom ou Raison Sociale</span><span class="text-danger">*</span>
                                    <div class="pf-field">
                                        <input type="text"   name="nom" value="{{old('nom')}}" placeholder="" required/>
                                        @if ($errors->has('nom'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('nom')}}</strong> 
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Email</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <input type="email"   name="email" value="{{old('email')}}" placeholder="" required/>
                                         @if ($errors->has('email'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('email')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Sujet</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <input type="text"   name="sujet" value="{{old('sujet')}}" placeholder=""required />
                                         @if ($errors->has('sujet'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('sujet')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div class="col-lg-12">
                                     <span class="pf-title">Message</span><span class="text-danger">*</span>
                                     <div class="pf-field">
                                         <textarea  name="message" required >{{old('message')}}</textarea>
                                         @if ($errors->has('message'))
                                            <br>
                                            <div class="alert alert-warning ">
                                                <strong>{{$errors->first('message')}}</strong> 
                                            </div>
                                        @endif
                                     </div>
                                 </div>
                                 <div id="captcha" class="input-field col s12 center">
                                    <div class="g-recaptcha" data-sitekey="6LcmAwETAAAAACZp3N0oT7VyNfaLbnQC8z9B9eqR"></div>
                                    <div id="error" class="left red-text text-darken-2" style="display: none">
                                        Veuillez cliquer sur le Captcha, merci.
                                    </div>
                                </div>
                                    @if ($errors->has('g-recaptcha-response'))
                                        <br>
                                        <div class="alert alert-warning ">
                                            <strong>Le champs recaptacha est obligatoire</strong> 
                                        </div>
                                    @endif
                                 <div class="col-lg-12">
                                     <button type="submit">Envoyer</button>
                                 </div>                     
                             </div>
                             <br><br>
                         </form>
                     </div>
                 </div>
                 <div class="col-lg-6 column">
                     <div class="contact-textinfo">
                         <h3>Infos</h3>
                         <ul>

                            {{-- <li><i class="la la-phone"></i><span>Contactez-nous au : +33015522000</span></li> --}}
                            <li><i class="la la-envelope-o"></i><span> contact@studafrik.com</span></li>
                            <div class="share-bar circle">
                                <a href="https://www.instagram.com/studafrik/?hl=fr" title="" class="share-instagram"><i class="la la-instagram"></i></a>
                                <a href="https://www.facebook.com/Studafrik/" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/studafrik/" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            </div>
                            
                         
                             
                            
                         </ul>
                     </div>
                </div>
             </div>
        </div>
    </div>
</section>


@include('layouts/footer')

@section('js-content')

<script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
  </script>
@endsection