<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logue extends Model
{
    public function Article()
    {
        return $this->belongsTo('app\Article');
    }
    public function User()
    {
        return $this->belongsTo('app\User');
    }
}
