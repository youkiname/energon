<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'position',
        'first_name',
        'last_name',
        'patronymic',
    ];

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic;
    }

    public function phone()
    {
        return $this->hasOne(EmployeePhone::class);
    }

    public function phones()
    {
        return $this->hasMany(EmployeePhone::class);
    }

    public function email()
    {
        return $this->hasOne(EmployeeEmail::class);
    }

    public function emails()
    {
        return $this->hasMany(EmployeeEmail::class);
    }
}
