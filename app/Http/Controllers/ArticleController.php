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
        $user = Auth::user();
        $category = new Category;
        return view('article.create', [
            'maincategories' => $category->where('type', '0')->get(),
            'subcategories' => $category->where('type', '1')->get(),
            'category' => $category,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $article = new Article;
        $category = new Category;

        $user = Auth::user();
        $article->title = $request->title;
        $article->text = $request->text;
        $article->user_id = Auth::id();
        if (isset($request->maincategory)) {
            $article->maincategory_id = $request->maincategory;
        }
        if (isset($request->subcategory)) {
            $article->subcategory_id = $request->subcategory;
        }

        if (isset($request->image)) {
            $dir = 'picture';
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $image);
            $article->image = 'storage/' . $dir . '/' . $image;
        }
        $article->interest = '1';
        $article->repeat = '1';
        $article->study = '1';
        $article->answer = '1';
        $article->reaction = '1';
        if (isset($request->topics_id)) {
            $article->topics_id = $request->topics_id;
        }
        $article->save();
        $id = Article::latest('id')->first();


        return redirect()->route('article.show', [
            'article' => $id,
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Request $request)
    {
        $article = Article::where('id', $article->id)->first();
        $maincategory = Category::Join('articles', 'categories.id', '=', 'articles.maincategory_id')
            ->where('articles.id', $article->id)
            ->first();

        $subcategory = Category::Join('articles', 'categories.id', '=', 'articles.subcategory_id')
            ->where('articles.id', $article->id)
            ->first();
        $comment = Comment::Join('users', 'comments.user_id', '=', 'users.id')
            ->where('article_id', $article->id)
            ->select('users.name', 'comments.text', 'comments.created_at')
            ->get();
        $user = Auth::user();
        $author = User::Join('articles', 'users.id', '=', 'articles.user_id')
            ->where('articles.id', $article->id)
            ->select('articles.id as articles_id', 'articles.title', 'articles.text', 'articles.image as articles_image', 'users.id as user_id', 'users.name', 'users.image as user_image')
            ->first();
        return view("article", [
            'article' => $article,
            'comments' => $comment,
            'user' => $user,
            'maincategory' => $maincategory,
            'subcategory' => $subcategory,
            'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Request $request)
    {
        $user = new User;
        $category = new Category;
        $article = Article::where('id', $article->id)->first();
        $user = Auth::user();
        $maincategory = Category::Join('articles', 'categories.id', '=', 'articles.maincategory_id')
            ->where('articles.id', $article->id)
            ->select('categories.name')
            ->first();
        $subcategory = Category::Join('articles', 'categories.id', '=', 'articles.subcategory_id')
            ->where('articles.id', $article->id)
            ->select('categories.name')
            ->first();
        return view('article/edit', [
            'article' => $article,
            'user' => $user,
            'maincategories' => $category->where('type', '0')->get(),
            'subcategories' => $category->where('type', '1')->get(),
            'maincategory' => $maincategory,
            'subcategory' => $subcategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Article $article)
    {
        $user = Auth::user();
        $article->title = $request->title;
        $article->text = $request->text;
        $article->user_id = Auth::id();
        if (isset($request->maincategory)) {
            $article->maincategory_id = $request->maincategory;
        }
        if (isset($request->subcategory)) {
            $article->subcategory_id = $request->subcategory;
        }

        if (isset($request->image)) {
            $dir = 'picture';
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $image);
            $article->image = 'storage/' . $dir . '/' . $image;
        }
        $article->interest = '1';
        $article->repeat = '1';
        $article->study = '1';
        $article->answer = '1';
        $article->reaction = '1';
        if (isset($request->topics_id)) {
            $article->topics_id = $request->topics_id;
        }
        $article->save();
        $id = Article::latest('id')->first();

        return redirect()->route('article.show', [
            'article' => $id,
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, User $mypage)
    {
        $article->delete();
        return redirect(route('mypage.show', Auth::id()))->with('success', 'ブログ記事を削除しました');
    }
    public function bookmark(Request $request)
    {

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