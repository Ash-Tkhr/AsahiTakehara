<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Bookmark;
use App\Category;
use App\Comment;
use App\Topic;

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
        return $this->belongsTo('app\Category','id','maincategory_id');
    }
    public function Category2(){
        return $this->belongsTo('app\Category','id','subcategory_id');
    }
    public function Bookmarked($user): bool {
        return Bookmark::where('user_id', $user->id)->where('article_id', $this->id)->first() !==null;
    }
}
