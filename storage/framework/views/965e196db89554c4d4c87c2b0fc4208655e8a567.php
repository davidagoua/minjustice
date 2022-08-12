<?php $__env->startSection('content'); ?>



        <div class="page-content-inner">

            <!--Business Dashboard V3-->
            <div class="business-dashboard hr-dashboard">

                <div class="columns">

                    <div class="column is-8">

                        <div class="columns is-multiline">

                            <!--Header-->
                            <div class="column is-12">
                                <div class="block-header">
                                    <!--left-->
                                    <div class="left">
                                        <div class="current-user">
                                            <div class="h-avatar is-medium">
                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                            </div>
                                            <h3>Bonjour, <?php echo e(strtoupper(auth()->user()->fullName)); ?></h3>
                                        </div>
                                    </div>

                                    <!--Center-->
                                    <div class="center">
                                        <h4 class="block-heading">Filiation paternelle</h4>
                                        <p class="block-text">Retrouvez ci-dessous vos filiations parentale légitime et adoptive rattachée à votre identité.</p>
                                        <div class="candidates">

                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!--Right-->
                                    <div class="right">
                                        <h4 class="block-heading">Porte Documents</h4>
                                        <p class="block-text">Vos documents sécurisés et protégés sont sauvegardés de façon digitale.</p>

                                        <a href="<?php echo e(route('documents')); ?>" class="button h-button is-bold is-fullwidth is-dark-outlined">Acceder aux documents</a>
                                    </div>
                                </div>
                            </div>

                            <!--Selector-->
                            <div class="column is-12">
                                <div class="feed-settings">
                                    <h3 class="dark-inverted">Documents traités ce mois-ci</h3>

                                </div>
                            </div>

                            <!--Side Text-->
                            <div class="column is-4">
                                <img src="/assets/img/doc.svg">
                            </div>

                            <!--Incoming-->
                            <div class="column is-7 is-offset-1">
                                <div class="incoming">
                                    <div class="flex-table">

                                        <!--Table header-->
                                        <div class="flex-table-header">
                                            <span class="is-grow-lg">Type</span>
                                            <span>Nombre</span>
                                            <span class="cell-end">Action</span>
                                        </div>



                                        <!--Table item-->
                                        <div class="flex-table-item">
                                            <div class="flex-table-cell is-media is-grow-lg" data-th="">
                                                <div class="h-icon is-orange">
                                                    <i class="lnil lnil-checkmark-circle"></i>
                                                </div>
                                                <div>
                                                    <span class="item-name dark-inverted">Juridique</span>
                                                    <span class="item-meta">
                                                                  <span>Caisier judiciaire etc.</span>
                                                                </span>
                                                </div>
                                            </div>
                                            <div class="flex-table-cell cell-center " data-th="Count">
                                                <span class="light-text"><?php echo e(auth()->user()->documents()->count()); ?></span>
                                            </div>

                                            <div class="flex-table-cell cell-end" data-th="Actions">
                                                <a href="<?php echo e(route('documents')); ?>" class="action-link is-pushed-mobile">Consulter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="column is-4 has-text-centered">

                        <!--Widget-->
                        <div class="widget search-widget">
                            <div class="field">
                                <a  class="button h-button is-warning is-elevated" href="<?php echo e(route('demande.type_document')); ?>">Effectuer une nouvelle demande</a>
                            </div>

                        </div>

                        <!--Widget-->
                        <div class="list-widget list-widget-v2 tabbed-widget">
                            <div class="widget-head">
                                <h3 class="dark-inverted">Demandes</h3>
                                <div class="tabbed-controls">
                                    <a class="tabbed-control is-active">
                                        <span>Toutes</span>
                                    </a>
                                    <a class="tabbed-control">
                                        <span>En cours</span>
                                    </a>
                                    <div class="tabbed-naver"></div>
                                </div>
                            </div>

                            <div class="inner-list-wrapper is-active">
                                <div class="inner-list">
                                    <!--List Item-->
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="inner-list-item media-flex-center">
                                        <div class="animated-checkbox <?php if($demande->status === \App\Models\DemandeStatus::TERMINE): ?> is-checked <?php else: ?> is-unchecked <?php endif; ?>">
                                            <input type="checkbox">
                                            <div class="checkmark-wrap">
                                                <div class="shadow-circle"></div>
                                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"></circle>
                                                    <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-meta is-light">
                                            <a href="#"><?php echo e($demande->type_document->intitule); ?></a>
                                            <span><?php echo e($demande->created_at); ?></span>
                                        </div>
                                        <div class="flex-end">
                                            <?php switch($demande->status):
                                                case (\App\Models\DemandeStatus::VALIDATION): ?>
                                            <span class="tag is-rounded ">Validation...</span>
                                                <?php break; ?>
                                                <?php case (\App\Models\DemandeStatus::TRAITEMENT): ?>
                                            <span class="tag is-rounded is-info">Traitement</span>
                                                <?php break; ?>
                                                <?php case (\App\Models\DemandeStatus::TERMINE): ?>
                                            <span class="tag is-rounded is-success">Terminé</span>
                                                <?php break; ?>
                                                <?php case (\App\Models\DemandeStatus::ECHEC): ?>
                                            <span class="tag is-rounded is-danger">Echec</span>
                                                <?php break; ?>
                                                <?php default: ?>
                                            <span class="tag is-rounded is-success">Indefini</span>

                                            <?php endswitch; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span>Aucune demandes</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="inner-list-wrapper">
                                <div class="inner-list">

                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()
                                        ->demandes()
                                        ->currentStatus(
                                            \App\Models\DemandeStatus::VALIDATION,
                                            \App\Models\DemandeStatus::TRAITEMENT
                                        )->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="inner-list-item media-flex-center">
                                        <div class="animated-checkbox is-unchecked">
                                            <input type="checkbox">
                                            <div class="checkmark-wrap">
                                                <div class="shadow-circle"></div>
                                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"></circle>
                                                    <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-meta is-light">
                                            <a href="#"><?php echo e($demande->type_document->intitule); ?></a>
                                            <span><?php echo e($demande->created_at); ?></span>
                                        </div>
                                        <div class="flex-end">
                                            <span class="tag is-rounded">En cours</span>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/dashboard.blade.php ENDPATH**/ ?>