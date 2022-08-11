<?php $__env->startSection('content'); ?>

    <div class="page-content-inner all-projects ">



            <div class="page-content-inner">

                <div class="card-grid card-grid-v4">

                    <!--List Empty Search Placeholder -->
                    <div class="page-placeholder custom-text-filter-placeholder is-hidden">
                        <div class="placeholder-content">
                            <img class="light-image" src="assets/img/illustrations/placeholders/search-4.svg" alt="" />
                            <img class="dark-image" src="assets/img/illustrations/placeholders/search-4-dark.svg" alt="" />
                            <h3>We couldn't find any matching results.</h3>
                            <p class="is-larger">Too bad. Looks like we couldn't find any matching results for the
                                search terms you've entered. Please try different search terms or criteria.</p>
                        </div>
                    </div>

                    <div class="onboarding-wrapper onboarding-v1">
                        <div class="title-wrap">
                            <h1 class="title is-4">Mon Porte Documents</h1>
                            <p>Documents d'état civil, juridique, social et sanitaire</p>

                            <div class="all-projects-header">

                                <div class="header-item">
                                    <div class="item-inner">
                                        <i class="lnil lnil-shield"></i>
                                        <span><?php echo e(auth()->user()->documents->count()); ?></span>
                                        <p>Valide</p>
                                    </div>
                                </div>

                                <div class="header-item">
                                    <div class="item-inner">
                                        <i class="lnil lnil-shield"></i>
                                        <span><?php echo e(auth()->user()->documents->reject(fn($e) => $e->isValide)->count()); ?></span>
                                        <p>Expiré</p>
                                    </div>
                                </div>

                                <div class="header-item">
                                    <div class="item-inner">
                                        <i class="lnil lnil-files"></i>
                                        <span><?php echo e(auth()->user()->documents->count()); ?></span>
                                        <p>TOTAL</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="columns">
                            <div class="column is-12">

                                <div class="flex-table is-compact">

                                    <!--Table header-->
                                    <div class="flex-table-header">
                                        <span>Intitulé</span>
                                        <span>Type</span>
                                        <span>Date d'expiration</span>
                                        <span>Status</span>
                                        <span>Date d'etablissement</span>
                                        <span class="cell-end">Actions</span>
                                    </div>
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <!--Table item-->
                                    <div class="flex-table-item">
                                        <div class="flex-table-cell is-bold" data-th="Company">
                                            <span class="dark-text"><?php echo e($document->type->intitule); ?></span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Type">
                                            <span class="light-text"><?php echo e($document->type->intitule); ?></span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Industry">
                                            <span class="light-text"><?php echo e(now()->addMonth(3)->diffForHumans($document->created_at, \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW)); ?></span>
                                        </div>
                                        <div class="flex-table-cell" data-th="Status">
                                            <?php if($document->isValide): ?>
                                            <span class="tag is-rounded is-success">Valide</span>
                                            <?php else: ?>
                                            <span class="tag is-rounded is-danger">Expiré</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-table-cell" data-th="Contacts">
                                            <span class="light-text"><?php echo e($document->created_at); ?></span>
                                        </div>
                                        <div class="flex-table-cell cell-end" data-th="Actions">
                                            <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile">
                                                <a href="<?php echo e(route('documents.download', $document)); ?>" class="dropdown-item is-media">
                                                    <div class="icon">
                                                        <i class="lnil lnil-download"></i>
                                                    </div>
                                                    <div class="meta">
                                                        <span>Télécharger</span>
                                                        <span>Télécharger le document</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class=" p-8 flex-table-item">
                                            <div class="text-center text-xl text-gray-500 w-full">
                                                Aucun document
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <!--Table Pagination-->
                                <nav class="flex-pagination pagination is-rounded" aria-label="pagination">
                                    <a class="pagination-previous">Precedent</a>

                                    <a class="pagination-next">Suivant</a>

                                </nav>

                            </div>
                        </div>


                    </div>

                </div>

            </div>




        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/front/documents.blade.php ENDPATH**/ ?>