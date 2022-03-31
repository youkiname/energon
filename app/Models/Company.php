<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $attributes = array(
        'description' => '',
    );

    protected $fillable = [
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
}
