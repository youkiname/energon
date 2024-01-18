<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="img/favicon/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="img/favicon/favicon-32x32.png" type="image/png">
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
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>
<body>
<div class="wrapper">
    <div class="wrap-form">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('img/' . config('app.icons_dir') . '/logo-forms.png') }}" alt="">
        </a>
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    $('body').on('click', '.pass-show', function(e) {
        e.preventDefault();
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).closest('div').find('input[type="text"]').attr('type', 'password');
        } else {
            $(this).addClass('active');
            $(this).closest('div').find('input[type="password"]').attr('type', 'text');
        }
    });
</script>
@yield('scripts')

</body>
</html>
