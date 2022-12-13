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
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top sticky">
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
                        <a class="nav-link" href="#contact">Login</a>
                    </li>
                </ul>

            </div>
            <!--end collapse-->
        </div>
        <!--end container-->
    </nav>
    <!-- END NAVBAR -->

    <!-- START HOME -->
    <section class="bg-home4 overflow-hidden" id="home">
        <div class="container">
            <div class="position-relative" style="z-index: 1;">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <div>
                            <h1 class=" text-primary mb-4">Sistem Pakar Jambu Kristal</h1>


                            <div class="mt-5">
                                <a href="{{ route('konsultasi') }}" class="btn btn-primary">Konsultasi</a>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6 offset-xl-1">
                        <div class="mt-lg-0 mt-5">
                            <img src="{{ asset('user/images/home/home1.png') }}" alt="home04" class="home-img">
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <!--end container-->
    </section>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white position-absolute">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="width: 100%;" height="250" preserveAspectRatio="none" viewBox="0 0 1440 250">
                <g mask="url(&quot;#SvgjsMask1006&quot;)" fill="none">
                    <path d="M 0,246 C 288,210 1152,102 1440,66L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                </g>
                <defs>
                    <mask id="SvgjsMask1006">
                        <rect width="1440" height="250" fill="#ffffff"></rect>
                    </mask>
                </defs>
            </svg>
        </div>
    </div>
    <!-- END HOME -->

    <!-- START FEATURE  -->
    <section class="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="features-box">
                        <h3 class="mb-4">Tanaman Jambu Kristal</h3>
                        <p class="text-muted mb-4">&nbsp;&nbsp; Jambu kristal adalah jambu biji yang berasal dari Taiwan
                            dan banyak digemari oleh masyarakat. Jambu kristal memiliki daya saing tinggi karena
                            memiliki beberapa keunggulan yaitu, unggul dalam cita rasa yang segar, manis, kres,
                            berdaging tebal dan hampir tanpa biji, mudah dibudidayakan, frekuensi panen yang tinggi
                            peluang wirausaha yang tinggibaik buah dan pembibitan.
                        </p>
                        <p class="text-muted">&nbsp;&nbsp; Jambu kristal memiliki banyak manfaat bagi kesehatan tubuh.
                            Jambu biji mengandung vitamin C empat kali lebih banyak dari jeruk (lebih dari 200 miligram
                            per 100 gram), vitamin A yang baik untuk kesehatan mata, vitamin B, magnesium, kalium dan
                            berkalori rendah. Selain itu, jambu biji mengandung beberapa antioksidan yang berguna untuk
                            menghindarkan tubuh dari berbagai macam penyakit.</p>
                    </div>
                    <!--end feature-box-->
                </div>
                <!--end col-->
                <div class="col-lg-6 offset-lg-1">
                    <div class="text-center mt-5 mt-lg-0">
                        <img src="{{ asset('user/images/features.png') }}" alt="Features" class="img-fluid">
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END FEATURE -->

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