<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="navigation-header">
        <span data-i18n="Apps &amp; Pages">Menú</span><i data-feather="more-horizontal"></i>
    </li>
    <li class=" nav-item">
        <a class="d-flex align-items-center" href="{{url('/')}}">
            <i class="fa fa-home"></i><span class="menu-title text-truncate">Inicio</span>
        </a>
    </li>
    <li class=" nav-item">
        <a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i><span class="menu-title text-truncate">Cerrar Sesión</span>
        </a>
    </li>
</ul>