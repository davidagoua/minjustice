<div>

    <div class="page-content-inner">



        <div class="page-content-inner card-hub">
            <div class="columns">
                <div class="column is-12">
                    <div class="hub-wrapper">
                        <div class="hub-header has-text-centered">
                            <div class="h-avatar is-xl">
                                <img src="/assets/img/doc.svg">
                            </div>
                            <h3 class="title is-4 is-narrow is-thin">Types de documents</h3>
                            <p class="light-text">Choisissez le type de document que vous voulez créer</p>
                            <div>
                                <div class="control has-icon">
                                    <input wire:model="search" class="input " placeholder="Rechercher un document...">
                                    <div class="form-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="hub-body">
                            <div class="body-inner">

                                <!--Component-->
                                <?php $__currentLoopData = $type_documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="hub-card">
                                    <div class="hub-card-body">
                                        <div class="inner-content">
                                            <h3 class="title is-5 is-narrow is-thin"><?php echo e($type->intitule); ?></h3>
                                            <p class="light-text"><?php echo e($typeDemande->nom); ?></p>
                                        </div>
                                        <img class="light-image" src="/assets/img/illustrations/components/avatar.svg" alt="">
                                        <img class="dark-image" src="/assets/img/illustrations/components/avatar-dark.svg" alt="">
                                    </div>
                                    <div class="hub-card-foot">
                                        <?php if($type->url !== ""): ?>
                                            <a  href="<?php echo e(route($type->url)); ?>">Choisir</a>
                                        <?php else: ?>
                                            <a  href="<?php echo e(route('demande.create', ['document'=>$type])); ?>">Choisir</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>

                        <div class="hub-footer">
                            <p><a class="action-link">Foire aux questions</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/livewire/type-document-list.blade.php ENDPATH**/ ?>