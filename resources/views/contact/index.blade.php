@extends('layouts.app')

@section('title', "Контакты")

@section('content')

<div class="content-box__back-line">
    <div class="container-compatibility">
        <div class="form-contragent-top">
            <div class="title">Контакты</div>
            <a href="#" class="add-contact" style="display:none;">
                Добавить контакт
            </a>
        </div>
    </div>
</div>
<livewire:contacts-list />
</div>
    
@endsection