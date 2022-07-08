<div class="main-sidebar">
    <div class="sidebar-brand">
        <a href="../dist/">
            <img class="light-image" src="/images/logo.png" alt="">
            <img class="dark-image" src="/images/logo.png" alt="">
        </a>
    </div>
    <div class="sidebar-inner">

        <div class="naver"></div>

        <ul class="icon-menu">
            <!-- Activity -->
            <li >
                <a href="{{ route('dashboard') }}" title="Tableau de bord" id="home-sidebar-menu" >
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li> <!-- Layouts -->

            <li>
                <a href="{{ route('documents') }}" id="elements-sidebar-menu" title="Mes documents">
                    <i class="sidebar-svg" data-feather="file-text"></i>
                </a>
            </li> <!-- Bugs -->
            <li>
                <a href="{{ route('demande.type') }}" id="layouts-sidebar-menu" title="Demande de document">
                    <i class="sidebar-svg" data-feather="file-plus"></i>
                </a>
            </li> <!-- Bounties -->
            <li>
                <a href="{{ route('notification') }}" id="components-sidebar-menu" title="Filiation">
                    <i class="sidebar-svg" data-feather="users"></i>
                </a>
            </li> <!-- Messaging -->

        </ul>

        <!-- User account -->
        <ul class="bottom-menu">


            <li id="user-menu">
                <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                    <img src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                    <span class="status-indicator is-red"></span>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-head">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                </div>
                                <div class="meta">
                                    <span>{{ auth()->user()->fullName }}</span>

                                </div>
                            </div>
                            <a href="{{ route('profile.index') }}" class="dropdown-item is-media">
                                <div class="icon">
                                    <i class="lnil lnil-user-alt"></i>
                                </div>
                                <div class="meta">
                                    <span>Profile</span>
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
            </li>



        </ul>
    </div>
</div>
