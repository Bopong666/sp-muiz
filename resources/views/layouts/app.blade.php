<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>@stack('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('template/assets/css/theme.css?ver=3.0.0') }}">
    @livewireScripts
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                                class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand col-8 text-center">
                        <h2>SP</h2>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <!-- .nk-menu-item -->
                                <li class="nk-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                    <a href="{{ url('/dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item  {{ request()->routeIs('gejala') ? 'active' : '' }}">
                                    <a href="{{ route('gejala') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-virus"></em></span>
                                        <span class="nk-menu-text">Data Gejala</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item  {{ request()->routeIs('opt') ? 'active' : '' }}">
                                    <a href="{{ route('opt') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bugs"></em></span>
                                        <span class="nk-menu-text">Data Penyakit dan Hama</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item  {{ request()->routeIs('basis_pengetahuan') ? 'active' : '' }}">
                                    <a href="{{ route('basis_pengetahuan') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Data Basis Pengetahuan</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item  {{ request()->routeIs('riwayat') ? 'active' : '' }}">
                                    <a href="{{ route('riwayat') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
                                        <span class="nk-menu-text">Data Riwayat</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item  {{ request()->routeIs('profil') ? 'active' : '' }}">
                                    <a href="{{ route('profil') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                        <span class="nk-menu-text">Profil</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                                        class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-news d-none d-xl-block">
                                <div class="nk-news-list">
                                    <h3>Sistem Pakar Jambu Kristal</h3>
                                </div>
                            </div><!-- .nk-header-news -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-name dropdown-indicator">{{ Auth::user()->username
                                                        }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">

                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('profil') }}"><em
                                                                class="icon ni ni-user-alt"></em><span>
                                                                Profile</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            @yield('content')

                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 DashLite. Template by <a
                                    href="https://softnio.com" target="_blank">Softnio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @livewireScripts
    <script src="{{ asset('template/assets/js/bundle.js?ver=3.0.0') }}"></script>
    <script src="{{ asset('template/assets/js/scripts.js?ver=3.0.0') }}"></script>
    <script src="{{ asset('template/assets/js/charts/gd-default.js?ver=3.0.0') }}"></script>


    <script>
        window.addEventListener('modal-store',()=>{                             
                $('#toastId').toast('show');                       
                $('#modelId').modal('hide');
                });
        window.addEventListener('modal-edit',()=>{            
                    $('#modelId').modal('show');                
                });    
        window.addEventListener('tersimpan',()=>{                                                 
                    $('#toastId').toast('show');
                });
        window.addEventListener('modal-deleteConfirm',()=>{   
            $('#deleteId').modal('show');
        }); 
        window.addEventListener('modal-delete',()=>{  
            $('#deleteId').modal('hide');   
            $('#toastDeleteId').toast('show');            
            });              
    </script>
</body>

</html>