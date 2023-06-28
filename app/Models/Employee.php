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
        // Все действия может совершать админ, главный менеджер
        // и менеджер этого контрагента
        return $user->isMainManager() || $this->company->target_user_id == $user->id;
    }

    public function getFullName() {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function phone()
    {
        $phone = EmployeePhone::where('employee_id', $this->id)->first();
        return $phone ? $phone->phone : '';
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
        $email = EmployeeEmail::where('employee_id', $this->id)->first();
        return $email ? $email->email : '';
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
