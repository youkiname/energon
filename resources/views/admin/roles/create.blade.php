<x-admin-layout title="Создание роли">

    <div class="app">
        <h4 class="mb-4">
            <a href="{{ route('admin.roles.index') }}">Роли</a> / Создать роль
        </h4>

        <form action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="mb-3 row">
                <label for="roleName" class="col-sm-2 col-form-label">Название:</label>
                <div class="col-sm-5 ">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="roleName"
                           name="name" required value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="button-block">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Добавить роль</button>
                </div>
            </div>

        </form>

    </div>

</x-admin-layout>
