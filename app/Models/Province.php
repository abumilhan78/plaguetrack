<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['prov_name'];
    public $timestamps = true;
    public function kota()
    {
    	return $this->hasMany('App\Models\City','prov_id');
    }
}
