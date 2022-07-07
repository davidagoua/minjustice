
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
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-user-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Profile</span>
                                        <span>View your profile</span>
                                    </div>
                                </a>
                                <a class="dropdown-item is-media layout-switcher">
                                    <div class="icon">
                                        <i class="lnil lnil-layout"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Layout</span>
                                        <span>Switch to admin/webapp</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-briefcase"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Projects</span>
                                        <span>All my projects</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-users-alt"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Team</span>
                                        <span>Manage your team</span>
                                    </div>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item is-media">
                                    <div class="icon">
                                        <i class="lnil lnil-cog"></i>
                                    </div>
                                    <div class="meta">
                                        <span>Settings</span>
                                        <span>Account settings</span>
                                    </div>
                                </a>
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
    <div id="circular-menu" class="circular-menu">

        <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
            <i aria-hidden="true" class="fas fa-bars"></i>
            <i aria-hidden="true" class="fas fa-times"></i>
        </a>

        <div class="items-wrapper">
            <div class="menu-item is-flex">
                <label class="dark-mode">
                    <input type="checkbox" checked>
                    <span></span>
                </label>
            </div>
            <a class="menu-item is-flex right-panel-trigger" data-panel="languages-panel">
                <img src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
            </a>
            <a href="/admin-profile-notifications.html" class="menu-item is-flex">
                <i data-feather="bell"></i>
            </a>
            <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
                <i data-feather="grid"></i>
            </a>
        </div>

    </div>
    <!--Sidebar-->
    @include('parts.sidebar')
    <!--Languages panel-->


    <!--Activity panel-->
    <div id="activity-panel" class="right-panel-wrapper is-activity">
        <div class="panel-overlay"></div>

        <div class="right-panel">
            <div class="right-panel-head">
                <h3>Activity</h3>
                <a class="close-panel">
                    <i data-feather="chevron-right"></i>
                </a>
            </div>
            <div class="tabs-wrapper is-triple-slider is-squared">
                <div class="tabs-inner">
                    <div class="tabs">
                        <ul>
                            <li data-tab="team-side-tab" class="is-active"><a><span>Team</span></a></li>
                            <li data-tab="projects-side-tab"><a><span>Projects</span></a></li>
                            <li data-tab="schedule-side-tab"><a><span>Schedule</span></a></li>
                            <li class="tab-naver"></li>
                        </ul>
                    </div>
                </div>

                <div class="right-panel-body">
                    <div id="team-side-tab" class="tab-content is-active">
                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/12.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Joshua S.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      Las Vegas, NV
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/25.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Melany W.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      San Jose, CA
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/18.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Esteban C.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      Miami, FL
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>

                        <!--Team Member-->
                        <div class="team-card">
                            <div class="h-avatar">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/13.jpg" alt="">
                                <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </div>
                            <div class="meta">
                                <span>Tara S.</span>
                                <span>
                                      <i data-feather="map-pin"></i>
                                      New York, NY
                                  </span>
                            </div>
                            <a class="link">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div id="projects-side-tab" class="tab-content">
                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/logos/slicer.svg" alt="">
                                <div class="meta">
                                    <span>The slicer project</span>
                                    <span>getslicer.io</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="31" max="100">31%</progress>
                                <div class="foot-stats">
                                    <span>5 / 24</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/5.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/8.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/logos/metamovies.svg" alt="">
                                <div class="meta">
                                    <span>Metamovies reworked</span>
                                    <span>metamovies.co</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="84" max="100">84%</progress>
                                <div class="foot-stats">
                                    <span>28 / 31</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/13.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/18.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Project-->
                        <div class="project-card">
                            <div class="project-inner">
                                <img class="project-avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/icons/logos/fastpizza.svg" alt="">
                                <div class="meta">
                                    <span>Fast Pizza redesign</span>
                                    <span>fastpizza.com</span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                            <div class="project-foot">
                                <progress class="progress is-primary is-tiny" value="60" max="100">60%</progress>
                                <div class="foot-stats">
                                    <span>25 / 39</span>

                                    <div class="avatar-stack">
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                        </div>
                                        <div class="h-avatar is-small">
                                            <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/25.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="schedule-side-tab" class="tab-content">
                        <!--Timeline-->
                        <div class="icon-timeline">
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="phone-call"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Call Danny at Colby's</p>
                                    <span>Today - 11:30am</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                </div>
                                <div class="timeline-content">
                                    <p>Meeting with Alice</p>
                                    <span>Today - 01:00pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="message-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Answer Annie's message</p>
                                    <span>Today - 01:45pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Send new campaign</p>
                                    <span>Today - 02:30pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="smile"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Project review</p>
                                    <span>Today - 03:30pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="phone-call"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Call Trisha Jackson</p>
                                    <span>Today - 05:00pm</span>
                                </div>
                            </div>
                            <!--Timeline item-->
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i data-feather="feather"></i>
                                </div>
                                <div class="timeline-content">
                                    <p>Write proposal for Don</p>
                                    <span>Today - 06:00pm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
    <!--Search panel-->
    <div id="search-panel" class="right-panel-wrapper is-search is-left">
        <div class="panel-overlay"></div>

        <div class="right-panel">
            <div class="right-panel-head">
                <img class="light-image" src="/assets/img/logos/logo/logo.svg" alt="" />
                <img class="dark-image" src="/assets/img/logos/logo/logo-light.svg" alt="" />
                <a class="close-panel">
                    <i data-feather="chevron-left"></i>
                </a>
            </div>
            <div class="right-panel-body has-slimscroll">
                <div class="field">
                    <div class="control has-icon">
                        <input type="text" class="input is-rounded search-input" placeholder="Search...">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
                        <div class="search-results has-slimscroll"></div>
                    </div>
                </div>

                <div class="recent">
                    <h4>Recently viewed</h4>
                    <div class="recent-block">
                        <a class="media-flex-center">
                            <div class="h-icon is-info is-rounded is-small">
                                <i data-feather="chrome"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Browser Support</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-icon is-orange is-rounded is-small">
                                <i data-feather="tv"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Twitch API</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-icon is-green is-rounded is-small">
                                <i data-feather="twitter"></i>
                            </div>
                            <div class="flex-meta">
                                <span>Twitter Auth</span>
                                <span>Blog post</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="recent">
                    <h4>Recent Members</h4>
                    <div class="recent-block">
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/7.jpg" alt="" data-user-popover="0">
                            </div>
                            <div class="flex-meta">
                                <span>Alice C.</span>
                                <span>Software Engineer</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/13.jpg" alt="" data-user-popover="6">
                            </div>
                            <div class="flex-meta">
                                <span>Tara S.</span>
                                <span>UI/UX Designer</span>
                            </div>
                        </a>
                        <a class="media-flex-center">
                            <div class="h-avatar is-small">
                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="/assets/img/avatars/photos/22.jpg" alt="" data-user-popover="5">
                            </div>
                            <div class="flex-meta">
                                <span>Jimmy H.</span>
                                <span>Project Manager</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--Page body-->


    <div class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

        <div class="page-content-wrapper">

            <div class="page-content is-relative">

                <div class="page-title has-text-centered">
                    <!-- Sidebar Trigger -->



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
            'votre demande a été prise en compte, Veuillez vous rendre dans votre juridiction de naissance ' +
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
