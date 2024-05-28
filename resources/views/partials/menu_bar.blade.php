
<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link" > <i class="fas fa-home"></i> Acceuil</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/emails/contact')}}"  class="nav-link"> <i class="fas fa-envelope-square"></i> Nous contacter</a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-language"></i> Language
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="lang/en">EN</a>
            <a class="dropdown-item" href="lang/fr">FR</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>

    <li class="nav-item">

    </li>




</ul>



<!-- Right navbar links -->


<ul class="navbar-nav ml-auto" >
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" class="nav-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit()">
            <p>
                <i class="nav-icon fas fa-power-off"></i>
                Déconnexion
            </p>
        </a>
        <form id="logout-form" action="{{  route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
