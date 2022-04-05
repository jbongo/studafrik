 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-studafrik sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" target="_blank" href="{{route('welcome')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Stud'Afrik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Gestion
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user"></i>
            <span>Utilisateurs</span></a>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.candidat.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Candidats</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.recruteur.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Recruteurs</span></a>
    </li>
    
 

 <!-- Nav Item - Pages Collapse Menu -->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Offres d'emploi</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="{{route('admin.offres.index')}}">Gestion </a>
            <a class="collapse-item" href="{{route('admin.offres.archive')}}">Archives</a>
        </div>
    </div>
</li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.newsletter.index')}}">
            <i class="fas fa-fw fa-envelope-square"></i>
            <span>Newsletters</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.article.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Blog</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.commentaires.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Commentaires articles</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configuration</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{route('admin.categorie_offre.index')}}">Catégories offres</a>
                <a class="collapse-item" href="{{route('admin.categorie_article.index')}}">Catégories articles</a>
                <a class="collapse-item" href="{{route('admin.metier.index')}}">Métiers</a>
                <a class="collapse-item" href="{{route('admin.pays.index')}}">Pays offres</a>
            </div>
        </div>
    </li>

   
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.scrap_offre.index')}}">
            <i class="fas fa-fw fa-database"></i>
            <span>Offre Scrap</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('test')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Lancer le SCRAP</span></a>
    </li>

    


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