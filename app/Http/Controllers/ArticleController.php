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
            'maincategories'=>$category->where('type','0')->get(),
            'subcategories'=>$category->where('type','1')->get(),
            'category'=>$category,
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
 
        $article->title=$request->title;
        $article->text=$request->text;
        $article->user_id=Auth::id();
        if(isset($request->maincategory)){
            $article->maincategory_id=$request->maincategory;
        }
        if(isset($request->subcategory)){
            $article->subcategory_id=$request->subcategory;
        }

        $dir='picture';
        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir,$image);
        if(isset($request->image)){
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


        return redirect()->route('article.show',[
            'article'=>$id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article,Request $request)
    {
        $article=Article::where('id',$article->id)->first();
        return view("/article",[
            'article'=>$article,
        ]);
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
    public function bookmark(Request $request) {

        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $article_id = $request->article_id; //2.投稿idの取得
        $already_bookmarked = Bookmark::where('user_id', $user_id)->where('article_id', $article_id)->first(); //3.
    
        if (!$already_bookmarked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $bookmark = new Bookmark; //4.bookmarkクラスのインスタンスを作成
            $bookmark->article_id = $article_id; //bookmarkインスタンスにarticle_id,user_idをセット
            $bookmark->user_id = $user_id;
            $bookmark->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            bookmark::where('article_id', $article_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $article_bookmarks_count = Article::withCount('bookmarks')->findOrFail($article_id)->bookmarks_count;
        $param = [
            'article_bookmarks_count' => $article_bookmarks_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す

        }
}
        // $maincategory_id=Category::where('id',$article->maincategory_id)->get();
        // $maincategory=$maincategory_id->name;
        // $subcategory_id=Category::where('id',$article->subcategory_id)->get();
        // $subcategory=$subcategory_id->name;