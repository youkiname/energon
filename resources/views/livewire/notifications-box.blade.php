<div class="notifications-box" id="notifications-box" wire:poll.10s="updateNotifications">
    @foreach($notifications as $notification)
        <div class="notification">
            <p>{{ $notification->content }} 
            @if($notification->link)
            - <a href="{{ $notification->link }}" class="notice-item-link">Посмотреть</a>
            @endif
            </p>
            
            <button wire:click="onCloseButton({{ $notification->id }})">X</button>
        </div>
    @endforeach
</div>
