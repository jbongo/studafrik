<!--
<footer class="gray">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget">
                        <div class="mega-widget">
                            {{-- <div class="logo"><a href="#" title=""><img src="{{asset('images/logo.png')}}" height="40px" width="93px" alt="" /></a></div> --}}
                            <div class="links">
                                <a href="#" title="">A propos de nous</a>
                                <a href="#" title="">Termes du contrat</a>
                                <a href="#" title="">Comment ça marche</a>
                                <a href="#" title="">Contactez nous</a>
                            </div>
                            {{-- <span>Collins Street West, Victoria 8007, Australia.</span>
                            <span>+1 246-345-0695</span>
                            <span>info@jobhunt.com</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-line style2">
        <span>© 2020 Studafrik Tous droits reservés</span>
        <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
    </div>
</footer> -->


<footer style="background: #323232">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="about_widget">
                            <div class="logo">
                                <a href="#" title=""><img src="{{asset('images/logo.png')}}" alt="" width="150px" /></a>
                            </div>
                           
                            <span>contact@studafrik.com</span>
                            <div class="social">
                                <a href="https://www.facebook.com/Studafrik/" title=""><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/studafrik?lang=fr" title=""><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/stud-afrik/" title=""><i class="fa fa-linkedin"></i></a>
                                <a href="https://www.instagram.com/studafrik/?hl=fr" title=""><i class="fa fa-instagram"></i></a>
                            </div>
                        </div><!-- About Widget -->
                    </div>
                </div>
                <div class="col-lg-4 column">
                    <div class="widget">
                        <br><br>
                        <h3 class="footer-title">A propos</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{route('qui_sommes_nous')}}" title="">Qui sommes-nous ?</a>
                                    <a href="{{route('faq')}}" title="">FAQ </a>
                                    <a href="{{route('offres_emplois')}}" title="">Offres d'emploi </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{route('nous_contacter')}}" title="">Contact </a>
                                    {{-- <a href="#" title="">Termes du contrat</a> --}}
                                    <a href="{{route('user.bibliotheque.index')}}" title="">Entreprises </a>

                                    {{-- <a href="#" title="">For Employers </a>
                                    <a href="#" title="">Underwriting </a>
                                    <a href="#" title="">Contact Us</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-2 column">
                    <div class="widget">
                        <h3 class="footer-title">Find Jobs</h3>
                        <div class="link_widgets">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="#" title="">US Jobs</a>	
                                    <a href="#" title="">Canada Jobs</a>	
                                    <a href="#" title="">UK Jobs</a>	
                                    <a href="#" title="">Emplois en Fnce</a>	
                                    <a href="#" title="">Jobs in Deuts</a>	
                                    <a href="#" title="">Vacatures China</a>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 column">
                    <div class="widget">
                        <div class="download_widget">
                            <a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
                            <a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="bottom-line style2" style="background: #ffffff; color:#EB586C">
        <span style="color:#EB586C">© 2020 Studafrik Tous droits reservés</span>
        <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
    </div>
</footer>





</div>

<div class="account-popup-area signin-popup-box">
<div class="account-popup">
    <span class="close-popup"><i class="la la-close"></i></span>
    <h3>Connexion</h3>
    <div class="select-user">
        <span>Je suis Candidat</span>
        <span>Je suis Recruteur</span>
    </div>
    <form>
        <div class="cfield">
            <input type="email" placeholder="email" />
            <i class="la la-user"></i>
        </div>
        <div class="cfield">
            <input type="password" placeholder="********" />
            <i class="la la-key"></i>
        </div>
        <p class="remember-label">
            <input type="checkbox" name="cb" id="cb1"><label for="cb1">Se souvenir de moi</label>
        </p>
        <a href="#" title="">Mot de passe oublié ?</a>
        <button type="submit">Se connecter</button>
    </form>
    <div class="extra-login">
        <span>Ou se connecter avec :</span>
        <div class="login-social">
            <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
            <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
        </div>
    </div>
</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
<div class="account-popup">
    <span class="close-popup"><i class="la la-close"></i></span>
    <h3>Inscription</h3>
    <div class="select-user">
        <span>Je suis Candidat</span>
        <span>Je suis Recruteur</span>
    </div>
    <form>
       <div class="cfield">
            <input type="email" placeholder="Email" />
            <i class="la la-envelope-o"></i>
        </div>

        <div class="cfield">
            <input type="password" placeholder="********" />
            <i class="la la-key"></i>
        </div>
       
       
        <button type="submit">Inscription</button>
    </form>
    <div class="extra-login">
        <span>Ou s'inscrire avec</span>
        <div class="login-social">
            <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
            <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
        </div>
    </div>
</div>
</div><!-- SIGNUP POPUP -->

<script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('js/modernizr.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset('js/wow.min.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('js/slick.min.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('js/parallax.js')}}" type="text/javascript"></script> --}}
<script src="{{asset('js/select-chosen.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('js/counter.js')}}" type="text/javascript"></script>
<script src="{{asset('js/sweetalert2.js')}}" type="text/javascript"></script> --}}

<!-- Custom scripts for all pages-->
{{-- <script src="{{asset('admin/js/sb-admin-2.js')}}"></script> --}}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3NQ98TCKP3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3NQ98TCKP3');
</script>



@yield('js-content')
</body>
</html>