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
                        <th>Тип</th>
                        <th>Описание</th>
                        <th>Ссылка</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($confirmations as $confirm)
                        <tr class="ss-table-search-table-collapsed">
                            <td>
                                Назначение менеджера
                            </td>
                            <td class="nopadding">
                                <a href="{{ route('companies.show', ['company'=>$confirm->company]) }}">
                                    {{ $confirm->company->fullName() }}
                                </a> запрос на смену ответственного менеджера</td>
                            <td class="nopadding">
                                <a href="{{ route('confirmations.show', ['confirmation'=>$confirm]) }}">Открыть</a>
                            </td>
                            <td class="nopadding">
                                <a href="javascript:void(0)" onclick="adminConfirm(function() {
                                    document.getElementById('destroy{{ $confirm->id }}').submit();
                                })">
                                    Удалить
                                </a>
                                <form action="{{ route('confirmations.destroy', ['confirmation'=>$confirm]) }}"
                                    method="post" id="destroy{{ $confirm->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @foreach($tasksRequests as $taskRequest)
                        <tr class="ss-table-search-table-collapsed">
                            <td>
                                Закрытие задачи
                            </td>
                            <td class="nopadding">
                                <a href="{{ route('tasks.show', ['task'=>$taskRequest->task]) }}">
                                    {{ $taskRequest->task->title }}
                                </a>
                            </td>
                            <td class="nopadding">
                                <a href="{{ route('tasks.show', ['task'=>$taskRequest->task]) }}">
                                    Открыть
                                </a>
                            </td>
                            <td class="nopadding">
                                <a href="javascript:void(0)" onclick="adminConfirm(function() {
                                    document.getElementById('destroyTaskRequest{{ $taskRequest->id }}').submit();
                                })">
                                    Удалить
                                </a>
                                <form action="{{ route('confirmations.destroyTaskRequest', ['taskRequest'=>$taskRequest]) }}"
                                    method="post" id="destroyTaskRequest{{ $taskRequest->id }}">
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