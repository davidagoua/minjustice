<div>
    <div class="toolbar-notifications is-hidden-mobile">
        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
            <div class="is-trigger" aria-haspopup="true">
                <i data-feather="bell"></i>
                <?php if(count(auth()->user()->unreadNotifications) > 0): ?>
                <span class="new-indicator pulsate"></span>
                <?php endif; ?>
            </div>
            <div class="dropdown-menu" role="menu">
                <div class="dropdown-content">
                    <div class="heading">
                        <div class="heading-left">
                            <h6 class="heading-title">Notifications</h6>
                        </div>
                        <div class="heading-right">
                            <a class="notification-link" wire:click.prevent="markAsRead">Marque comme lu</a>
                        </div>
                    </div>
                    <ul class="notification-list">
                        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <a class="notification-item">
                                <div class="user-content">
                                    <p class="user-info"><span class="name"><?php echo e($notif->data['event']); ?></span></p>
                                    <p class="time"><?php echo e($notif->created_at->diffForHumans(now(), \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW)); ?></p>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <span class="text-muted">Aucune notification</span>
                        <?php endif; ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\PhpstormProjects\minijust\resources\views/livewire/notification-widget.blade.php ENDPATH**/ ?>