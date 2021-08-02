<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'author', 'is_vip', 'province_id', 'district_id', 'ward_id', 'ex_date', 'is_block'];
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
