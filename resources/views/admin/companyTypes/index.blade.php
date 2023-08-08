@extends('layouts.admin')

@section('title', "Типы клиентов")

@section('content')
    <div class="app">
        <h4 class="mb-4">
        Типы клиентов
        </h4>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="btn-group mb-5">
            <a href="{{ route('admin.companyTypes.create') }}" class="btn btn-outline-primary">Создать новый</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th style="max-width: 50px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companyTypes as $companyType)
                <tr>
                    <td>{{ $companyType->id }}</td>
                    <td>{{ $companyType->name }}</td>
                    <td>
                        <a href="{{ route('admin.companyTypes.edit', ['companyType' => $companyType]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    class="block w-6 h-6 fill-gray-400" style="max-width: 30px;">
                                <polygon
                                    points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
