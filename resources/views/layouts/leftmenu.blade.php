
<style>
    .menugauche {
        color:white;
    }
</style>
<aside class="col-lg-2 column border-right" style="background: #0c1727; ">
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

                        <p class="menugauche"><a href="{{ route('mes_offres.index') }}" title="">Offres d'emplois</a></p>
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