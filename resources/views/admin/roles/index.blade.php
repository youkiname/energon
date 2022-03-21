<x-admin-layout title="Список ролей">

    <div class="app">
        <h4 class="mb-4">
            Роли
        </h4>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="btn-group mb-5">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-primary">Создать роль</a>
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
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>
