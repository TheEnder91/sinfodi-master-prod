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
                @if (Auth::user()->hasPermissionTo('estimulo-objetivo-index') || Auth::user()->hasPermissionTo('estimulo-actividadA-index') || Auth::user()->hasPermissionTo('estimulo-actividadB-index') ||
                     Auth::user()->hasPermissionTo('estimulo-responsabilidad-index') || Auth::user()->hasPermissionTo('estimulo-meta-index') || Auth::user()->hasPermissionTo('estimulo-impacto-index') ||
                     Auth::user()->hasPermissionTo('estimulo-desempeño-index'))
                    <li class="nav-header">ESTIMULOS</li>
                @endif
                @if (Auth::user()->hasPermissionTo('estimulo-objetivo-index') || Auth::user()->hasPermissionTo('estimulo-actividadA-index') || Auth::user()->hasPermissionTo('estimulo-actividadB-index') ||
                     Auth::user()->hasPermissionTo('estimulo-responsabilidad-index') || Auth::user()->hasPermissionTo('estimulo-meta-index') || Auth::user()->hasPermissionTo('estimulo-impacto-index') ||
                     Auth::user()->hasPermissionTo('estimulo-desempeño-index'))
                    <li class="nav-item {{ isMenuOpen('estimulo.configuracion') }}">
                        <a href="#" class="nav-link {{ isRouteActive('estimulo.configuracion') }}">
                            <i class="nav-icon fa fa-cog"></i>
                            <p><b>Configuración</b><i class="fa fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('estimulo-objetivo-index')
                                <li class="nav-item">
                                    <a href="{{ route('estimulo.configuracion.objetivo.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.objetivo') }}">
                                        <i class="nav-icon fa fa-circle fa-2x"></i>
                                        <p>Objetivos</p>
                                    </a>
                                </li>
                            @endcan
                            @if (Auth::user()->hasPermissionTo('estimulo-actividadA-index') || Auth::user()->hasPermissionTo('estimulo-actividadB-index') || Auth::user()->hasPermissionTo('estimulo-responsabilidad-index'))
                                <li class="nav-item {{ isMenuOpen('estimulo.configuracion.factor1') }}">
                                    <a href="#" class="nav-link {{ isRouteActive('estimulo.configuracion.factor1') }}">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p><b>Factor 1</b><i class="fa fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('estimulo-actividadA-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor1.actividadA.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor1.actividadA') }}">
                                                    <i class="far fa-circle fa-2x nav-icon"></i>
                                                    <p>Actividades A</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('estimulo-actividadB-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor1.actividadB.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor1.actividadB') }}">
                                                    <i class="far fa-circle fa-2x nav-icon"></i>
                                                    <p>Actividades B</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('estimulo-responsabilidad-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor1.responsabilidad.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor1.responsabilidad') }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Responsabilidades</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->hasPermissionTo('estimulo-meta-index') || Auth::user()->hasPermissionTo('estimulo-impacto-index'))
                                <li class="nav-item {{ isMenuOpen('estimulo.configuracion.factor2') }}">
                                    <a href="#" class="nav-link {{ isRouteActive('estimulo.congifuracion.factor2') }}">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p><b>Factor 2</b><i class="fa fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('estimulo-meta-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor2.meta.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor2.meta') }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Metas alcanzadas</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('estimulo-impacto-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor2.impacto.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor2.impacto') }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Nivel de impacto</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->hasPermissionTo('estimulo-desempeño-index'))
                                <li class="nav-item {{ isMenuOpen('estimulo.configuracion.factor3') }}">
                                    <a href="#" class="nav-link {{ isRouteActive('estimulo.configuracion.factor3') }}">
                                        <i class="nav-icon fa fa-circle"></i>
                                        <p><b>Factor 3</b><i class="fa fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('estimulo-desempeño-index')
                                            <li class="nav-item">
                                                <a style="font-size: 15px;" href="{{ route('estimulo.configuracion.factor3.desempeno.index') }}" class="nav-link {{ isRouteActive('estimulo.configuracion.factor3.desempeno') }}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Desempeño</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
