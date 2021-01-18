<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = ['dist_id', 'subdist_name'];
    public $timestamps = true;
    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'dist_id');
    }

    public function rw()
    {
    	return $this->hasMany('App\Models\Rw', 'subdist_id');
    }
}
