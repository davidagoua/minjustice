<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Huro :: Edit Profile</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

    <!--Mapbox styles-->
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
                        <form method="post" action="" class="columns">
                            @csrf


                            <!--Form-->
                            <div class="column is-12">
                                <div class="account-box is-form is-footerless">
                                    <div class="form-head ">
                                        <div class="form-head-inner">
                                            <div class="left">
                                                <h3>Informations Générales</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="/" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                              <i class="lnir lnir-arrow-left rem-100"></i>
                                                          </span>
                                                        <span>Acceuil</span>
                                                    </a>
                                                    <button id="save-button" type="submit" class="button h-button is-primary is-raised">Enregistrer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Photo de profile</h4>

                                            </div>

                                            <div class="h-avatar profile-h-avatar is-xl">
                                                <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                                <div class="filepond-profile-wrap is-hidden">
                                                    <input type="file" class="profile-filepond" name="profile_filepond" accept="image/png, image/jpeg, image/gif">
                                                </div>
                                                <button class="button is-circle edit-button is-edit">
                                                        <span class="icon is-small">
                                                          <i data-feather="edit-2"></i>
                                                      </span>
                                                </button>
                                                <button class="button is-circle edit-button is-back is-hidden">
                                                        <span class="icon is-small">
                                                          <i data-feather="arrow-left"></i>
                                                      </span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Informations personnelles</h4>
                                            </div>

                                            <div class="columns is-multiline">
                                                <!--Field-->
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label>Nom</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" placeholder="Nom" name="last_name">
                                                            <div class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('last_name')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <!--Field-->
                                                <div class="column is-6">
                                                    <div class="field">
                                                        <label>Prénoms</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" placeholder="Prénoms" name="first_name">
                                                            <div class="form-icon">
                                                                <i data-feather="user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('first_name')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Date de naissance</label>
                                                        <div class="control has-icon">
                                                            <input type="date" class="input"  placeholder="Date de naissance" name="date_naissance">
                                                            <div class="form-icon">
                                                                <i data-feather="calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('date_naissance')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <!--Field-->
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Lieu de naissance</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" placeholder="Lieu de naissance" name="lieu_naissance">
                                                            <div class="form-icon">
                                                                <i data-feather="map-pin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('lieu_naissance')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Téléphone</label>
                                                        <div class="control has-icon">
                                                            <input type="text" class="input" placeholder="Numero de téléphone" name="telephone">
                                                            <div class="form-icon">
                                                                <i data-feather="phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('telephone')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                                <div class="column is-12">
                                                    <div class="field demo-select">
                                                        <label>Genre</label>
                                                        <div class="control">
                                                            <label class="radio is-square">
                                                                <input type="radio" name="sexe" value="Homme">
                                                                <span></span>
                                                                Homme
                                                            </label>

                                                            <label class="radio is-square is-outlined is-primary">
                                                                <input type="radio" name="sexe" value="Femme">
                                                                <span></span>
                                                                Femme
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @error('sexe')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label>Situation matrimoniale</label>
                                                        <div class="control">
                                                            <div class="h-select">
                                                                <div class="select-box">
                                                                    <span>Situation matrimoniale</span>
                                                                </div>
                                                                <div class="select-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                                </div>
                                                                <div class="select-drop has-slimscroll-sm">
                                                                    <div class="drop-inner">
                                                                        <div class="option-row">
                                                                            <input type="radio" name="situation_matrimonial">
                                                                            <div class="option-meta">
                                                                                <span>Marié</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="option-row">
                                                                            <input type="radio" name="situation_matrimonial">
                                                                            <div class="option-meta">
                                                                                <span>Célibataire</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="option-row">
                                                                            <input type="radio" name="situation_matrimonial">
                                                                            <div class="option-meta">
                                                                                <span>Autre</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('situation_matrimonial')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                            </div>
                                        </div>

                                        <!--Fieldset-->
                                        <div class="fieldset">
                                            <div class="fieldset-heading">
                                                <h4>Informations du compte</h4>
                                            </div>
                                            <div class="columns is-multiline">

                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label for="">Addresse Mail</label>
                                                        <div class="control has-icon">
                                                            <input type="email" class="input" placeholder="Addresse Mail" name="email">
                                                            <div class="form-icon">
                                                                <i data-feather="at-sign"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label for="">Mot de passe</label>
                                                        <div class="control has-icon">
                                                            <input type="password" class="input" placeholder="Mot de passe" name="password">
                                                            <div class="form-icon">
                                                                <i data-feather="lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>
                                                <div class="column is-12">
                                                    <div class="field">
                                                        <label for="">Confirmation du mot de passe</label>
                                                        <div class="control has-icon">
                                                            <input type="password" class="input" placeholder="Confirmation du mot de passe" name="password_confirmation">
                                                            <div class="form-icon">
                                                                <i data-feather="lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('password_confirmation')<small class="text-danger">{{ $message }}</small>@enderror
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    <div class=" " style="justify-content: end; display: flex; padding-right: 15px">
                                        <div class="form-head-inner">
                                            <div></div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="/" class="button h-button is-light is-dark-outlined">
                                                            <span class="icon">
                                                              <i class="lnir lnir-arrow-left rem-100"></i>
                                                          </span>
                                                        <span>Acceuil</span>
                                                    </a>
                                                    <button id="save-button" type="submit" class="button h-button is-primary is-raised">Enregistrer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

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
