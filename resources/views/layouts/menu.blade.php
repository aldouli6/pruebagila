<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('types.index') }}"
       class="nav-link {{ Request::is('types*') ? 'active' : '' }}">
        <p>Types</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('vehicles.index') }}"
       class="nav-link {{ Request::is('vehicles*') ? 'active' : '' }}">
        <p>Vehicles</p>
    </a>
</li>


