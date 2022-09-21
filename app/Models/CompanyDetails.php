<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'contract_number',
        'specification_number',
        'request_number',
        'order_number',
        'order_date',
        'order_sum',
        'manager_premium',
        'working_hours',
        'equipment_type',
        'delivery_place'
    ];
}
