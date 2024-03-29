@extends('layouts.admin')

@section('title', "Создать Тип клиента")

@section('content')
    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.companyTypes.index') }}">Типы клиентов</a> / Создать новый
        </h4>

        <form action="{{ route('admin.companyTypes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="companyTypeName" class="col-sm-2 col-form-label">Название:</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="companyTypeName"
                           name="name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="button-block">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Добавить тип клиента</button>
                </div>
            </div>
        </form>
    </div>
@endsection
