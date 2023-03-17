<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Bookmark;
use App\Category;
use App\Comment;
use App\User;
use App\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=new Category;
        return view('article.create',[
            'maincategories'=>$category->where('type','0')->name,
            'subcategories'=>$category->where('type','1')->name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article=new Article;
        $category=new Category;
        $datas=$request->all(); 

        $article->title=$request->title;
        $article->text=$request->text;
        $article->user_id=Auth::id();
        if(Category::where('name',$request->maincategory)->exists()){
            $datas['maincategory']='';
        }else{
            // $datas['maincategory']=$request->maincategory;
            $article_maincategory=Category::where('name',$request->maincategory)->all();
        }
        if(Category::where('name',$request->subcategory)->exists()){
            $datas['subcategory']='';
        }else{
            $datas['subcategory']=$request->subcategory;
        }

        $dir='picture';
        // アップロードされたファイル名の取得
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir,$image);
        if(isset($request->image)){
                $article->image='strage/' . $dir . '/' . $image;
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
        $id=Article::select('id')->latest('id')->first();

        return redirect()->route('article.show',['article'=>$article['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("/article");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
