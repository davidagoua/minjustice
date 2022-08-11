<div
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'px-4 py-3 filament-tables-text-column',
        'text-primary-600 transition hover:underline hover:text-primary-500 focus:underline focus:text-primary-500' => $getAction() || $getUrl(),
        'whitespace-normal' => $canWrap(),
    ])); ?>

>
    <?php echo e($getFormattedState()); ?>

</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\vendor\filament\tables\src\/../resources/views/columns/text-column.blade.php ENDPATH**/ ?>