<?php

namespace App\Entities;

use App\Entities\Entity;
/*use App\Entities\Address;
use App\Entities\Company;*/

class Usuario extends Entity
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'phone', 'email', 'compañia', 'street', 'lat', 'lng'
    ];
    protected $dates = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
    }

    /*public function address()
    {
        return $this->hasOne(Address::getClass(), 'id', 'address_id');
    }

    public function company()
    {
        return $this->hasOne(Company::getClass(), 'id', 'company_id');
    }*/
}
