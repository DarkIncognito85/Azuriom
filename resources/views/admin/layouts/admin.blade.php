<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') | {{ site_name() }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/admin.js') }}" defer></script>

    <!-- Page level scripts -->
    @stack('scripts')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,800" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div id="app">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/azuriom-white.svg') }}" alt="Azuriom">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="{{ asset('img/azuriom-text-white.svg') }}" alt="Azuriom"><sup>{{ Azuriom::version() }}</sup>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <div class="nav-item {{ add_active('admin.dashboard') }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </div>

            @canany(['admin.settings', 'admin.navbar'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">Settings</div>
            @endcanany

            @can('admin.settings')
                <div class="nav-item {{ add_active('admin.settings.*') }}">
                    <a class="nav-link {{ Route::is('admin.settings.*') ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseSettings" aria-expanded="true" aria-controls="collapseSettings">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Settings</span>
                    </a>
                    <div id="collapseSettings" class="collapse {{ Route::is('admin.settings.*') ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Settings</h6>
                            <a class="collapse-item {{ add_active('admin.settings.index') }}" href="{{ route('admin.settings.index') }}">Global</a>
                            <a class="collapse-item {{ add_active('admin.settings.security') }}" href="{{ route('admin.settings.security') }}">Security</a>
                            <a class="collapse-item {{ add_active('admin.settings.performance') }}" href="{{ route('admin.settings.performance') }}">Performances</a>
                            <a class="collapse-item {{ add_active('admin.settings.seo') }}" href="{{ route('admin.settings.seo') }}">SEO</a>
                            <a class="collapse-item {{ add_active('admin.settings.maintenance') }}" href="{{ route('admin.settings.maintenance') }}">Maintenance</a>
                        </div>
                    </div>
                </div>
            @endcan

            @can('admin.navbar')
                <div class="nav-item {{ add_active('admin.navbar-elements.*') }}">
                    <a class="nav-link" href="{{ route('admin.navbar-elements.index') }}">
                        <i class="fas fa-fw fa-bars"></i>
                        <span>Navbar</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.users', 'admin.roles'])
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">Users</div>
            @endcanany

            @can('admin.users')
                <div class="nav-item {{ add_active('admin.users.*') }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Users</span>
                    </a>
                </div>
            @endcan

            @can('admin.roles')
                <div class="nav-item {{ add_active('admin.roles.*') }}">
                    <a class="nav-link" href="{{ route('admin.roles.index') }}">
                        <i class="fas fa-fw fa-user-tag"></i>
                        <span>Roles</span>
                    </a>
                </div>
            @endcan

            @can('admin.users')
                <div class="nav-item {{ add_active('admin.bans.*') }}">
                    <a class="nav-link" href="{{ route('admin.bans.index') }}">
                        <i class="fas fa-fw fa-user-times"></i>
                        <span>Bans</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.pages', 'admin.posts', 'admin.images'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">Content</div>
            @endcanany

            @can('admin.pages')
                <div class="nav-item {{ add_active('admin.pages.*') }}">
                    <a class="nav-link" href="{{ route('admin.pages.index') }}">
                        <i class="fas fa-fw fa-file-alt"></i>
                        <span>Pages</span>
                    </a>
                </div>
            @endcan

            @can('admin.posts')
                <div class="nav-item {{ add_active('admin.posts.*') }}">
                    <a class="nav-link" href="{{ route('admin.posts.index') }}">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Posts</span>
                    </a>
                </div>
            @endcan

            @can('admin.images')
                <div class="nav-item {{ add_active('admin.images.*') }}">
                    <a class="nav-link" href="{{ route('admin.images.index') }}">
                        <i class="fas fa-fw fa-image"></i>
                        <span>Images</span>
                    </a>
                </div>
            @endcan

            @canany(['admin.plugins', 'admin.themes'])
                <hr class="sidebar-divider">

                <div class="sidebar-heading">Extensions</div>
            @endcan

            @can('admin.plugins')
                <div class="nav-item {{ add_active('admin.plugins.*') }}">
                    <a class="nav-link" href="{{ route('admin.plugins.index') }}">
                        <i class="fas fa-fw fa-puzzle-piece"></i>
                        <span>Plugins</span>
                    </a>
                </div>
            @endcan

            @can('admin.themes')
                <div class="nav-item {{ add_active('admin.themes.*') }}">
                    <a class="nav-link" href="{{ route('admin.themes.index') }}">
                        <i class="fas fa-fw fa-paint-brush"></i>
                        <span>Themes</span>
                    </a>
                </div>
            @endcan

            @can('admin.logs')
                <hr class="sidebar-divider">

                <div class="sidebar-heading">Other</div>

                <div class="nav-item {{ add_active('admin.logs.*') }}">
                    <a class="nav-link" href="{{ route('admin.logs.index') }}">
                        <i class="fas fa-fw fa-history"></i>
                        <span>Logs</span>
                    </a>
                </div>
            @endcan

            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </nav>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Notifications -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Counter - Notifications -->
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- <span class="badge badge-danger badge-counter">1</span> -->
                            </a>
                            <!-- Dropdown - Notifications -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notificationsDropdown">
                                <h6 class="dropdown-header">Notifications</h6>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Mark as read</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ game()->getAvatarUrl(Auth::user(), 64) }}" alt="Avatar">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-route="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title', 'Admin')</h1>
                    </div>

                    @include('elements.session-alerts')

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Powered by <a href="https://azuriom.com" target="_blank" rel="noreferrer">Azuriom</a> &copy; 2019. Panel designed by <a href="https://startbootstrap.com" target="_blank">Start Bootstrap</a>.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#app">
        <i class="fas fa-angle-up"></i>
    </a>
</div>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="confirmDeleteLabel">Delete ?</h2>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete this ? It can't be undo</div>
            <div class="modal-footer">
                <button class="btn btn-secondary d-inline-block" type="button" data-dismiss="modal">Cancel</button>
                <form id="confirmDeleteForm" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@stack('footer-scripts')

</body>
</html>
