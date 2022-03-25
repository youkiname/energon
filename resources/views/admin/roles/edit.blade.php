@extends('layouts.admin')

@section('title', "Детальная информация о роли {{ $role->name }}")

@section('content')
    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.roles.index') }}">Роли</a> / {{ $role->name }}
        </h4>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link text-danger" data-toggle="confirmation" data-title="Вы уверены?"
                   href="#" onclick="adminConfirm(function() {
                     document.getElementById('roleDelete').submit();
                   })">
                    Удалить роль
                </a>
                <form action="{{ route('admin.roles.destroy', ['role' => $role]) }}"
                      method="post" id="roleDelete">
                    @csrf
                    @method('DELETE')
                </form>
            </li>
        </ul>
        <form action="{{ route('admin.roles.update', ['role' => $role]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="roleName" class="col-sm-2 col-form-label">Название:</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="roleName"
                           name="name" required value="{{ $role->name }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
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
