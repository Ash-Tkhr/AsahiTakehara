<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function Topic(){
        return $this->belongsTo('app\Topic');
    }
}
