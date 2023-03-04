<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['user_id','category1','category2','category3','category4','category5',
    'title','image','text','interest','repeat','study','answer','reaction','topics_id'];
}
