@extends('layouts.app')

@section('title', "Уведомления")

@section('content')
    <div class="content-box__back-line">
        <div class="container-compatibility">
            <div class="form-contragent-top">
                <div class="title">Уведомления ({{ $amount }})</div>
            </div>
        </div>
    </div>

    <div class="container-compatibility">
        @foreach($notifications as $notification)
        <div class="notice-item notice-item-new">
            <div class="notice-item-heading">
                <div class="notice-item-title">
                    {{ $notification->title }}
                </div>
                <div class="notice-item-date">
                    {{ $notification->created_at }}
                </div>
            </div>
            <div class="notice-item-body">
            {{ $notification->content }}
            </div>
            @if($notification->link)
            <a href="{{ $notification->link }}" class="notice-item-link">Посмотреть</a>
            @endif
        </div>
        @endforeach

        {{ $notifications->links('vendor.pagination.notifications') }}
        
    </div>
@endsection
