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
        'description',
        'priority',
        'date',
        'start_time',
        'end_time'
    ];
}
