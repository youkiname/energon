<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskClosingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'manager_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }
}
