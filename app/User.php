<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
}
