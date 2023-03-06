<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Article;
use app\Bookmark;
use app\Category;
use app\Comment;
use app\User;
use app\Topic;
use Illuminate\Support\Facades\DB;

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

    public function newArticle(int $id,Request $request){
        $article=new Article;
        $category=new Category;

        $category->name=$request->category1;
        $category->name=$request->category2;
        $category->name=$request->category3;
        $category->name=$request->category4;
        $category->name=$request->category5;
        $category->save($category);

        $columns=['user_id','title','image','text','topics_id'];
        $article->category1=$request->category1;
        $article->category2=$request->category2;
        $article->category3=$request->category3;
        $article->category4=$request->category4;
        $article->category5=$request->category5;
        $article->interest='1';
        $article->repeat='1';
        $article->study='1';
        $article->answer='1';
        $article->reaction='1';
        foreach($columns as $column){
            $article->$column=$request->$column;
        }
       $article->save();
        return redirect('article_create_conf',[
            'article'=>$article,
        ]);
    }
    
}
