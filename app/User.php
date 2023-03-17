<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable=['name','email','password','image','profile','role','del_flg'];
    public function Comment(){
        return $this->hasMany('app\Comment');
    }
    public function Logue(){
        return $this->hasMany('app\Logue');
    }
    public function Bookmark(){
        return $this->hasMany('app\Bookmark');
    }
    public function Topic(){
        return $this->hasMany('app\Topic');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function bookmarked($user): bool {
        return Like::where('user_id', $user->id)->where('article_id', $this->id)->first() !==null;
    }
}
