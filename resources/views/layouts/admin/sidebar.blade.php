<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li
            class="nav-item {{ request()->is('admin/country*') || request()->is('admin/travel_package*') || request()->is('admin/gallery*') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ request()->is('admin/country*') || request()->is('admin/travel_package*') || request()->is('admin/gallery*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Master
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('country') }}"
                        class="nav-link {{ request()->is('admin/country*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Country</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('travel_package') }}"
                        class="nav-link {{ request()->is('admin/travel_package*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Travel Package</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery') }}"
                        class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Gallery</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ request()->is('admin/travel_offer*') ? 'active' : '' }}">
            <a href="{{ route('travel_offer') }}"
                class="nav-link {{ request()->is('admin/travel_offer*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-plane"></i>
                <p>
                    Travel Offers
                    {{-- <span class="right badge badge-danger">New</span> --}}
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->