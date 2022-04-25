<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    public $priorities = [
        0 => "Низкий",
        1 => "Средний",
        2 => "Высокий",
    ];

    protected $attributes = [
        'description' => "",
    ];

    protected $fillable = [
        'title',
        'company_id',
        'creator_id',
        'target_user_id',
        'description',
        'task_priority_id',
        'task_status_id',
        'date',
        'start_time',
        'end_time'
    ];

    public function priority()
    {
        return $this->belongsTo(TaskPriority::class, 'task_priority_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id', 'id');
    }

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

    public function humanDate()
    {
        return Carbon::create($this->date)->toFormattedDateString(); 
    }

    public function getFormattedStartTime() {
        // Some DB like mysql save time field like HOURS:MINUTES:SEC
        // We need HOURS:MINUTES
        $hours = explode(':', $this->start_time)[0];
        $minutes = explode(':', $this->start_time)[1];
        return $hours . ':' . $minutes;
    }

    public function getFormattedEndTime() {
        // Some DB like mysql save time field like HOURS:MINUTES:SEC
        // We need HOURS:MINUTES
        $hours = explode(':', $this->end_time)[0];
        $minutes = explode(':', $this->end_time)[1];
        return $hours . ':' . $minutes;
    }

    public function startDate()
    {
        return Carbon::create($this->date . ' ' . $this->start_time);
    }

    public function deadline()
    {
        return Carbon::create($this->date . ' ' . $this->end_time);
    }

    public function deadlineDiff()
    {
        return substr($this->deadline()->diffForHumans(Carbon::now()), 0, -4) . ' назад';
    }

    public function isExpired()
    {
        return Carbon::now() > $this->deadline();
    }
}
