<aside class="col-lg-3 column border-right">
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                @if(Auth::user()->role == "candidat")
                    <a href="{{ route('dashboard') }}" title="">Profile</a>
                    @if(Auth::user()->profile_complete == true)
                        <p><a href="/candidat/cv" title="">CV</a></p>
                        <p><a href="/candidat/favoris" title="">Mes favoris</a></p>
                        <p><a href="/candidat/candidatures" title="">Mes candidatures</a></p>
                        <p><a href="/candidat/alertes" title="">Mes alertes</a></p>               
                    @endif

                @elseif(Auth::user()->role == "recruteur")

                    <a href="{{ route('dashboard') }}" title="">Profile</a>
                    @if(Auth::user()->profile_complete == true)

                        <p><a href="{{ route('mes_offres.index') }}" title="">Offres d'emplois</a></p>
                        <p><a href="{{ route('mes_offres.create') }}" title="">Ajouter une offre</a></p>
                        <p><a href="/recruteur/cv" title="">CV</a></p>
                        <p><a href="/recruteur/alertes" title="">Mes alertes</a></p>   
                    @endif            

                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a href="/logout" title=""  onclick="event.preventDefault();
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