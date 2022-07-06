@extends('base')


@section('content')
    <div class="page-content is-relative">

        <div class="page-title has-text-centered">
            <!-- Sidebar Trigger -->
            <div class="huro-hamburger nav-trigger push-resize" data-sidebar="layouts-sidebar">
                            <span class="menu-toggle has-chevron">
                              <span class="icon-box-toggle">
                                  <span class="rotate">
                                      <i class="icon-line-top"></i>
                                      <i class="icon-line-center"></i>
                                      <i class="icon-line-bottom"></i>
                                  </span>
                            </span>
                            </span>
            </div>

            <div class="title-wrap">
                <h1 class="title is-4">Modifier mon profile</h1>
            </div>

            <div class="toolbar ml-auto">

                <div class="toolbar-link">
                    <label class="dark-mode ml-auto">
                        <input type="checkbox" checked="">
                        <span></span>
                    </label>
                </div>

                <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                    <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                </a>

                <div class="toolbar-notifications is-hidden-mobile">
                    <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                        <div class="is-trigger" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            <span class="new-indicator pulsate"></span>
                        </div>
                        <div class="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <div class="heading">
                                    <div class="heading-left">
                                        <h6 class="heading-title">Notifications</h6>
                                    </div>
                                    <div class="heading-right">
                                        <a class="notification-link" href="/admin-profile-notifications.html">See all</a>
                                    </div>
                                </div>
                                <ul class="notification-list">
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg">
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Alice C.</span> left a comment.</p>
                                                <p class="time">1 hour ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg">
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Joshua S.</span> uploaded a file.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/13.jpg">
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Tara S.</span> sent you a message.</p>
                                                <p class="time">2 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="notification-item">
                                            <div class="img-left">
                                                <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/25.jpg">
                                            </div>
                                            <div class="user-content">
                                                <p class="user-info"><span class="name">Melany W.</span> left a comment.</p>
                                                <p class="time">3 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                </a>
            </div>
        </div>

        <div class="page-content-inner">

            <!--Edit Profile-->
            <div class="account-wrapper">
                <div class="columns">

                    <!--Navigation-->
                    <div class="column is-4">
                        <div class="account-box is-navigation">
                            <div class="media-flex-center">
                                <div class="h-avatar is-large">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                                </div>
                                <div class="flex-meta">
                                    <span>{{ $user->fullName }}</span>
                                </div>
                            </div>

                            <div class="account-menu">
                                <a href="{{ route('profile.edit', ['profile'=>$user]) }}?step=1" class="account-menu-item">
                                    <i class="lnil lnil-user-alt"></i>
                                    <span>Informations personnelles</span>
                                    <span class="end">
                                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                              </span>
                                </a>
                                <a href="{{ route('profile.edit', ['profile'=>$user]) }}?step=2" class="account-menu-item  is-active">
                                    <i class="lnil lnil-crown-alt"></i>
                                    <span>Informations filiations</span>
                                    <span class="end">
                                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                              </span>
                                </a>
                                <a href="/admin-profile-edit-3.html" class="account-menu-item">
                                    <i class="lnil lnil-quill"></i>
                                    <span>Skills</span>
                                    <span class="end">
                                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                              </span>
                                </a>
                                <a href="/admin-profile-edit-4.html" class="account-menu-item">
                                    <i class="lnil lnil-cog"></i>
                                    <span>Settings</span>
                                    <span class="end">
                                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                              </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Form-->
                    <div class="column is-8">
                        <div class="account-box is-form is-footerless">
                            <div class="form-head stuck-header">
                                <div class="form-head-inner">
                                    <div class="left">
                                        <h3>Modifier mon profile</h3>
                                        <p>Edit your account's general information</p>
                                    </div>
                                    <div class="right">
                                        <div class="buttons">
                                            <a href="{{ route('dashboard') }}" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                              <i class="lnir lnir-arrow-left rem-100"></i>
                                                          </span>
                                                <span>Dashboard</span>
                                            </a>
                                            <button id="save-button" class="button h-button is-primary is-raised">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <!--Fieldset-->

                                <!--Fieldset-->
                                <div class="fieldset">
                                    <div class="fieldset-heading">
                                        <h4>Informations filiations</h4>
                                    </div>

                                    <div class="columns is-multiline">
                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Nom & prénoms du père</label>
                                                <div class="control has-icon">
                                                    <input type="text" class="input" value="{{ $user->nom_pere ?? '' }}" placeholder="Nom & prénoms du père" name="last_name">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('nom_pere')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Date de naissance père</label>
                                                <div class="control has-icon">
                                                    <input type="date" class="input" value="{{ $user->date_naissance_pere ?? '' }}" placeholder="Date de naissance du père" name="date_naissance_pere">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('date_naissance_pere')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                        <!--Field-->
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Lieu de naissance du père</label>
                                                <div class="control has-icon">
                                                    <input type="text" class="input" placeholder="Lieu de naissance du père"  value="{{ $user->lieu_naissance_pere ?? '' }}" name="lieu_naissance_pere">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('lieu_naissance_pere')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>

                                        <!--Field-->
                                        <div class="column is-12">
                                            <div class="field">
                                                <label>Nom & prénoms de la mère</label>
                                                <div class="control has-icon">
                                                    <input type="text" class="input" value="{{ $user->nom_mere ?? '' }}" placeholder="Nom & prénoms de la mère" name="nom_mere">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('nom_mere')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Date de naissance de la mère</label>
                                                <div class="control has-icon">
                                                    <input type="date" class="input" value="{{ $user->date_naissance_mere ?? '' }}" placeholder="Date de naissance de la mère" name="date_naissance_mere">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('date_naissance_mere')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                        <!--Field-->
                                        <div class="column is-6">
                                            <div class="field">
                                                <label>Lieu de naissance de la mère</label>
                                                <div class="control has-icon">
                                                    <input type="text" class="input" placeholder="Lieu de naissance de la mère"  value="{{ $user->lieu_naissance_mere ?? '' }}" name="lieu_naissance_mere">
                                                    <div class="form-icon">
                                                        <i data-feather="user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>



                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
