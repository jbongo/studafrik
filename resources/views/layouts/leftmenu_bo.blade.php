 <!-- Sidebar -->

 
<style>

    .bg-gradient-studafrik{
        background-color:#323232;
        /* background-image:linear-gradient(180deg,#EE6E49 1%,#323232 50%); */

        background: #EE6E49;
        background-size:cover}


        @media screen and (max-width: 900px) {
        .topmenu_bo_desktop {
            display: none !important;
        }
    }

        @media screen and (min-width: 900px) {
        .topmenu_bo_mobile {
            display: none !important;
        }
}
        
</style>


 <ul class="navbar-nav bg-gradient-studafrik sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-centerx" target="_blank" href="{{route('welcome')}}">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Stud'Afrik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Gestion
    </div>



    @if(Auth::user()->role == "candidat")
    
    
    
        @if(Auth::user()->profile_complete == true)
            
    <li class="nav-item">
        <a class="nav-link" href="{{route('cv.index')}}"><i class="fas fa-fw fa-folder-open"></i><span>CV</span></a>
    </li>
    
            
    <li class="nav-item">
        <a class="nav-link" href="{{ route('candidatures.index_candidat') }}"><i class="fas fa-fw fa-list"></i><span>Mes candidatures</span></a>
    </li>
    

            
    <li class="nav-item">
        <a class="nav-link" href="{{route('favoris.offre.index')}}"><i class="fas fa-fw fa-save"></i><span>Offres sauvegardées</span></a>
    </li>
    
            {{-- <p><a href="/candidat/alertes" title="">Mes alertes</a></p>                --}}
        @endif

    @elseif(Auth::user()->role == "recruteur")

        @if(Auth::user()->profile_complete == true)

     
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mes_offres.index') }}"><i class="fas fa-fw fa-briefcase"></i><span>Offres d'emploi</span></a>
            </li>
            
    
            <li class="nav-item">
                <a class="nav-link" href="{{route('mes_offres.create')}}"><i class="fas fa-fw fa-plus"></i><span>Ajouter une offre</span></a>
            </li>
            
       
            <li class="nav-item">
                <a class="nav-link" href="{{route('cv.liste') }}"><i class="fas fa-fw fa-search"></i><span>Recherche candidats</span></a>
            </li>
            
         
            <li class="nav-item">
                <a class="nav-link" href="{{route('favoris.cv.index')}}"><i class="fas fa-fw fa-save"></i><span>CV Sauvegardés</span></a>
            </li>
            
            {{-- <p><a href="/recruteur/alertes" title="">Mes alertes</a></p>    --}}
        @endif            

    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
   
   


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">




    <form method="POST" action="{{ route('logout') }}">
        @csrf
       

        <li class="nav-item">
            <a href="/logout" title=""  onclick="event.preventDefault();
            this.closest('form').submit();" class="nav-link" href="#">
                <i class="fas fa-fw fa-power-off"></i>
                <span>Déconnexion</span></a>
        </li>
    </form>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->