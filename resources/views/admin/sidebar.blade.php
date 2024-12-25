{{-- container of the sidebar to make it dynamically color changable --}}
<div id="sidebar_color">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        {{-- Logo --}}
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> Store </div>
        </a>
        {{-- ./Logo --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}

        {{-- Dashboard Link --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('admin.dash') }}</span></a>
        </li>
        {{-- ./Dashboard Link --}}

        <hr class="sidebar-divider my-0">{{-- Divider --}}

        {{-- Categories --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tags"></i>
                <span>{{ __('admin.categories') }}</span>
            </a>
            <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item"
                        href="{{ route('admin.categories.index') }}">{{ __('admin.all_categories') }}</a>
                    <a class="collapse-item" href="{{ route('admin.categories.create') }}">{{ __('admin.add_new') }}</a>
                </div>
            </div>
        </li>
        {{-- ./Categories --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}
        {{-- Products --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                aria-expanded="true" aria-controls="collapseProducts">
                <i class="fas fa-fw fa-heart"></i>
                <span>{{ __('admin.products') }}</span>
            </a>
            <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.products.index') }}"> {{ __('admin.all_products') }}
                    </a>
                    <a class="collapse-item" href="{{ route('admin.products.create') }}">{{ __('admin.add_new') }}</a>
                </div>
            </div>
        </li>
        {{-- ./Products --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}
        {{-- Orders --}}
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>{{ __('admin.all_orders') }}</span></a>
        </li>
        {{-- ./Orders --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}

        {{-- Payments --}}
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>{{ __('admin.payments') }}</span></a>
        </li>
        {{-- ./Payments --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}

        {{-- Roles --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles"
                aria-expanded="true" aria-controls="collapseRoles">
                <i class="fas fa-fw fa-lock"></i>
                <span>{{ __('admin.role') }}</span>
            </a>
            <div id="collapseRoles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="buttons.html">{{ __('admin.all_roles') }}</a>
                    <a class="collapse-item" href="cards.html">{{ __('admin.add_new') }}</a>
                </div>
            </div>
        </li>
        {{-- ./Roles --}}

        <hr class="sidebar-divider my-0"> {{-- Divider --}}

        {{-- Cusotmers --}}
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('admin.customers') }}</span></a>
        </li>
        {{-- ./Customers --}}

        <hr class="sidebar-divider d-none d-md-block"> {{-- Divider --}}

        {{-- Toggles Sidebar Button --}}
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        {{-- ./Toggles Sidebar Button --}}

    </ul>
    {{-- ./EndOfSideBar --}}
</div>
