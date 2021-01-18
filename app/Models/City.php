<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['prov_id', 'city_name'];
    public $timestamps = true;
    public function province()
    {
    	return $this->belongsTo('App\Models\Province', 'prov_id');
    }

    public function district()
    {
    	return $this->hasMany('App\Models\District', 'city_id');
    }
}
