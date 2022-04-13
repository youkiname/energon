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
        'user_id',
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
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function humanDate()
    {
        return Carbon::create($this->date)->toFormattedDateString(); 
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
        return $this->deadline()->diffForHumans(Carbon::now());
    }

    public function isExpired()
    {
        return Carbon::now() > $this->deadline();
    }
}
