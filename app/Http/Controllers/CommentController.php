<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Category;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Article $article)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(CreateComment $request)
    {
        $comment=new Comment;
        $comment->text=$request->comment;
        $comment->user_id=Auth::id();
        // 以下は仮の値。返信機能実装時に編集。
        $comment->article_id=$redirect->id;
        $comment->author='1';
        $comment->comment_to='1';
        
        $comment->save();
        $user=Auth::user();
        $article=Article::where('id',$article->id)->first();
        $maincategory=Category::Join('articles', 'categories.id', '=', 'articles.maincategory_id')
                            ->where('articles.id',$article->id)
                            ->first();

        $subcategory=Category::Join('articles', 'categories.id', '=', 'articles.subcategory_id')
                            ->where('articles.id',$article->id)
                            ->first();

        return redirect("article/comment",[
            'maincategory'=>$maincategory,
            'subcategory'=>$subcategory,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
