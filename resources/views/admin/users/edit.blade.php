@extends('layouts.admin')

@section('title', "Редактирование пользователя")

@section('content')
<div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.users.index') }}">Пользователи</a> / Пользователь {{ $user->name }}
        </h4>

        <form action="{{ route('admin.users.update', ['user'=>$user]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="userName" class="col-sm-2 col-form-label">Имя пользователя:</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="userName"
                           name="name" required value="{{ $user->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="userEmail" class="col-sm-2 col-form-label">Адрес эл. почты:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="userEmail" name="email" required  value="{{ $user->email }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="userRole" class="col-sm-2 col-form-label">Роль пользователя:</label>
                <div class="col-sm-3">
                    <select name="role_id" id="userRole" class="form-select @error('role_id') is-invalid @enderror">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($role->id == $user->role->id) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
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
