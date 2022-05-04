@extends('layouts.app')

@section('title', "Подтверждение")

@section('content')
<div class="content-box__info-item">
    <form action="{{ route('confirmations.confirm', ['confirmation' => $confirmation]) }}" class="contragent-form" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h1>Компания: {{ $confirmation->company->fullName() }}</h1>
        <h1>Запрос смены менеджера на {{ $confirmation->newManager->name }} ({{ $confirmation->newManager->email }})</h1>
        <h1>Текущий: {{ $confirmation->company->manager->name }} ({{ $confirmation->company->manager->email }})</h1>
        <div class="contragent-form-box">
            <div class="contragent-form__item">
                <label for="new_manager_id">Новый менеджер</label>
                <select name="new_manager_id" id="new_manager_id">
                    @foreach($managers as $manager)
                    <option value="{{ $manager->id }}"
                    @if($manager->id == $confirmation->newManager->id) selected @endif
                    >{{ $manager->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-btns">
            <button type="submit" class="btn-blue">Подтвердить</button>
        </div>
    </form>
</div>
@endsection