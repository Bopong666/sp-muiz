<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap css-->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Materialdesign icon-->
    <link rel="stylesheet" href="{{ asset('user/css/materialdesignicons.min.css') }}" type="text/css" />

    <!-- Swiper Slider css -->

    <!-- Custom Css -->
    <link href="{{ asset('user/css/style.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- colors -->
    <link href="{{ asset('user/css/colors/default.css') }}" rel="stylesheet" type="text/css" id="color-opt" />
    @livewireStyles
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-navlist" data-bs-offset="60">

    <!--start page Loader -->
    <div id="preloader">
        <div id="status">
            <div class="load">
                <hr />
                <hr />
                <hr />
                <hr />
            </div>
        </div>
    </div>
    <!--end page Loader -->

    <!-- START NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top sticky bg-success">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">SP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="mdi mdi-menu text-muted"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact">Login</a>
                    </li>
                </ul>

            </div>
            <!--end collapse-->
        </div>
        <!--end container-->
    </nav>
    <!-- END NAVBAR -->

    <!-- START HOME -->
    <section class="bg-home4 overflow-hidden" style="padding: 90px 0 50px 0;" id="home">
        <div class="container">
            <p class="fs-2 text-center">Konsultasi</p>
            @yield('content')
        </div>
        <!--end container-->
    </section>
    <!-- END HOME -->


    <!-- START FOOTER -->
    <footer class="bg-dark section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!--end footer-terms-->
                    <div class="mt-4 pt-2 text-center">
                        <p class="text-white-50 mb-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Landsay - Design with <i class="mdi mdi-heart text-danger"></i> by
                            <a href="https://themeforest.net/search/themesdesign" class="text-muted">Themesdesign.</a>
                        </p>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </footer>
    <!-- END FOOTER -->



    @livewireScripts
    @stack('scripts')
    <!--start back-to-top-->
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!--end back-to-top-->


    <!-- Bootstrap Bundale js -->
    <script src="{{ asset('user/js/bootstrap.bundle.min.js') }}"></script>


    <!-- App js -->
    <script src="{{ asset('user/js/app.js') }}"></script>
</body>

</html>