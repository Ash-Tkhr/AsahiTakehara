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

    public function newArticle(Request $request){
        $article=new Article;
        $category=new Category;

        $category->category1=$request->category1;
        $category->category2=$request->category2;
        $category->category3=$request->category3;
        $category->category4=$request->category4;
        $category->category5=$request->category5;
        $category->save($category);

        $article->user_id=$request->user_id;
        $article->category1=$request->category1;
        $article->category2=$request->category2;
        $article->category3=$request->category3;
        $article->category4=$request->category4;
        $article->category5=$request->category5;
        $article->title=$request->title;
        $article->image=$request->image;
        $article->text=$request->text;
        $article->interest='1';
        $article->repeat='1';
        $article->study='1';
        $article->answer='1';
        $article->reaction='1';
        $article->topics_id=$request->topics_id;
        foreach($columns as $column){
            $income->$column=$request->$column;
        }
       $article->save($article);
        return redirect('article_create_conf',[
            'article'=>$article,
        ]);
    }
    
}
