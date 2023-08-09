@extends('layouts.app')

@section('title', "Детальный просмотр: " . $company->name)

@section('content')
@include('components.decor-images')

@include('company.components.show-details')

@if(count($company->images) > 0)
<div class="container" style="margin-bottom: 40px;">
<div class="elem-line">
    <span>Изображения</span>
    <div class="images-preview" id="images-preview" style="margin-top: 20px;">
        @foreach($company->images as $image)
        <a href="{{ url('uploads/company-images/' . $image->filename) }}" target="_blank" rel="noreferrer noopener">
            <img src="{{ url('uploads/company-images/' . $image->filename) }}" alt="" 
            style="cursor: zoom-in"
            width=200
            height=170
            class="upload-image-preview">
        </a>
        @endforeach
    </div>
</div>
</div>
@endif

<div class="elem-information">
    <div class="container">
        <div class="elem-information__btns">
        <a href="{{ route('companies.show', ['company' => $company]) }}" class="btn-switch active" data-switch="tab_1">Лента событий</a>
            <a href="{{ route('companies.contacts', ['company' => $company]) }}" class="btn-switch" data-switch="tab_2">Контакты</a>
            <a href="{{ route('companies.tasks', ['company' => $company]) }}" class="btn-switch" data-switch="tab_3">События</a>
        </div>
        <a href="javascript:void(0)" class="btn-filter"><span>Фильтр</span></a>
        <div class="elem-information__box">
            <div class="elem-item" id="tab_1">
            <livewire:company-events :company="$company"/>
            </div>
        </div>
    </div>
</div>
<script>
    $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
            modal.remove();
            $('body').off('keyup.modal-close');
        }
        modal = $('<div>').css({
            background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '100%',
            height: '100%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out'
        }).click(function() {
            removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function(e) {
            if (e.key === 'Escape') {
            removeModal();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function(){
        $('#add-new-employee-btn').click(function() {
            if ($('#employee-form').is(":visible")) {
                return
            }
            $('#employee-form').show();
            $('#add-new-employee-btn').hide();
        });

        $('#add-new-bundle-btn').click(function() {
            if ($('#bundle-company-select').is(":visible")) {
                return
            }
            $('#bundle-company-select').show();
            $('#add-new-bundle-btn').hide();
        });
    });
</script>
@endsection
