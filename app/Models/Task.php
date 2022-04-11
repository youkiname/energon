<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $attributes = [
        'description' => "",
    ];

    protected $fillable = [
        'title',
        'company_id',
        'user_id',
        'description',
        'priority',
        'date',
        'start_time',
        'end_time'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
