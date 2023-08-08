<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEmail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'employee_id',
        'email_type_id',
        'email',
    ];

    public function emailType()
    {
        return $this->belongsTo(EmployeeEmailType::class);
    }
}
