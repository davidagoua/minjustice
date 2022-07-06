<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Minijust - Inscription</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

    <!--Mapbox styles-->
    @livewrieStyles
</head>

<body>
<div id="huro-app" class="app-wrapper">
    <div class="app-overlay"></div>

    <!--Full pageloader-->
    <!-- Pageloader -->
    <div class="pageloader is-full"></div>
    <div class="infraloader is-full is-active"></div>
    <!--Mobile navbar-->
    <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <!-- Mobile menu toggler icon -->

                <a class="navbar-item is-brand" href="index.html">
                    <img class="light-image" src="assets/img/logos/logo/logo.svg" alt="">
                    <img class="dark-image" src="assets/img/logos/logo/logo-light.svg" alt="">
                </a>


            </div>
        </div>
    </nav>



    <!-- Content Wrapper -->
    <div id="edit-profile" class="view-wrapper is-webapp" data-page-title="Edit Profile" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

        <div class="page-content-wrapper">
            <div class="page-content is-relative">


                <div class="page-content-inner">

                    <!--Edit Profile-->
                    <div class="account-wrapper">



                            <!--Form-->
                            <div class="column is-12">
                                <div class="account-box is-form is-footerless">
                                    <livewire:resgister-form />
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('scripts')

    <script src="assets/js/app.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/main.js" async></script>
    <script src="assets/js/components.js" async></script>
    <script src="assets/js/popover.js" async></script>
    <script src="assets/js/widgets.js" async></script>
    <script src="assets/js/touch.js" async></script>
    <script src="assets/js/profile.js" async></script>
    <script src="assets/js/syntax.js" async></script>
</div>
</body>

</html>
