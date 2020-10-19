<aside class="col-lg-3 column border-right">
    <div class="widget">
        <div class="tree_widget-sec">
            <ul>
                @if(Auth::user()->role == "candidat")
                    <li><a href="/candidat/profile" title="">Profile</a></li>
                    <li><a href="/candidat/cv" title="">CV</a></li>
                    <li><a href="/candidat/favoris" title="">Mes favoris</a></li>
                    <li><a href="/candidat/candidatures" title="">Mes candidatures</a></li>
                    <li><a href="/candidat/alertes" title="">Mes alertes</a></li>               
                 

                @elseif(Auth::user()->role == "recruteur")
                    <li><a href="/recruteur/profile" title="">Profile</a></li>
                    <li><a href="/recruteur/jobs" title="">Offres d'emplois</a></li>
                    <li><a href="/recruteur/cv" title="">CV</a></li>
                    <li><a href="/recruteur/addjob" title="">Ajouter une offre</a></li>
                    <li><a href="/recruteur/alertes" title="">Mes alertes</a></li>               

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