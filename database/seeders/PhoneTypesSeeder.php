<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EmployeePhoneType;


class PhoneTypesSeeder extends Seeder
{
    public function run()
    {
        EmployeePhoneType::create([
            'name' => 'Мобильный-рабочий'
        ]);
        EmployeePhoneType::create([
            'name' => 'Мобильный-личный'
        ]);
        EmployeePhoneType::create([
            'name' => 'Городской'
        ]);
        EmployeePhoneType::create([
            'name' => 'Доб.'
        ]);
    }
}
