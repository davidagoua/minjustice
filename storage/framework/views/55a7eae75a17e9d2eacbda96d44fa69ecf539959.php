<div
    x-data="{
        isVisible: false,
        init: function () {
            this.$nextTick(() => this.isVisible = true)

            setTimeout(() => this.transitionOut(), 6000)
        },
        transitionOut: function () {
            this.isVisible = false

            setTimeout(() => this.remove(this.notification), 500)
        },
        iconClasses: {
            ['x-bind:class']() {
                return {
                    'text-danger-600 <?php if(config('filament.dark_mode')): ?> dark:text-danger-400 <?php endif; ?>': notification.status === 'danger',
                    'text-success-600 <?php if(config('filament.dark_mode')): ?> dark:text-success-400 <?php endif; ?>': notification.status === 'success',
                    'text-warning-600 <?php if(config('filament.dark_mode')): ?> dark:text-warning-400 <?php endif; ?>': notification.status === 'warning',
                    'text-primary-600 <?php if(config('filament.dark_mode')): ?> dark:text-primary-400 <?php endif; ?>': ! ['danger', 'success', 'warning'].includes(notification.status),
                }
            }
        },
    }"
    x-show="isVisible"
    x-transition:enter.duration.500ms
    <?php echo e($attributes->class(['flex flex-col h-auto sm:w-80 max-w-screen space-y-2 pointer-events-auto filament-notification'])); ?>

>
    <div
        x-show="isVisible"
        x-transition
        class="flex items-start px-3 py-2 space-x-2 backdrop-blur-xl backdrop-saturate-150 rtl:space-x-reverse text-xs shadow ring-1 rounded-xl"
        x-bind:class="{
            'bg-danger-50/50 ring-danger-200 <?php if(config('filament.dark_mode')): ?> dark:bg-danger-900/50 dark:ring-danger-600 <?php endif; ?>': notification.status === 'danger',
            'bg-success-50/50 ring-success-200 <?php if(config('filament.dark_mode')): ?> dark:bg-success-900/50 dark:ring-success-600 <?php endif; ?>': notification.status === 'success',
            'bg-warning-50/50 ring-warning-200 <?php if(config('filament.dark_mode')): ?> dark:bg-warning-900/50 dark:ring-warning-600 <?php endif; ?>': notification.status === 'warning',
            'bg-white/50 ring-gray-200 <?php if(config('filament.dark_mode')): ?> dark:bg-gray-900/50 dark:ring-gray-600 <?php endif; ?>': ! ['warning', 'success', 'danger'].includes(notification.status),
        }"
    >
        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-x-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 w-6 h-6','x-show' => 'notification.status === \'danger\'','x-bind' => 'iconClasses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-check-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 w-6 h-6','x-show' => 'notification.status === \'success\'','x-bind' => 'iconClasses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-exclamation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 w-6 h-6','x-show' => 'notification.status === \'warning\'','x-bind' => 'iconClasses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-information-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'shrink-0 w-6 h-6','x-show' => '! [\'danger\', \'success\', \'warning\'].includes(notification.status)','x-bind' => 'iconClasses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

        <div class="flex-1 space-y-1">
            <div class="flex items-center justify-between font-medium">
                <div
                    class="text-sm leading-6"
                    x-bind:class="{
                        'text-danger-900 <?php if(config('filament.dark_mode')): ?> dark:text-danger-200 <?php endif; ?>': notification.status === 'danger',
                        'text-success-900 <?php if(config('filament.dark_mode')): ?> dark:text-success-200 <?php endif; ?>': notification.status === 'success',
                        'text-warning-900 <?php if(config('filament.dark_mode')): ?> dark:text-warning-200 <?php endif; ?>': notification.status === 'warning',
                        'text-gray-900 <?php if(config('filament.dark_mode')): ?> dark:text-gray-200 <?php endif; ?>': ! ['warning', 'success', 'danger'].includes(notification.status)
                    }"
                    x-html="notification.message"
                    dusk="filament.notifications.notification"
                ></div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\vendor\filament\filament\src\/../resources/views/components/notification.blade.php ENDPATH**/ ?>