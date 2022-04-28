<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $attributes = array(
        'description' => '',
    );

    protected $fillable = [
        'creator_id',
        'name',
        'ssn',
        'legal',
        'city',
        'address',
        'company_type_id',
        'company_purchase_id',
        'company_status_id',
        'company_potentiality_id',
        'description'
    ];

    public function isUserHasRights($method, $user) {
        // Просматривать может только главный менеджер, админ и создатель
        // Редактировать и удалять не может никто кроме админа
        // Создавать могут все
        switch ($method) {
            case "GET":
                return $user->isMainManager() || $this->creator_id == $user->id;
                break;
            case "PUT":
                return false;
                break;
            case "POST":
                return true;
                break;
            case "DELETE":
                return false;
                break;
        }
        return false;
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function bundledCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_bundles', 'a_company_id', 'b_company_id');
    }

    public function isBundleConfirmed($another_company_id) {
        $bundle = CompanyBundle::where('b_company_id', $another_company_id)->first();
        return $bundle->isConfirmed();
    }

    public function details()
    {
        return $this->hasOne(CompanyDetails::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function employeesCount()
    {
        return $this->hasMany(Employee::class)->count();
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function purchase()
    {
        return $this->belongsTo(CompanyPurchase::class, 'company_purchase_id');
    }

    public function status()
    {
        return $this->belongsTo(CompanyStatus::class, 'company_status_id');
    }

    public function potentiality()
    {
        return $this->belongsTo(Potentiality::class, 'company_potentiality_id');
    }

    public function fullName()
    {
        return $this->legal . ' ' . $this->name;
    }
}
