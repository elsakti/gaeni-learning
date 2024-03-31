<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/iconF.svg') }}">


    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href={{ asset("assets/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/animate.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/aos.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/magnific-popup.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/icofont.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/css/slick.css") }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href={{ asset("assets/css/style.css") }}>



    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark") {
          document.documentElement.classList.remove("is_dark");
        } 
    </script>

</head>


<body class="body__wrapper">
   

    <main class="main_wrapper overflow-hidden">
        @yield('content')
    </main>
    
    
    
    
    
    
    <!-- JS here -->
    @include('sweetalert::alert')
    <script src={{ asset("assets/js/vendor/modernizr-3.5.0.min.js") }}></script>
    <script src={{ asset("assets/js/vendor/jquery-3.6.0.min.js") }}></script>
    <script src={{ asset("assets/js/popper.min.js") }}></script>
    <script src={{ asset("assets/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets/js/isotope.pkgd.min.js") }}></script>
    <script src={{ asset("assets/js/slick.min.js") }}></script>
    <script src={{ asset("assets/js/jquery.meanmenu.min.js") }}></script>
    <script src={{ asset("assets/js/ajax-form.js") }}></script>
    <script src={{ asset("assets/js/wow.min.js") }}></script>
    <script src={{ asset("assets/js/jquery.scrollUp.min.js") }}></script>
    <script src={{ asset("assets/js/imagesloaded.pkgd.min.js") }}></script>
    <script src={{ asset("assets/js/jquery.magnific-popup.min.js") }}></script>
    <script src={{ asset("assets/js/waypoints.min.js") }}></script>
    <script src={{ asset("assets/js/jquery.counterup.min.js") }}></script>
    <script src={{ asset("assets/js/plugins.js") }}></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src={{ asset("assets/js/main.js") }}></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
        } 
        if (localStorage.getItem("theme-color") === "light") {
          document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
        } 
      </script>


</body>

</html>