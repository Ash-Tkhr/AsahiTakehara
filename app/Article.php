<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\User;
use app\Bookmark;
use app\Category;
use app\Comment;
use app\Topic;

class Article extends Model
{
    protected $fillable=['user_id','category1','category2','category3','category4','category5',
    'title','image','text','interest','repeat','study','answer','reaction','topics_id'];

    public function User(){
        return $this->belongsTo('app\User');
    }
    public function Logue(){
        return $this->hasMany('app\Logue');
    }
    public function Comment(){
        return $this->hasMany('app\Comment');
    }
    public function Topic(){
        return $this->belongsTo('app\Topic');
    }
    public function Bookmark(){
        return $this->hasMany('app\Bookmark');
    }
    public function Category1(){
        return $this->belongsTo('app\Category','id','category1');
    }
    public function Category2(){
        return $this->belongsTo('app\Category','id','category2');
    }
    public function Category3(){
        return $this->belongsTo('app\Category','id','category3');
    }
    public function Category4(){
        return $this->belongsTo('app\Category','id','category4');
    }
    public function Category5(){
        return $this->belongsTo('app\Category','id','category5');
    }
}
