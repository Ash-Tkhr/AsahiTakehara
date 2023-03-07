<?php

namespace App\Http\Controllers;

use App\Article;
use app\Bookmark;
use app\Category;
use app\Comment;
use app\User;
use app\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        return view('articles_create_conf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(int $id,Request $request){
        $article=new Article;
        $category=new Category;

        $category->name=$request->category1;
        $category->name=$request->category2;
        $category->name=$request->category3;
        $category->name=$request->category4;
        $category->name=$request->category5;
        $category->save();

        $article->title=$request->title;
        $article->text=$request->text;
        $article->user_id=Auth::id();
        $article->category1=Category::where('name', '=', $request->category1)->first(['id']);
        $article->category2=Category::where('name', '=', $request->category2)->first(['id']);
        $article->category3=Category::where('name', '=', $request->category3)->first(['id']);
        $article->category4=Category::where('name', '=', $request->category4)->first(['id']);
        $article->category5=Category::where('name', '=', $request->category5)->first(['id']);
        $article->image=$request->image;
        $article->interest='1';
        $article->repeat='1';
        $article->study='1';
        $article->answer='1';
        $article->reaction='1';
        $article->topics_id='';
        $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
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
