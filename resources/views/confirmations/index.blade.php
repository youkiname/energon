@extends('layouts.app')

@section('title', "Подтверждения")

@section('content')

<div class="content-box__back-line">
    <div class="container-compatibility">
        <div class="form-contragent-top">
            <div class="title">Запросы</div>
        </div>
    </div>
</div>
<div class="container-compatibility">
    <div class="ss-container contacts-list">
        <div class="ss-table-search">
            <div class="ss-table-search-table">
                <table>
                    <thead>
                    <tr>
                        <th>Контрагент</th>
                        <th>Текущий менеджер</th>
                        <th>Новый менеджер</th>
                        <th>Ссылка</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($confirmations as $confirm)
                        <tr class="ss-table-search-table-collapsed">
                            <td class="nopadding">
                                <a href="{{ route('companies.show', ['company'=>$confirm->company]) }}">{{ $confirm->company->fullName() }}</a>
                            </td>
                            <td>{{ $confirm->company->manager->name }}</td>
                            <td>{{ $confirm->newManager->name }}</td>
                            <td class="nopadding">
                                <a href="{{ route('confirmations.show', ['confirmation'=>$confirm]) }}">Открыть</a>
                            </td>
                            <td class="nopadding">
                                <a href="javascript:void(0)" onclick="adminConfirm(function() {
                                    document.getElementById('reject{{ $confirm->id }}').submit();
                                })">
                                    Отклонить
                                </a>
                                <form action="{{ route('confirmations.destroy', ['confirmation'=>$confirm]) }}"
                                    method="post" id="reject{{ $confirm->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection