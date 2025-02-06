<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Products</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('cyborg/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('cyborg/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('cyborg/assets/css/templatemo-cyborg-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('cyborg/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('cyborg/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

   
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <span class="logo_main">Second-Brain</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search End ***** -->
                        <div class="search-input">
                            <form id="search" action="#">
                                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                    onkeypress="handle" />
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                        <!-- ***** Search End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href=""class="active">Home</a></li>
                            <li><a href="">Browse</a></li>
                            <li><a href="">Details</a></li>
                            <li><a href="">Streams</a></li>
                            <li><a href="">Profile <img
                                        src="{{ asset('cyborg/assets/images/profile-header.jpg') }}" alt=""></a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="" class="logo">
                            <span class="logo_main">Second-Brain</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search End ***** -->
                        <div class="search-input">
                            <form id="search" action="#">
                                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                                    onkeypress="handle" />
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                        <!-- ***** Search End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href=""class="active">Home</a></li>
                            <li><a href="">Browse</a></li>
                            <li><a href="">Details</a></li>
                            <li><a href="">Streams</a></li>
                            <li><a href="">Profile <img
                                        src="{{ asset('cyborg/assets/images/profile-header.jpg') }}" alt=""></a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <main>
        {{ $slot }}
    </main>
    <!-- modal code here -->
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('cyborg/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('cyborg/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('cyborg/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('cyborg/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('cyborg/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('cyborg/assets/js/popup.js') }}"></script>
    <script src="{{ asset('cyborg/assets/js/custom.js') }}"></script>
    {{-- {{asset('vasperr/assets/css/main.css')}} --}}
</body>
</html>

