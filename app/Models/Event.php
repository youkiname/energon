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
        'creator_id',
        'target_user_id',
        'company_id',
        'event_type_id',
        'created_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id', 'id');
    }

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
