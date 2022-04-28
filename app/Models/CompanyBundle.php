<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBundle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'creator_id',
        'a_company_id',
        'b_company_id',
        'status_id',
    ];

    public function isConfirmed() {
        return $this->status_id == 2;
    }
}
