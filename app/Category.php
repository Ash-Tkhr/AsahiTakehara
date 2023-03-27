<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
{
    
    public function Article(){
        return $this->hasMany('App\Article');
    }
}
