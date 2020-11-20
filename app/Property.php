<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded=[];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function taxs()
    {
        return $this->hasMany(Tax::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function units(){
        return $this->hasMany(Unit::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function leases()
    {
        return $this->hasManyThrough(Lease::class, Unit::class);
    }
    public function tenantServicesRequests()
    {
        return $this->hasManyThrough(TenantService::class, Unit::class);
    }

    public function rents()
    {
        return $this->hasManyThrough(Rent::class, Unit::class);
    }
    public function monthlyrent($constantDate)
    {
        return $this->hasManyThrough(Rent::class, Unit::class)->where('paid_date','>=',$constantDate)->select('amount')
         ;

    }


}
