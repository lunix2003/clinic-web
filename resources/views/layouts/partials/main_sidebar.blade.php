<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin_assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Klinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.patients') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('patient.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.patients') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.patients') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.services') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('service.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.services') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.services') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Doctor Dashboard --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.doctors') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctor.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.doctors') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctor.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.doctors') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                 {{-- Contact Dashboard --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.contacts') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.contacts') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.contacts') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                 {{-- Appointment Dashboard --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.appointments') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('appointment.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.appointments') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('appointment.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.appointments') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--Testimonial Dashboard --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.testimonials') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('testimonial.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.testimonials') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('testimonial.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.testimonials') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- System information Dashboard --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ trans('menu.infos') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('info.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> 
                                <p>{{ trans('global.new') }} {{ trans('menu.infos') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('info.index') }}" class="nav-link">
                                <i class="fa fa-eye"></i> 
                                <p>{{ trans('global.list') }} {{ trans('menu.infos') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>