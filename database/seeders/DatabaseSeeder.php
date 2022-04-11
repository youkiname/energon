<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyType;
use App\Models\CompanyPurchase;
use App\Models\CompanyStatus;
use App\Models\Potentiality;
use App\Models\Role;
use App\Models\EventType;

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
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'role2'
        ]);
        Role::create([
            'name' => 'role3'
        ]);

        CompanyType::create([
            'name' => "Тип контрагента 1",
        ]);
        CompanyType::create([
            'name' => "Тип контрагента 2",
        ]);
        CompanyType::create([
            'name' => "Тип контрагента 3",
        ]);

        CompanyPurchase::create([
            'name' => "Тип закупки 1",
        ]);
        CompanyPurchase::create([
            'name' => "Тип закупки 2",
        ]);
        CompanyPurchase::create([
            'name' => "Тип закупки 3",
        ]);

        CompanyStatus::create([
            'name' => "Проработка",
        ]);
        CompanyStatus::create([
            'name' => "В работе",
        ]);
        CompanyStatus::create([
            'name' => "В ожидании",
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
    } 
}
