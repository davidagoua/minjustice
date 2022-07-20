<div>
    <div class="toolbar-notifications is-hidden-mobile">
        <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
            <div class="is-trigger" aria-haspopup="true">
                <i data-feather="bell"></i>
                @if(count(auth()->user()->unreadNotifications) > 0)
                <span class="new-indicator pulsate"></span>
                @endif
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
                        @forelse($notifications as $notif)
                        <li>
                            <a class="notification-item">
                                <div class="user-content">
                                    <p class="user-info"><span class="name">{{ $notif->data['event'] }}</span></p>
                                    <p class="time">{{ $notif->created_at->diffForHumans(now(), \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW) }}</p>
                                </div>
                            </a>
                        </li>
                        @empty
                            <span class="text-muted">Aucune notification</span>
                        @endforelse



                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
