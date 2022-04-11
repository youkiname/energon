<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'contact',
        'company_id',
        'event_type_id',
        'created_at',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function date()
    {
        return explode(" ", $this->created_at)[0];
    }
}
