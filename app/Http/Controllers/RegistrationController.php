<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Bookmark;
use App\Category;
use App\Comment;
use App\User;
use App\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CreateData;
use App\Http\Controllers\CreateComment;


class RegistrationController extends Controller
{
    public function articleSerch() {
        $_SESSION['serchword'];
        return redirect('/article_serch',[
        ]);
    }
    public function topicsCategory() {
        return view('topics_category',[

        ]);
    }
    public function topics() {
        return view('topics',[

        ]);
    }

    public function newArticle(CreateData $request){
        $article=new Article;
        $category=new Category;
        $datas=$request->all();  
        if(Category::where('name',$request->maincategory)->exists()){
            $datas['maincategory']='';
        }else{
            $datas['maincategory']=$request->maincategory;
        }
        if(Category::where('name',$request->subcategory)->exists()){
            $datas['subcategory']='';
        }else{
            $datas['subcategory']=$request->subcategory;
        }
        
        $dir='picture';
        // アップロードされたファイル名の取得
        $image = $request->file('image')->getClientOriginalName();
         // name属性が'image'のinputタグをファイル形式に、画像をpublic/avatarに保存
        $request->file('image')->storeAs('public/' . $dir,$image);
         // 上記処理にて保存した画像に名前を付け、articleテーブルのimageカラムに、格納 

        if(empty($datas->image)){
            $datas['image']='';
        }else{
            $datas['image'] = basename($image_path);
        }
        if(empty($datas->topics_id)){
            $datas['topics_id']='';
        }
        $category->save();

        return redirect()->route('article.conf');
}
public function sendComment(CreateComment $request){
    $comment=new Comment;
    $comment->text=$request->comment;
    $comment->user_id=Auth::id();
    $comment->article_id=$request->id;
    // 以下は仮の値。返信機能実装時に編集。
    $comment->author='1';
    $comment->comment_to='0';
    $comment->save();
    $article=Article::where('id',$request->id)->first();
    $comment=Comment::where('article_id',$article->id)->get();
    return view("/article",[
        'article'=>$article,
        'comments'=>$comment,
    ]);
}

public function store(CreateData $request)
{
    $article=new Article;
    $category=new Category;
    // $datas=$request->all(); 

    $article->title=$request->title;
    $article->text=$request->text;
    $article->user_id=Auth::id();
    if(isset($request->maincategory)){
        $article->maincategory_id=$request->maincategory;
    }
    if(isset($request->subcategory)){
        $article->subcategory_id=$request->subcategory;
    }

    if(isset($request->image)){
        $dir='picture';
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir,$image);
            $article->image='storage/' . $dir . '/' . $image;
    }
    $article->interest='1';
    $article->repeat='1';
    $article->study='1';
    $article->answer='1';
    $article->reaction='1';
    if(isset($request->topics_id)){
        $article->topics_id=$request->topics_id;
    }
    $article->save();
    $id=Article::latest('id')->first();
    // dd($id);


    return redirect()->route('article.show',[
        'article'=>$id,
    ]);
    }

    public function bookmark(Request $request) {

        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $article_id = $request->article_id; //2.投稿idの取得
        $already_bookmarked = Bookmark::where('user_id', $user_id)->where('article_id', $article_id)->first(); //3.
    
        if (!$already_bookmarked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $bookmark = new Bookmark; //4.bookmarkクラスのインスタンスを作成
            $bookmark->article_id = $article_id; //bookmarkインスタンスにarticle_id,user_idをセット
            $bookmark->user_id = $user_id;
            $bookmark->chaining =1;
            $bookmark->del_flg =0;
            $bookmark->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Bookmark::where('article_id', $article_id)->where('user_id', $user_id)->delete();
        }


        return response()->json('ok'); //6.JSONデータをjQueryに返す

        }
    }


    
