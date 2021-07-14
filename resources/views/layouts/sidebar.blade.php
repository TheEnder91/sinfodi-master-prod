<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('welcome') }}" class="brand-link">
        <img src="{{ asset('img/cideteq.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>S I N F O D I</b></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->username }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $AnyPermissionsPanelControl = 0;
                    if(Auth::user()->hasPermissionTo('admin-user-index') || Auth::user()->hasPermissionTo('admin-role-index') || Auth::user()->hasPermissionTo('admin-permission-index')){
                        $AnyPermissionsPanelControl = 1;
                    }
                @endphp
                @if ($AnyPermissionsPanelControl == 1)
                    <li class="nav-header">PANEL DE CONTROL</li>
                @endif
                @can('admin-user-index')
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link {{ isRouteActive('admin.user') }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                @endcan
                @can('admin-role-index')
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="nav-link {{ isRouteActive('admin.role') }}">
                            <i class="nav-icon fa fa-unlock-alt"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endcan
                @can('admin-permission-index')
                    <li class="nav-item">
                        <a href="{{ route('admin.permission.index') }}" class="nav-link {{ isRouteActive('admin.permission') }}">
                            <i class="nav-icon fa fa-key"></i>
                            <p>Permisos</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>
