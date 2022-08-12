<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Bienvenue - Suivi et Collecte des documents de l'imprimerie nationale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap v5.1.3 Landing Page Template" />
    <meta name="keywords" content="bootstrap v5.1.3, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="/images/logo.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/aos.css" />
    <link rel="stylesheet" href="/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/materialdesignicons.min.css" type="text/css" />
    <link rel="stylesheet" href="/css/style.min.css" type="text/css" />


</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="71">

<nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky" id="navbar">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand text-uppercase" href="/">
            <img class="logo-light" src="/images/logo.png" alt="" height="50">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto" id="navbar-navlist">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Comment ça marche ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#download">Télécharger</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#statistiques">Statistiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-3 mb-lg-0" href="#contact">Contact</a>
                </li>
            </ul>
            <!-- Button trigger modal -->
            <a class="btn btn-secondary nav-btn" href="{{ route('register') }}">
                Inscription
            </a>
            <button type="button" class="btn btn-primary nav-btn" data-bs-toggle="modal" data-bs-target="#exampleModalLong1">
                Connexion
            </button>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-close">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5">
                <div class="text-center mb-5">
                    <h5 class="modal-title" id="exampleModalLongTitle">Selectionnez le type de document</h5>
                    <p class="fs-14">Avez-vous éffectuez une demande ? <a href="javascript:void(0)">Vérifiez ici</a></p>
                </div>
                <div class="d-grid gap-3">
                    <a class="btn btn-dark btn-lg" href="{{ route('register') }}">
                                <span class="d-flex justify-content-center align-items-center">
                                    DOCUMENTS D'ETAT CIVIL
                                </span>
                    </a>

                    <a class="btn btn-dark btn-lg" href="{{ route('register') }}">
                                <span class="d-flex justify-content-center align-items-center">
                                    DOCUMENTS JURIDIQUE
                                </span>
                    </a>

                    <a class="btn btn-dark btn-lg" href="{{ route('register') }}">
                                <span class="d-flex justify-content-center align-items-center">
                                    DOCUMENTS SOCIAL ET SANTE
                                </span>
                    </a>

                    <div class="text-center">
                        <p class="mb-0 fs-13">En continuant, vous acceptez nos <a class="text-primary" href="javascript:void(0)">Termes et conditions</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-block text-center px-5 pb-5">
                <p class="footer-text mb-4">Documents générés et sécurisés par :</p>
                <div class="mx-auto">
                    <div class="row justify-content-between">
                        <img class="logo-dark" src="/images/logo-dark.png" alt="" height="75">
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</div>
<!-- End modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-close">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5">
                <div class="text-center mb-5">
                    <h5 class="modal-title" id="exampleModalLongTitle">Connectez-vous maintenant</h5>
                    <p class="fs-14">Voulez-vous éffectuez une demande ? <a href="javascript:void(0)">Cliquez ici</a></p>
                </div>
                <div class="contact">
                    <div data-aos="" data-aos-duration="1800">
                        <form method="post" action="{{ route('login') }}" class="contact-form" name="myForm" id="myForm">
                            @csrf
                            <div>
                                @error('email') <small class="text-red-400"> {{ $message }}</small> @enderror
                            </div>
                            <div class="row rounded-3 py-3">
                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text"><i class="mdi mdi-at"></i></span>
                                        <input name="email" id="name" type="email" class="form-control border" placeholder="Entrez votre Email">
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text"><i class="mdi mdi-lock-outline"></i></span>
                                        <input name="password" id="subject" type="password" class="form-control border" placeholder="Entrez votre Mot de passe  *">
                                        @error('password') <small class="text-red-400"> {{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <input type="submit" id="submit" name="send" class="btn btn-primary btn-lg justify-content-center align-items-center" value="Se connecter">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end form-->
                    </div>
                </div><!--end col-->
            </div>
            <div class="modal-footer d-block text-center px-5 pb-5">
                <p class="footer-text mb-4">Téléchargez l'application et gérez vos documents</p>
                <div class="">
                    <div class="">
                        <img class="logo-dark" src="/images/playstore.png" alt="" height="50">
                        <img class="logo-dark" src="/images/appstore.png" alt="" height="50">
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
</div>
<!-- End modal -->



<div class="overflow-hidden-x">

    <!-- Start Home -->
    <section class="section home home-2" id="home">
        <video autoplay muted loop id="myVideo">
            <source src="/images/Office-69952.mp4" type="video/mp4">
        </video>
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row text-right">
                <div class="col-lg-7">
                    <div class="home-heading">
                        <h1 class="mb-3 text-white">Obtenez vos documents administratifs en ligne <span class="text-warning">Ministère de la justice</span></h1>
                    </div>
                    <div class="home-btn hstack gap-2 flex-column d-sm-block">
                        <a class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#exampleModalLong"  href="javascript:void(0)"><i class="mdi mdi-file-document-outline"></i> Effectuer une demande</a>
                        <a class="btn btn-white me-1" href="#download">Télécharger l'application <i class="mdi mdi-download"></i></a>

                    </div>
                </div><!-- end col-->
            </div><!-- end row-->
        </div><!--end container-->
    </section>
    <!-- End Home -->

    <div class="container-fluid">
        <div class="row">
            <div class="home-shape-arrow">
                <a href="#features" class="mouse-down"><i class="mdi mdi-arrow-down arrow-icon text-dark h5"></i></a>
            </div>
        </div><!--end row-->
    </div><!--end container-->

    <!-- Start features -->
    <section class="section feature" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4">
                        <h2 class="heading">Dématérialiser, Faciliter et Sécurisé </h2>
                        <p class="text-muted fs-17">Ut enim ad minima veniam quis nostrum exercitationem ullam
                            corporis suscipit laboriosam nisi commodi consequatur.</p>
                    </div>
                </div><!-- end col-->
            </div><!-- end row-->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 mt-sm-4">
                    <div data-aos="" data-aos-duration="1800">
                        <div class="feature-card p-3 py-sm-4 rounded d-flex">
                            <div class="flex-shrink-0">
                                <i class="mdi mdi-security text-primary float-start me-3 h2"></i>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <div class="content">
                                    <h5 class="title">Protéger et Sécuriser l’identité des citoyens</h5>
                                    <p class="text-muted">One disadvantage of Lorum Ipsum is that in certain letters which is said more than.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-7 mt-sm-4">
                    <div class="feature-card p-3 py-sm-4 rounded">
                        <i class="mdi mdi-layers-triple-outline text-primary float-start me-3 h2"></i>
                        <div class="content d-block overflow-hidden">
                            <h5 class="title">Faciliter l'acquisition des documents administratifs</h5>
                            <p class="text-muted mt-2">The most well-known dummy text is the 'Lorem', which well-known is said which is said.</p>

                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-7 mt-sm-4">
                    <div data-aos="" data-aos-duration="1800">
                        <div class="feature-card p-3 py-sm-4 rounded">
                            <i class="mdi mdi-responsive text-primary float-start me-3 h2"></i>
                            <div class="content d-block overflow-hidden">
                                <h5 class="title">Digitaliser le repertoire des documents administratifs</h5>
                                <p class="text-muted mt-2">Moreover, in Latin only words at the beginning of sentences which is said are capitalized.</p>

                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row my-sm-4 py-4 align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div data-aos="" data-aos-duration="1800">
                        <div class="card bg-transparent border-0 mb-3 mb-lg-0">
                            <img src="/images/doc.svg" class="img-fluid rounded-3" alt="">
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-7">
                    <div data-aos="" data-aos-duration="1800">
                        <h3 class="feature-heading mb-2">Processus de demande</h3>
                        <p class="text-muted">L'accessibilité des demandes de documents administratifs vers le digital vous offre la faciliter d'effectuer vos demandes depuis chez vous !   </p>
                        <ul class="feature-list">
                            <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Demande et paiement en ligne</li>
                            <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Validation et traitement </li>
                            <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Retrait et certification</li>
                        </ul>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong"  href="javascript:void(0)">Effectuer une demande</a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-7">
                    <div data-aos="" data-aos-duration="1800">
                        <h3 class="feature-heading">Foire aux Questions </h3>
                        <p class="text-muted">Lorem text is also used to demonstrate the appearance of different typefaces and layouts.</p>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <a class="accordion-button" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div>
                                            <p class="mb-0">Comment éffectuer une demande en ligne ?</p>
                                            <!--   <p class="mb-0 fs-13 text-muted">Our new key fobs make it so easy!</p> -->
                                        </div>
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 text-muted mb-1">Lorem text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical.</p>
                                        <a href="javascript:void(0)">
                                            Effectuer ma demande <i class="mdi mdi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div>
                                            <p class="mb-0">Comment vérifier l'état de ma demande ?</p>
                                            <!--  <p class="mb-0 fs-13 text-muted">Keep your engine going with free food and drinks.</p> -->
                                        </div>
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 text-muted mb-0">Lorem text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical.</p>
                                        <a href="javascript:void(0)" class="fs-14 text-decoration-none">
                                            Vérifier ma demande <i class="mdi mdi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <a class="accordion-button collapsed" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div>
                                            <p class="mb-0">Comment gerez mes documents ?</p>
                                            <!--  <p class="mb-0 fs-13 text-muted">Connectivity, power, and IT issues solved in no time.</p> -->
                                        </div>
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p class="fs-14 text-muted mb-0">Lorem text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical.</p>
                                        <a href="javascript:void(0)" class="fs-14 text-decoration-none">
                                            Télécharger l'application <i class="mdi mdi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-5">
                    <div data-aos="" data-aos-duration="1800">
                        <div class="card bg-transparent border-0">
                            <img src="/images/feature2.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div><!-- end container -->
    </section>
    <!-- end Features -->

    <!-- Start cta -->
    <section class="section cta">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <div data-aos="fade-down" data-aos-duration="1800">
                        <h3 class="fw-bold">Vos demandes depuis chez vous !</h3>
                        <p>L'accessibilité des demandes de documents administratifs vers le digital vous offre la faciliter d'effectuer vos demandes !</p>
                        <a class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModalLong"  href="javascript:void(0)">Effectuer une demande</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End cta -->

    <!-- Start Reviews -->
    <section class="section reviews" id="download">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-3">
                        <h2 class="heading">Télécharger Gratuitement <span style="color:orangered;">IN-CI Mobile</span></h2>
                        <p class="text-muted fs-17">Télécharger gratuitement l'application <strong>IN-CI Mobile</strong> depuis vos différents stores et profitez de nos avantages depuis chez vous sans vous déplacer.</p>
                    </div>
                </div><!-- end col-->

                <section class="ptb-60 gray-light-bg" id="download">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6 col-md-6 text-center ">
                                <div class="action-btns mb-4">
                                    <a href="#" target="_blank"><img src="/images/playstore.png" style="height: 70px;"></a>
                                    <a href="#">
                                        <img src="/images/appstore.png" style="height: 70px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Reviews -->

                    <!-- Start Team -->
                    <section class="section team" style="z-index: 1;" id="statistiques">
                        <div id="particles-js" style="z-index: -1;">
                        </div>
                        <!-- end particles -->
                        <div class="row justify-content-center ">
                            <div class="col-lg-7">
                                <div class="text-center mb-5">
                                    <h2 class="heading">Quelques statistiques</h2>
                                    <p class="text-muted fs-17">Build responsive, mobile-first projects on the web
                                        with the world's most popular front-end component library.</p>
                                </div>
                            </div><!-- end col-->
                        </div><!-- end row -->
                        <div class="row gy-4">
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-card">
                                    <div class="team-card-text-2 text-center">
                                        <h5 class="fw-bold mb-0">+500k</h5>
                                        <p class="mb-0 fs-13 text-muted">Utilisateurs</p>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-card">
                                    <div class="team-card-text-2 text-center">
                                        <h5 class="fw-bold mb-0">+300k</h5>
                                        <p class="mb-0 fs-13 text-muted">Demandes en ligne</p>
                                    </div>
                                </div>
                            </div><!-- End col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-card">

                                    <div class="team-card-text-2 text-center">
                                        <h5 class="fw-bold mb-0">+200</h5>
                                        <p class="mb-0 fs-13 text-muted">Types de document</p>
                                    </div>
                                </div>
                            </div><!-- End col -->
                            <div class="col-lg-3 col-sm-6">
                                <div class="team-card">

                                    <div class="team-card-text-2 text-center">
                                        <h5 class="fw-bold mb-0">+800k</h5>
                                        <p class="mb-0 fs-13 text-muted">Demandes traitées</p>
                                    </div>
                                </div>
                            </div> <!-- End col-->
                        </div><!-- end row-->
            </div><!-- end cotainer-->
    </section>
    <!-- End Team -->

    <!-- Start contact -->
    <section class="section contact" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mb-5">
                        <h2 class="heading">Contactez-nous</h2>
                        <p class="text-muted mt-2 fs-17">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row align-items-center gy-3">
                <div class="col-lg-6">
                    <div data-aos="" data-aos-duration="1800">
                        <div class="card">
                            <div class="card-body">
                                <div class="map">  <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Imprimerie%20nationale%20de%20c%C3%B4te%20d'ivoire+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                                           width="100%" height="325" style="border: 0" allowfullscreen></iframe>  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-6">
                    <div data-aos="" data-aos-duration="1800">
                        <form method="post" onsubmit="return validateForm()" class="contact-form" name="myForm" id="myForm">
                            <span id="error-msg"></span>
                            <div class="row rounded-3 py-3">
                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Nom et Prénom(s)*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Adresse électronique*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text"><i class="mdi mdi-file-document-outline"></i></span>
                                        <input name="subject" id="subject" type="text" class="form-control" placeholder="Sujet">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative mb-3">
                                        <span class="input-group-text align-items-start"><i class="mdi mdi-comment-text-outline"></i></span>
                                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Message*"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <input type="submit" id="submit" name="send" class="btn btn-primary" value="Envoyer">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end form-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
    <!-- End contect -->

    <!-- START FOOTER -->
    <footer class="section footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-10 text-center">
                    <a href="javascript:void(0)"><img src="/images/logo.png" height="100" alt=""></a>
                    <p class="mx-auto mt-sm-4">Obtenez vos documents administratifs en ligne en quelques clics!</p>
                    <ul class="list-unstyled mb-0 mt-4 social-icon">
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-linkedin"></i></a></li>
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center mt-3">
                        <ul class="list-unstyled mb-0">
                            <li class="list-inline-item mx-lg-3 m-2">
                                <a class="text-white" href="javascript:void(0)">Accueil</a>
                            </li>
                            <li class="list-inline-item mx-lg-3 m-2">
                                <a class="text-white" href="javascript:void(0)">Comment ça marche ?</a>
                            </li>
                            <li class="list-inline-item mx-lg-3 m-2">
                                <a class="text-white" href="javascript:void(0)">Télécharger</a>
                            </li>
                            <li class="list-inline-item mx-lg-3 m-2">
                                <a class="text-white" href="javascript:void(0)">Statistiques</a>
                            </li>
                            <li class="list-inline-item mx-lg-3 m-2">
                                <a class="text-white" href="javascript:void(0)">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </footer>
    <!-- END FOOTER -->


    <!-- FOOTER-ALT -->
    <div class="footer-alt pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-white fs-15">©
                            <script>document.write(new Date().getFullYear())</script> Ministère de la Justice. Powered by <a href="https://sahanalytics.com/" style="color:orange" target="_blank">SaH Analytics Int.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FOOTER-ALT -->
</div>

<!--start back-to-top-->
<button onclick="topFunction()" id="back-to-top">
    <i class="mdi mdi-arrow-up"></i>
</button>
<!--end back-to-top-->

<!--Custom js-->
<script src="/js/counter.js"></script>

<!--Bootstrap Js-->
<script src="/js/bootstrap.bundle.min.js"></script>

<!-- animation -->
<script src="/js/aos.js"></script>

<script src="/js/swiper-bundle.min.js"></script>

<!-- contact -->
<script src="/js/contact.js"></script>

<!-- Team particles-->
<script src="/js/particles.min.js"></script>

<!-- App Js -->
<script src="/js/app.js"></script>
<script>

    @if($errors->any())
    (new bootstrap.Modal('#exampleModalLong1')).show()
    @endif

</script>

</body>
</html>
