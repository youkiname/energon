<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
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
        return Carbon::create($this->created_at)->toFormattedDateString(); 
    }

    public function relativeDate()
    {
        return substr(Carbon::now()->diffForHumans($this->created_at), 0, -10) . ' назад';
    }
}
