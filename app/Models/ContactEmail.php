<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'data'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
