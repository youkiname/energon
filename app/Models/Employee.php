<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'position',
        'first_name',
        'last_name',
        'patronymic',
    ];

    public function isUserHasRights($method, $user) {
        // Просматривать может только главный менеджер, админ
        // Редактировать, добавлять и удалять не может никто кроме админа
        switch ($method) {
            case "GET":
                return $user->isMainManager();
                break;
            case "PUT":
                return false;
                break;
            case "POST":
                return false;
                break;
            case "DELETE":
                return false;
                break;
        }
        return false;
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name . ' ' . $this->patronymic;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function phone()
    {
        return $this->hasOne(EmployeePhone::class);
    }

    public function phones()
    {
        return $this->hasMany(EmployeePhone::class);
    }

    public function deletePhones()
    {
        EmployeePhone::where('employee_id', $this->id)->delete();
    }

    public function email()
    {
        return $this->hasOne(EmployeeEmail::class);
    }

    public function emails()
    {
        return $this->hasMany(EmployeeEmail::class);
    }

    public function deleteEmails()
    {
        EmployeeEmail::where('employee_id', $this->id)->delete();
    }
}
