@extends('layouts.admin')

@section('title', "Панель администратора")

@section('content')
    <div>
        <h4>Панель администрирования</h4>
        <p>Здравствуйте, {{ auth()->user()->name }}</p>
    </div>
@endsection
