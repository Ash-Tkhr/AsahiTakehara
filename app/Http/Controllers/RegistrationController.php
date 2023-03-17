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
    }
    
