<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

    @can('voir_gestion_utilisateur')
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fas fa-cogs"></i>
                <p>
                    Gestion des utilisateurs
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link">
                        <i class="fas fa-user-tag nav-icon"></i>
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link">
                        <i class="fas fa-bomb nav-icon"></i>
                        <p>Permissions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>Utilisateurs</p>
                    </a>
                </li>


                <li class="nav-item">
                   <a href="{{ route('teams.index') }}" class="nav-link">
                        <i class="fas fa-project-diagram"></i>                                <p>Equipes</p>
                    </a>
                </li>


                @can('voir_journal')
                <li class="nav-item">
                    <a href="{{url('/journal')}}" class="nav-link">
                        <i class="fa-fw nav-icon fas fa-file-alt"></i>
                        <p>Journal </p>

                    </a>
                </li>
                @endcan
            </ul>
        </li>
    @endcan
    @can('voir_startup')

        <li class="nav-item">
            <a href="{{ route('startup.index') }}" class="nav-link">
                <i class="fas fa-rocket"></i>
                <p>Annuaire Startup</p>
            </a>
        </li>
    @endcan

    @can('voir_financiere')
        <li class="nav-item">
            <a href="{{ route('financiere.index') }}" class="nav-link">
                <i class="fas fa-landmark"></i>
                <p>Structure Financière</p>

            </a>
        </li>
    @endcan

    @can('voir_accompagnement')
        <li class="nav-item">
            <a href="{{ route('accompagnement.index') }}" class="nav-link">
                <i class="fas fa-sitemap"></i>
                <p>Structure d'Accompagnement</p>
            </a>
        </li>
    @endcan

    @can("voir_statistique")
        <li class="nav-item">
            <a href="{{url('/statistiques')}}" class="nav-link">
                <i class="fas fa-chart-bar"></i>
                <p>Statistique</p>
            </a>
        </li>
    @endcan


    @can('rechercher')
    <li class="nav-item">
        <a href="{{url('/recherche')}}" class="nav-link">
            <i class="fas fa-search"></i>
            <p>Recherche</p>
        </a>
    </li>
    @endcan

    
    @can('importer_startup')
    <li class="nav-item">
        <a href="{{ route('import-export') }}" class="nav-link">
        <i class="fas fa-exchange-alt"></i>
        <p> Import / Export </p>
        </a>
    </li>
    @endcan



    <li class="nav-item">
        <a href="#" class="nav-link active">
            <i class="fas fa-users-cog"></i>

            <p>
                Gestion du profil
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('user.profil') }}" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <p>Profil</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('userGetPassword')}}" class="nav-link">
                    <i class="fas fa-lock nav-icon"></i>
                    <p>Changer Password</p>
                </a>
            </li>
        </ul>
    </li>
</ul>
