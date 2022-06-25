<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
        </a>
    </li>
    @can('viewAny', 'App\Models\User')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index')}}">
                <i class="ni ni-circle-08 text-pink"></i> {{ __('Users') }}
            </a>
        </li>
    @endcan

    @can('viewAny', 'App\Models\Post')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Posts') }}
        </a>
    </li>
    @endcan
    @can('viewAny', 'App\Models\Role')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Roles') }}
        </a>
    </li>
    @endcan
    @can('viewAny', 'App\Models\Permission')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('permissions.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Permissions') }}
        </a>
    </li>
    @endcan
    @can('viewAny', 'App\Models\Category')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index')}}">
            <i class="ni ni-circle-08 text-pink"></i> {{ __('Categories') }}
        </a>
    </li>
    @endcan
</ul>