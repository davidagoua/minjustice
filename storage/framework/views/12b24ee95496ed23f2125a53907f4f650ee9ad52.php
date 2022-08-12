<?php $__env->startPush('script'); ?>
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('create-demande-form', ['transactionId' => $transaction_id,'transaction_id' => $transaction_id,'document' => $document])->html();
} elseif ($_instance->childHasBeenRendered('g0gt0ZR')) {
    $componentId = $_instance->getRenderedChildComponentId('g0gt0ZR');
    $componentTag = $_instance->getRenderedChildComponentTagName('g0gt0ZR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('g0gt0ZR');
} else {
    $response = \Livewire\Livewire::mount('create-demande-form', ['transactionId' => $transaction_id,'transaction_id' => $transaction_id,'document' => $document]);
    $html = $response->html();
    $_instance->logRenderedChild('g0gt0ZR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('lscripts'); ?>

    <script>
        console.log('defined checkout')
        var checkout = function(montant){
            console.log('call')
            CinetPay.setConfig({
                apikey: '181957851560845e32d579d5.69169291',//   YOUR APIKEY
                site_id: '839589',//YOUR_SITE_ID
                notify_url: "<?php echo e(route('cinetpay.notify')); ?>",
                return_url: "",
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: "<?php echo e($transaction_id); ?>", // YOUR TRANSACTION ID
                amount: montant,
                currency: 'XOF',
                channels: 'MOBILE_MONEY',
                description: 'Test de paiement',


            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        Livewire.emit('failed');

                    }
                    window.location.reload()
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {

                    }
                    Livewire.emit('accepted');
                }


            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/demande/create.blade.php ENDPATH**/ ?>