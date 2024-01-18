<div>
    <h2>Вы получили доступ к системе "{{ config('app.name') }}"</h2>
    <h3>Ваши данные:</h3>
    <p>Имя пользователя: {{ $email }}</p>
    <p>Пароль: {{ $password }}</p>

    <p><a href="{{ config('app.url') }}">{{ config('app.name') }}"</a></p>
</div>