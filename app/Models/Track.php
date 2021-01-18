<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['rw_id', 'sembuh', 'meninggal', 'positif', 'reaktif'];
    public $timestamps = true;
    public function rw()
    {
    	return $this->belongsTo('App\Models\Rw', 'rw_id');
    }
}
