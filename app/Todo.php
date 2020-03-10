<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = ['title', 'body'];

    public function comments() {
      return $this->hasMany('App\Comment');
    }
}
