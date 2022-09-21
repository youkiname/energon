<div class="container-compatibility">
    <div class="ss-container contacts-list">
        <div class="ss-table-search">
            <div class="ss-table-search-box">
                <div class="ss-table-search-box-icon">
                    <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <input type="text" 
                placeholder="Найти контакт по имени, номеру телефона или E-mail" 
                wire:model="searchQuery" autocomplete="off"
                style="height: 100%;">
            </div>
            <div class="ss-table-search-table">
                <table>
                    <thead>
                    <tr>
                        <th style="max-width: 55px;">ID</th>
                        <th>Фамилия Имя Отчество</th>
                        <th>Должность</th>
                        <th style="min-width: 160px;">Номер телефона</th>
                        <th style="min-width: 160px;">Адрес электронной почты</th>
                        <th>Организация</th>
                        <th style="min-width: 115px;">Добавлен</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr class="ss-table-search-table-collapsed">
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->getFullName() }}</td>
                            <td>{{ $employee->position }}</td>
                            <td class="nopadding">
                                <div class="linkblock">
                                    <a href="tel:{{ $employee->phone() }}">{{ $employee->phone() }}</a>
                                </div>
                            </td>
                            <td class="nopadding">
                                <div class="linkblock">
                                    <a href="mailto:{{ $employee->email() }}">{{ $employee->email() }}</a>
                                </div>
                            </td>
                            <td class="nopadding">
                                <a href="{{ route('companies.contacts', ['company'=>$employee->company]) }}">
                                    {{ $employee->company->fullName() }} №{{ $employee->company->id }}
                                </a>
                            </td>
                            <td>{{ $employee->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>