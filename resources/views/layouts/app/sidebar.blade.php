<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body id="page-top">
        @php $unread = auth()->user()->can('access-admin') ? \App\Models\Enquiry::unread()->count() : 0; @endphp

        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}" wire:navigate>
                    <div class="sidebar-brand-icon">
                        <img src="{{ asset('/images/honeybadger-mark.png') }}" alt="" class="rounded-circle" style="width: 2rem; height: 2rem; object-fit: contain;">
                    </div>
                    <div class="sidebar-brand-text mx-3">HoneyBadger</div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}" wire:navigate>
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>

                @can('access-admin')
                    <hr class="sidebar-divider">

                    <div class="sidebar-heading">
                        {{ __('Admin') }}
                    </div>

                    <li class="nav-item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.pages.index') }}" wire:navigate>
                            <i class="fas fa-fw fa-file-alt"></i>
                            <span>{{ __('Pages') }}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.enquiries.index') }}" wire:navigate>
                            <i class="fas fa-fw fa-envelope"></i>
                            <span>
                                {{ __('Enquiries') }}
                                @if ($unread > 0)
                                    <span class="badge badge-danger">{{ $unread }}</span>
                                @endif
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.users.index') }}" wire:navigate>
                            <i class="fas fa-fw fa-users"></i>
                            <span>{{ __('Users') }}</span>
                        </a>
                    </li>
                @endcan

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <ul class="navbar-nav ml-auto">
                            @can('access-admin')
                                <li class="nav-item mx-1">
                                    <a class="nav-link" href="{{ route('admin.enquiries.index') }}" wire:navigate>
                                        <i class="fas fa-bell fa-fw"></i>
                                        @if ($unread > 0)
                                            <span class="badge badge-danger badge-counter">{{ $unread }}</span>
                                        @endif
                                    </a>
                                </li>

                                <div class="topbar-divider d-none d-sm-block"></div>
                            @endcan

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white" style="width: 2.25rem; height: 2.25rem;">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}" wire:navigate>
                                        <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Settings') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Log out') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>&copy; {{ now()->year }} HoneyBadger Norwich</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">{{ __('Ready to leave?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Select "Log out" below if you are ready to end your current session.') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary" data-test="logout-button">{{ __('Log out') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="toast-container" class="position-fixed" style="top: 1rem; right: 1rem; z-index: 1090; min-width: 250px;"></div>

        @filepondScripts
        @fluxScripts
    </body>
</html>
