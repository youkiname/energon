<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ url('/') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Описание">
    <meta name="keywords" content="Ключевые слова">
    <link rel="icon" href="img/{{ config('app.icons_dir') }}/favicon/favicon.ico">
    <link rel="manifest" href="img/{{ config('app.icons_dir') }}/favicon/manifest.json">

    <link rel="stylesheet" href="css/vendor.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sys.css">
    <link rel="stylesheet" href="css/notifications.css">

    @livewireStyles
    <title>@yield('title', config('app.name'))</title>
</head>

<body>
    <livewire:notifications-box /> 
    <div class="wrapper">
        @include('components.navigation')
        @if (session()->has('success'))
            <div class="settings-success">
                <div class="message-form message-ok">{{ session('success') }}</div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="settings-success">
                <div class="message-form message-error">{{ session('error') }}</div>
            </div>
        @endif
        <div class="content-box">
            <div class="content-box__back-line">
                <div class="container">
                    <a href="{{ url()->previous() }}" class="back">Назад</a>
                </div>
            </div>
            @if ($errors->any())
                <div class="message-form message-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

        <footer class="footer">
            <div class="container"></div>
        </footer>
    </div>

    @livewireScripts
    <script src="js/vendor.min.js"></script>
    <script src="js/main.js"></script>
    <script src="{{ asset('js/swal.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    {{ $scripts ?? '' }}

    <script>
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            })
        });

        function onNotificationCloseButton(event) {
            event.parentElement.remove();
        }
    </script>

</body>

</html>
