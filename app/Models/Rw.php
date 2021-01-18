<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $fillable = ['subdist_id', 'rw_name'];
    public $timestamps = true;
    public function subdist()
    {
    	return $this->belongsTo('App\Models\Subdistrict', 'subdist_id');
    }

    public function track()
    {
    	return $this->hasMany('App\Models\Track', 'rw_id');
    }
}
