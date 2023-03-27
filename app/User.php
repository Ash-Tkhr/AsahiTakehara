<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetUserNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    protected $fillable=['name','email','password','image','profile','role','del_flg'];
    public function Article(){
        return $this->hasMany('App\Article');
    }
    public function Comment(){
        return $this->hasMany('app\Comment');
    }
    public function Logue(){
        return $this->hasMany('app\Logue');
    }
    public function Bookmark(){
        return $this->hasMany('App\Bookmark');
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
    use Notifiable;
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetUserNotification($token));    
    }   
}
