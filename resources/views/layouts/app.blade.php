<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ url('/') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Описание">
    <meta name="keywords" content="Ключевые слова">
    <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="./img/favicon/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="./img/favicon/favicon-32x32.png" type="image/png">

    <link rel="apple-touch-icon-precomposed" href="img/favicon/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/favicon/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="img/favicon/apple-touch-icon-1024x1024.png">

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

        function buildNotification(text) {
            let notification = document.createElement('div');
            notification.classList.add("notification");
            notification.innerHTML = `
            <p>${text}</p>
            <button type="button" onclick='onNotificationCloseButton(this)'>X</button>
            `;
            return notification;
        }

        function displayNotification(text) {
            const box = document.getElementById("notifications-box");
            box.appendChild(buildNotification(text));
        }
        // displayNotification('textТстовое уведомление очень борлшое очень обхемное и очен сложеное');
    </script>

</body>

</html>
