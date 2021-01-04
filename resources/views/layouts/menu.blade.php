<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>





<li class="side-menus {{ Request::is('criterias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('criterias.index') }}"><i class="fas fa-building"></i><span>Criterias</span></a>
</li>

