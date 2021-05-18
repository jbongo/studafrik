
<style>
    .menugauche {
        color:white;
        font-size:18px;
    }
    .bg-gradient-studafrik{
        background-color:#323232;
        /* background-image:linear-gradient(180deg,#EE6E49 1%,#323232 50%); */

        background: #EE6E49;
        background-size:cover}
</style>
{{-- 
<aside class="col-lg-2 col-md-2  bg-gradient-studafrik " >
    <div class="widget" style="margin-left: 5px ">
        <div class="tree_widget-sec">
            <ul>
                @if(Auth::user()->role == "candidat")
                <p class="menugauche"><a href="{{ route('dashboard') }}" title="">Profil</a></p>
                    @if(Auth::user()->profile_complete == true)
                        <p class="menugauche"><a href="{{route('cv.index')}}" title="">CV</a></p>
                        <p class="menugauche"><a href="{{ route('candidatures.index') }}" title="">Mes candidatures</a></p>
                        <p class="menugauche"><a href="{{route('favoris.offre.index')}}" title="">Offres sauvegardées</a></p>
                    @endif

                @elseif(Auth::user()->role == "recruteur")

                <p class="menugauche"> <a href="{{ route('dashboard') }}" title="">Profil</a> </p>
                    @if(Auth::user()->profile_complete == true)
 
                        <p class="menugauche"><a href="{{ route('mes_offres.index') }}" title="">Offres d'emploi</a></p>
                        <p class="menugauche"><a href="{{ route('mes_offres.create') }}" title="">Ajouter une offre</a></p>
                        <p class="menugauche"><a href="{{ route('cv.liste') }}" title="">Recherche candidats </a></p>
                        <p class="menugauche"><a href="{{route('favoris.cv.index')}}" title="">CV Sauvegardés</a></p>
                    @endif            

                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a href="/logout" title="" class="menugauche"  onclick="event.preventDefault();
                        this.closest('form').submit();" >Déconnexion</a></li> 

                </form>
               

            </ul>
        </div>
    </div>
  
</aside> --}}



 <!-- Page Wrapper -->
 <div id="wrapper">

 



 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-studafrik sidebar sidebar-dark accordion" id="accordionSidebar">

 

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
        <a class="nav-link" href="{{ route('candidatures.index') }}"><i class="fas fa-fw fa-list"></i><span>Mes candidatures</span></a>
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

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>

    

                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">

  

                     <div class="topbar-divider d-none d-sm-block"></div>

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nom}}</span>
                             {{-- <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg"> --}}
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="{{route('dashboard')}}">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Profil
                             </a>
                             {{-- <a class="dropdown-item" href="#">
                                 <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Settings
                             </a>
                             <a class="dropdown-item" href="#">
                                 <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Activity Log
                             </a> --}}
                             <div class="dropdown-divider"></div>
                             <form method="POST" action="{{ route('logout') }}">
                                @csrf
                             <a class="dropdown-item" href="/logout" title=""  onclick="event.preventDefault();
                             this.closest('form').submit();">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Déconnexion
                             </a>
                             
                             </form>
                         </div>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->


























