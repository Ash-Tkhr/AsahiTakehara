<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Topic;
use Illuminate\Http\Request;
use App\Bookmark;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = Auth::user();
        $articles = Article::where('user_id', Auth::id())->get();
        $bookmarks = Bookmark::Join('articles', 'bookmarks.article_id', '=', 'articles.id')
            ->where('bookmarks.user_id', Auth::id())
            ->select('articles.title')
            ->get();
        if (isset($bookmarks)) {
            $bookmark = $bookmarks;
        } else {
            $bookmark = '';
        }

        if (isset($articles)) {
            $article = $articles;
        } else {
            $article = '';
        }
        return view("mypage", [
            'articles' => $article,
            'user' => $user,
            'bookmarks' => $bookmark,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $mypage, Request $request)
    {
        $user = Auth::user();
        $articles = Article::where('user_id', Auth::id())->latest()->get();
        $bookmarks = Bookmark::Join('articles', 'bookmarks.article_id', '=', 'articles.id')
            ->where('bookmarks.user_id', Auth::id())
            ->select('articles.id', 'articles.title', 'articles.image')
            ->get();
        if (isset($bookmarks)) {
            $bookmark = $bookmarks;
        } else {
            $bookmark = '';
        }

        if (isset($articles)) {
            $article = $articles;
        } else {
            $article = '';
        }
        return view("mypage", [
            'articles' => $article,
            'user' => $user,
            'bookmarks' => $bookmark,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $mypage)
    {
        $user = new User;
        $article = new Article;
        $user = Auth::user();
        return view('mypage/edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->profile = $request->profile;
        if (isset($request->image)) {
            $dir = 'picture';
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $image);
            $user->image = 'storage/' . $dir . '/' . $image;
        }
        $user->save();
        $article = Auth::user()->Article()->get();
        $bookmark = Auth::user()->Bookmark()->get();
        return redirect()->route('mypage.index', [
            'user' => $user,
            'article' => $article,
            'bookmark' => $bookmark,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
