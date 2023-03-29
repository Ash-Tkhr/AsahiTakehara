<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Bookmark extends Model
{
    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
}
