<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php foreach($attributes->onlyProps(['id','label','labelSrOnly','helperText','hint','hintIcon','statePath']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id','label','labelSrOnly','helperText','hint','hintIcon','statePath']); ?>
<?php foreach (array_filter((['id','label','labelSrOnly','helperText','hint','hintIcon','statePath']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-wrapper.index','data' => ['id' => $id,'label' => $label,'labelSrOnly' => $labelSrOnly,'helperText' => $helperText,'hint' => $hint,'hintIcon' => $hintIcon,'statePath' => $statePath]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'label-sr-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelSrOnly),'helper-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($helperText),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hint),'hint-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintIcon),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\Users\user\PhpstormProjects\minijust\storage\framework\views/5afc411b3e4fb928e68c6c1456364be9277269c8.blade.php ENDPATH**/ ?>