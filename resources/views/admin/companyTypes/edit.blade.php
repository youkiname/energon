@extends('layouts.admin')

@section('title', "Тип клиента - {{ $companyType->name }}")

@section('content')
    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.companyTypes.index') }}">Тип клиента</a> / {{ $companyType->name }}
        </h4>
        <form action="{{ route('admin.companyTypes.update', ['companyType' => $companyType]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="companyTypeName" class="col-sm-2 col-form-label">Название:</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="companyTypeName"
                           name="name" required value="{{ $companyType->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="button-block">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

@endsection
