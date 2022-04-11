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
        return Carbon::create($this->created_at)->toFormattedDateString(); 
    }

    public function relativeDate()
    {
        $diffInDays = Carbon::now()->diffInDays($this->created_at);
        if ($diffInDays > 0) {
            return $diffInDays . " дня назад";
        }
        $diffInHours = Carbon::now()->diffInHours($this->created_at);
        if ($diffInHours > 0) {
            return $diffInHours . " часов назад";
        }
        return "Менее часа назад";
    }
}
