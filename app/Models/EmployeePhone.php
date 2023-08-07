<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePhone extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'employee_id',
        'phone_type_id',
        'phone',
    ];

    public function phoneType()
    {
        return $this->belongsTo(EmployeePhoneType::class);
    }
}
