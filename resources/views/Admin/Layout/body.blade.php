<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAXIMUS TELECOM | ADMIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ 'admin/plugins/fontawesome-free/css/all.min.css' }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'admin/dist/css/adminlte.min.css' }}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link text-center">
                {{-- <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light h2 text-center">MAXIMUS <br> TELECOM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.categories') }}"
                                class="nav-link @if (Route::currentRouteName() == 'admin.categories') active @endif">
                                <i class="nav-icon fas fa-border-all"></i>
                                <p>
                                    Liste des categories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands') }}"
                                class="nav-link @if (Route::currentRouteName() == 'admin.brands') active @endif">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Liste des marques
                                </p>
                            </a>
                        </li>
                        <li class="nav-item @if (Route::currentRouteName() == 'admin.products' || Route::currentRouteName() == 'admin.products.info') menu-open @endif">
                            <a href="#" class="nav-link @if (Route::currentRouteName() == 'admin.products' || Route::currentRouteName() == 'admin.products.info') active @endif">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Liste des produits
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach (categories() as $category)
                                    <li class="nav-item">
                                        <a href="{{ route('admin.products', [$category->uuid]) }}"
                                            class="nav-link @if (url()->current() == 'http://127.0.0.1:8000/admin.products' . $category->uuid) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                {{ $category->name }}
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                                @if (Route::currentRouteName() == 'admin.products.info')
                                    <li class="nav-item">
                                        <a href="#"
                                            class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Information
                                            </p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('admin.profile') }}"
                              class="nav-link @if (Route::currentRouteName() == 'admin.profile') active @endif">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Profil
                              </p>
                          </a>
                      </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-{{ now()->format('Y') }} <a href="{{ route('index') }}">MAXIMUS
                    TELECOM</a>.</strong> tout les droits reservés.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(jQuery).ready(function() {
            $('.deleteChamp').on('click', function() {
                name = $(this).attr("name");
                confirmation = confirm("Voulez-vous continuer la suppression de la " + name + " ?");
                if (confirmation) {
                    action = $(this).attr("action");
                    // alert(action);
                    $.ajax({
                        url: '' + action + '',
                        method: 'GET',
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            });
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    @yield('script')
</body>

</html>
