
<style>
    .menugauche {
        color:white;
        font-size:18px;
    }
    .bg-gradient-studafrik{
        background-color:#323232;
        background-image:linear-gradient(180deg,#EE6E49 1%,#323232 50%);
        background-size:cover}
</style>
<aside class="col-lg-2 col-md-2  bg-gradient-studafrik " >
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                @if(Auth::user()->role == "candidat")
                <p class="menugauche"><a href="{{ route('dashboard') }}" title="">Profil</a></p>
                    @if(Auth::user()->profile_complete == true)
                        <p class="menugauche"><a href="{{route('cv.index')}}" title="">CV</a></p>
                        <p class="menugauche"><a href="{{ route('candidatures.index') }}" title="">Mes candidatures</a></p>
                        <p class="menugauche"><a href="{{route('favoris.offre.index')}}" title="">Offres sauvegardées</a></p>
                        {{-- <p><a href="/candidat/alertes" title="">Mes alertes</a></p>                --}}
                    @endif

                @elseif(Auth::user()->role == "recruteur")

                <p class="menugauche"> <a href="{{ route('dashboard') }}" title="">Profil</a> </p>
                    @if(Auth::user()->profile_complete == true)
 
                        <p class="menugauche"><a href="{{ route('mes_offres.index') }}" title="">Offres d'emploi</a></p>
                        <p class="menugauche"><a href="{{ route('mes_offres.create') }}" title="">Ajouter une offre</a></p>
                        <p class="menugauche"><a href="{{ route('cv.liste') }}" title="">Recherche candidats </a></p>
                        <p class="menugauche"><a href="{{route('favoris.cv.index')}}" title="">CV Sauvegardés</a></p>
                        {{-- <p><a href="/recruteur/alertes" title="">Mes alertes</a></p>    --}}
                    @endif            

                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a href="/logout" title="" class="menugauche"  onclick="event.preventDefault();
                        this.closest('form').submit();" >Déconnexion</a></li> 
{{-- 
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-dropdown-link> --}}
                </form>
                    {{-- <li><a href="/logout" title="">Déconnexion</a></li> --}}

            </ul>
        </div>
    </div>
  
</aside>