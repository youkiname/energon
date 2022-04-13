@extends('layouts.app')

@section('title', "Планировщик задач")

@section('content')
<div class="content-box__info-item">
    <div class="container">
        <div class="plans-box">
            <div class="plans-box__left">
                <div class="plans-calendar">
                </div>

                <div class="plans-request">
                    <div class="plans-request-info" style="@if ($errors->any()) display: none; @endif">
                        <div class="plans-request-img"><img src="img/request-ico.svg" alt=""></div>
                        <div class="plans-request-title">Новая заметка</div>
                        <div class="plans-request-desc">Добавленная заметка отображается в блоке *планировщика справа, через него вы можете редактировать текущие заметки или смещаь время их реализации на другой срок</div>
                        <a href="#" class="btn-blue">Добавить</a>
                    </div>

                    <div class="plans-request-form" style="@if (!$errors->any()) display: none; @endif">
                        <div class="title">Добавить</div>
                        @include('tasks.components.form')
                    </div>
                </div>

                
            </div>
            <div class="plans-box__right">
                <a href="javascript:void(0)" class="add-card"><span>Добавить</span><i></i></a>
                <livewire:tasks-list />
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.plans-calendar').datepicker({
            dateFormat: 'yyyy-mm-dd',
            onSelect: function(dateText) {
                Livewire.emit('changeTaskDateFilter', dateText)
            }
        });
    });
</script>

@endsection
