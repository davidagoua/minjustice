


<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('type-document-list', ['typeDemande' => $typeDemande])->html();
} elseif ($_instance->childHasBeenRendered('y6za6L0')) {
    $componentId = $_instance->getRenderedChildComponentId('y6za6L0');
    $componentTag = $_instance->getRenderedChildComponentTagName('y6za6L0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('y6za6L0');
} else {
    $response = \Livewire\Livewire::mount('type-document-list', ['typeDemande' => $typeDemande]);
    $html = $response->html();
    $_instance->logRenderedChild('y6za6L0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/demande/liste_document.blade.php ENDPATH**/ ?>