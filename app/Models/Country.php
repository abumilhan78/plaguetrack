<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function case2()
    {
    	return $this->hasMany('App\Models\Case2', 'country_id');
    }
}
