<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyManagerConfirmation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'new_manager_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function newManager()
    {
        return $this->belongsTo(User::class, 'new_manager_id', 'id');
    }
}
