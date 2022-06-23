<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Users') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Posts') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Roles') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('permissions.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Permissions') }}
        </a>
    </li>
</ul>