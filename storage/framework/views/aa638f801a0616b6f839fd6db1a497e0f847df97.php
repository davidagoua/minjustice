<div
    aria-labelledby="<?php echo e($getId()); ?>"
    id="<?php echo e($getId()); ?>"
    role="tabpanel"
    tabindex="0"
    x-bind:class="{ 'invisible h-0 overflow-y-hidden': step !== '<?php echo e($getId()); ?>' }"
    <?php echo e($attributes->merge($getExtraAttributes())->class(['focus:outline-none filament-forms-wizard-component-step'])); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\vendor\filament\forms\src\/../resources/views/components/wizard/step.blade.php ENDPATH**/ ?>