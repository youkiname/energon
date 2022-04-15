<div>
    <h2>Вы получили новое уведомление</h2>
    <h3>{{ $notification->title }}</h3>
    <p>{{ $notification->content }}</p>
    @if($notification->link)
    <a href="{{ $notification->link }}">Посмотреть</a>
    @endif
</div>