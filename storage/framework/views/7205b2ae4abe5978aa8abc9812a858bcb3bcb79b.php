<div>

    <div>
        <?php if($isPaided): ?>
            <div class="action-page-wrapper action-page-v1">
                <div class="wrapper-inner">
                    <div class="action-box">
                        <div class="box-content">

                            <h3 class="dark-inverted">Votre demande de Certificat a été prix en compte !</h3>
                            <div class="sender-message is-dark-card-bordered is-dark-bg-4">
                                <h4 class="dark-inverted">IMPORTANT</h4>
                                <p>Veuillez vous rendre dans votre juridiction avec les originaux pour la validation des documents</p>
                            </div>

                            <div class="buttons">
                                <button wire:click.prevent="download_recu" class="button h-button is-primary is-raised">
                                    <span class="fa fa-file-download"></span>&nbsp;
                                    Télécharger mon reçu
                                </button>
                                <a href="/compte"  class="button h-button is-raised">
                                    <span class="fa fa-file-home"></span>&nbsp;
                                    Retourner a l'acceuil
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <?php echo e($this->form); ?>


            </form>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/livewire/certificate-form-widget.blade.php ENDPATH**/ ?>