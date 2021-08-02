<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    //protected $fillable = ['id'];
    public function districts() {
        return $this->hasMany('App\District');
    }
}
