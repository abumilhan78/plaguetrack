<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'dist_name'];
    public $timestamps = true;
    public function city()
    {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function subdist()
    {
    	return $this->hasMany('App\Models\Subdistrict', 'dist_id');
    }
}
