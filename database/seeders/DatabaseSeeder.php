<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\CompanyType;
use App\Models\CompanyPurchase;
use App\Models\CompanyStatus;
use App\Models\CompanyBundleStatus;
use App\Models\Potentiality;
use App\Models\Role;
use App\Models\EventType;
use App\Models\TaskStatus;
use App\Models\TaskPriority;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Администратор'
        ]);
        Role::create([
            'name' => 'Главный Менеджер'
        ]);
        Role::create([
            'name' => 'Менеджер'
        ]);

        CompanyType::create([
            'name' => "Монтажная организация",
        ]);
        CompanyType::create([
            'name' => "Промышленное предприятие",
        ]);
        CompanyType::create([
            'name' => "Инвестиционный проект",
        ]);
        CompanyType::create([
            'name' => "АПК",
        ]);
        CompanyType::create([
            'name' => "Проектировщики",
        ]);
        CompanyType::create([
            'name' => "Сетевая компания",
        ]);
        CompanyType::create([
            'name' => "Строительная компания",
        ]);

        CompanyPurchase::create([
            'name' => "Внутренняя закупка",
        ]);
        CompanyPurchase::create([
            'name' => "Закупка по 223-Ф3",
        ]);
        CompanyPurchase::create([
            'name' => "Коммерческие закупки на электронной площадке",
        ]);

        CompanyStatus::create([
            'name' => "Проработка",
        ]);
        CompanyStatus::create([
            'name' => "Действующий - разовый",
        ]);
        CompanyStatus::create([
            'name' => "Действующий - постоянный",
        ]);
        CompanyStatus::create([
            'name' => "В ожидании",
        ]);
        CompanyStatus::create([
            'name' => "Закрыт",
        ]);

        CompanyBundleStatus::create([
            'name' => "Неподтверждено"
        ]);
        CompanyBundleStatus::create([
            'name' => "Утверждено"
        ]);

        Potentiality::create([
            'name' => "Крупный",
        ]);
        Potentiality::create([
            'name' => "Средний",
        ]);
        Potentiality::create([
            'name' => "Низкий",
        ]);

        EventType::create([
            'name' => 'Телефонный звонок',
        ]);
        EventType::create([
            'name' => 'Заказ',
        ]);
        EventType::create([
            'name' => 'Заявка',
        ]);
        EventType::create([
            'name' => 'Редактирование',
        ]);
        EventType::create([
            'name' => 'Комментарий',
        ]);
        EventType::create([
            'name' => 'Новая задача',
        ]);

        TaskStatus::create([
            'name' => 'В ожидании',
        ]);
        TaskStatus::create([
            'name' => 'В работе',
        ]);
        TaskStatus::create([
            'name' => 'Отложена',
        ]);
        TaskStatus::create([
            'name' => 'Выполнена',
        ]);

        TaskPriority::create([
            'name' => 'Низкий',
            'engName' => 'low',
        ]);
        TaskPriority::create([
            'name' => 'Средний',
            'engName' => 'middle',
        ]);
        TaskPriority::create([
            'name' => 'Высокий',
            'engName' => 'high',
        ]);

        User::create([
            'name' => 'Vadim',
            'role_id' => 1,
            'email' => 'rright_02@aol.com',
            'password' => Hash::make('132'),
        ]);
        User::create([
            'name' => 'Vadim2',
            'role_id' => 3,
            'email' => 'vadimv10@mail.ru',
            'password' => Hash::make('132'),
        ]);

        $this->call([
            EmailTypesSeeder::class,
            PhoneTypesSeeder::class
        ]);
    } 
}
