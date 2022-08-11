<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Minijust - Inscription</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

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
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('resgister-form', [])->html();
} elseif ($_instance->childHasBeenRendered('lH9tc6L')) {
    $componentId = $_instance->getRenderedChildComponentId('lH9tc6L');
    $componentTag = $_instance->getRenderedChildComponentTagName('lH9tc6L');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lH9tc6L');
} else {
    $response = \Livewire\Livewire::mount('resgister-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('lH9tc6L', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>

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
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/auth/lregister.blade.php ENDPATH**/ ?>