@extends('layouts.app')

@section('title', "Контакты")

@section('content')
    <x-slot name="header">
        <div class="content-box__back-line">
            <div class="container-compatibility">
                <a href="{{ route('companies.index') }}" class="back">Назад</a>
                <div class="form-contragent-top">
                    <div class="title">Контакты</div>
                    <a href="{{ route('contacts.create') }}" class="add-contact">
                        Добавить контакт
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container-compatibility">
        <div class="ss-container contacts-list">
            <livewire:contact.search />
        </div>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </div>

@endsection