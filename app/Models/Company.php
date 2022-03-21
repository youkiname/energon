<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\CompanyStatus;

use Carbon\Carbon;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company_type_id',
        'company_status_id',
        'company_purchase_id',
        'potentiality_id',
        'city_id',
        'name',
        'legal',
        'ssn',
        'description',
        'address',
        'contract',
        'specification',
        'offer_number',
        'order_number',
        'order_date',
        'order_total',
        'manager_bonus',
        'working_hours',
        'equipment',
    ];

    protected $appends = ['url'];

    public function links()
    {
        return $this->morphToMany(Company::class, 'linkable');
    }

    public function companies()
    {
        return $this->morphedByMany(Company::class, 'linkable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }

    public function companyStatus()
    {
        return $this->belongsTo(CompanyStatus::class);
    }

    public function companyPurchase()
    {
        return $this->belongsTo(CompanyPurchase::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function potentiality()
    {
        return $this->belongsTo(Potentiality::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class)->latest();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)
            ->orderBy('deadline_at', 'ASC');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function awaits()
    {
        return $this->hasMany(CompanyAwait::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class)->orderBy('created_at', 'DESC');
    }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    /** Setters & Getters */
    public function getFullNameAttribute()
    {
        return "{$this->legal} {$this->name}";
    }

    public function getUrlAttribute()
    {
        return route('companies.show', ['company' => $this]);
    }

    public function setOrderTotalAttribute($value)
    {
        $this->attributes['order_total'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }

    public function setManagerBonusAttribute($value)
    {
        $this->attributes['manager_bonus'] = $value ? preg_replace('/[^0-9]/', '', $value) : null;
    }


    protected static function booted()
    {
        /*static::updating(function($company){
            if($company->isDirty('company_status_id')) {
                $event = $company->events()->create([
                    'user_id' => Auth::user()->id,
                    'title' => 'Изменение статуса'
                ]);
                $oldStatus = CompanyStatus::find($company->getOriginal('company_status_id'))->name;
                $newStatus = CompanyStatus::find($company->getChanges('company_status_id'))->name;
                $comment = Comment::create([
                    'company_id' => $company->id,
                    'user_id' => auth()->user()->getAuthIdentifier(),
                    'data' => 'Статус контрагента изменен с ' . $oldStatus . ' на ' . $newStatus,
                ]);
                $event->attachable()->associate($comment);
                $event->save();
            }
        });*/
    }

    public function getRouteKeyName()
    {
        return 'ssn';
    }

}
