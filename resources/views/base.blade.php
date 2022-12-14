
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>MinJustice</title>
    <link rel="icon" type="image/png" href="/images/logo.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    @livewireStyles


    @stack('styles')
</head>

<body>
<div id="huro-app" class="app-wrapper">
    <div class="app-overlay"></div>
    <!--Pageloader-->
    <!-- Pageloader -->
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <!--Mobile navbar-->
    <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <!-- Mobile menu toggler icon -->
                <div class="brand-start">
                    <div class="navbar-burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <a class="navbar-item is-brand" href="index.html">
                    <img class="logo-light" src="/images/logo.png" alt="" height="50">
                    <img class="logo-light" src="/images/logo.png" alt="" height="50">
                </a>

                <div class="brand-end">



                    <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                        <div class="is-trigger" aria-haspopup="true">
                            <div class="profile-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/8.jpg" alt="">
                            </div>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="dropdown-head">
                                    <div class="h-avatar is-large">
                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/8.jpg" alt="">
                                    </div>
                                    <div class="meta">
                                        <span>{{ auth()->user()->fullName }}</span>
                                    </div>
                                </div>

                                <hr class="dropdown-divider">
                                <div class="dropdown-item is-button">
                                    <a href="{{ route('simple-logout') }}" class="button h-button is-primary is-raised is-fullwidth logout-button">
                                            <span class="icon is-small">
                                              <i data-feather="log-out"></i>
                                          </span>
                                        <span>Se deconnecter</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!--Mobile sidebar-->

    <!--Circular menu-->

    <!--Sidebar-->
    @include('parts.sidebar')
       <!--Sidebar-->


        </div>
    </div>
    <!--Page body-->


    <div class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

        <div class="page-content-wrapper">

            <div class="page-content is-relative">

                <div class="page-title has-text-centered">
                    <!-- Sidebar Trigger -->

                    @if(isset($page_title))
                    <div class="title-wrap">
                        <h1 class="title is-4">{{ $page_title }}</h1>
                    </div>
                    @endif

                    <div class="toolbar ml-auto">

                        <div class="toolbar-link">
                            <label class="dark-mode ml-auto">
                                <input type="checkbox" checked>
                                <span></span>
                            </label>
                        </div>

                        <livewire:notification-widget/>





                    </div>
                </div>
            @yield('content')

            </div>

        </div>

    </div>

    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('scripts')

    @stack('lscripts')
    <!--Huro Scripts-->
    <!--Load Mapbox-->

    <!-- Concatenated plugins -->
    <script src="/assets/js/app.js"></script>

    <!-- Huro js -->
    <script src="/assets/js/functions.js"></script>
    <script src="/assets/js/main.js" async></script>
    <script src="/assets/js/components.js" async></script>
    <script src="/assets/js/popover.js" async></script>
    <script src="/assets/js/widgets.js" async></script>


    <!-- Additional Features -->
    <script src="/assets/js/touch.js" async></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/syntax.js" async></script>
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <script>
        @if(session('demande_registered'))
        Swal.fire(
            '{{ session('demande_registered') }}',
            'votre demande a ??t?? prise en compte, Veuillez vous rendre dans votre juridiction de naissance ' +
            'avec les originaux des document soumis pour valider le processus',
            'success'
        )
        @endif

        @if(session('error'))
        Swal.fire(
            '{{ session('error') }}',
        )
        @endif


    </script>


</div>
</body>

</html>
