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
        $datas=$request->all();  

        if(Category::where('name',$request->maincategory)->exists()){
            $category->name=$request->maincategory;
        }else{
            $datas['maincategory']='';
        }
        if(Category::where('name',$request->subcategory)->exists()){
            $category->name=$request->subcategory;
        }else{
            $datas['subcategory']='';
        }

        $category->save();


     
        if(empty($datas->image)){
            $datas['image']='';
        }
        if(empty($datas->topics_id)){
            $datas['topics_id']='';
        }

        return redirect()->route('article.conf', ['datas'=>$datas]);
}
    }
    
