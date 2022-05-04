<header class="header">
    <div class="header-box">
        <a href="{{ url('/') }}" class="logo">
            <x-application-logo alt="Zavod Energon CRM" />
        </a>
        <ul class="menu">
            <x-nav-link :href="route('companies.index')" :active="request()->routeIs(['companies.*'])">
                Контрагенты
            </x-nav-link>
            <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                Планировщик
            </x-nav-link>
            <x-nav-link :href="route('stats.index')" :active="request()->routeIs('stats.*')">
                Статистика
            </x-nav-link>
        </ul>
        <div class="profile">
            <div class="profile-name">
                <b>{{ auth()->user()->name }}</b>
                <span>{{ auth()->user()->role->name }}</span>
            </div>
            <div class="profile-image">
                <x-profile-image :photo="Auth::user()->photo" />
            </div>
            <div class="profile-hide">
                <a href="{{ route('profile.index') }}" class="lk-link">Личный кабинет</a>
                <a href="{{ route('contacts.index') }}" class="contact-book">Контакты</a>
                <a href="{{ route('settings.index') }}" class="settings-link">Настройки</a>
                <a href="{{ route('notifications.index') }}" class="note-link">Уведомления</a>
                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.index') }}" class="lk-link sys-admin-link">Управление</a>
                @endif
                @if(auth()->user()->isMainManager())
                <a href="{{ route('confirmations.index') }}" class="lk-link sys-admin-link">Запросы</a>
                @endif
                <a href="{{ route('logout') }}" class="log-out-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Выход
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            
        </div>
    </div>

</header>
