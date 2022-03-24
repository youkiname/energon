<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyType;
use App\Models\CompanyPurchase;
use App\Models\CompanyStatus;
use App\Models\Potentiality;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
            'name' => "Статус 1",
        ]);
        CompanyStatus::create([
            'name' => "Статус 2",
        ]);
        CompanyStatus::create([
            'name' => "Статус 3",
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
    }
}
