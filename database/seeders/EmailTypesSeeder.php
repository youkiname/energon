<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EmployeeEmailType;

class EmailTypesSeeder extends Seeder
{
    public function run()
    {
        EmployeeEmailType::create([
            'name' => 'Рабочая почта'
        ]);
        EmployeeEmailType::create([
            'name' => 'Личная почта'
        ]);
    }
}
