<div
    x-data="{
        notifications: <?php echo e(\Illuminate\Support\Js::from(session()->pull('filament.notifications', []))); ?>,
        add: function (event) {
            this.notifications = this.notifications.concat(event.detail)
        },
        remove: function (notification) {
            this.notifications = this.notifications.filter(i => i.id !== notification.id)
        },
    }"
    x-on:notify.window="add($event)"
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'flex fixed inset-0 z-50 p-3 pointer-events-none filament-notifications',
        'justify-start' => config('filament.layout.notifications.alignment') === 'left',
        'justify-center' => config('filament.layout.notifications.alignment') === 'center',
        'justify-end' => config('filament.layout.notifications.alignment') === 'right',
        'items-start' => config('filament.layout.notifications.vertical_alignment') === 'top',
        'items-center' => config('filament.layout.notifications.vertical_alignment') === 'center',
        'items-end' => config('filament.layout.notifications.vertical_alignment') === 'bottom',
    ]) ?>"
    role="status"
    aria-live="polite"
    wire:ignore
>
    <div class="space-y-4">
        <template x-for="notification in notifications" :key="notification.id">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.notification','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </template>
    </div>
</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\vendor\filament\filament\src\/../resources/views/components/notification-manager.blade.php ENDPATH**/ ?>