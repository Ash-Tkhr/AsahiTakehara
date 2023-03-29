<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookmarkController extends Controller
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
    public function store(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $review_id = $request->review_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('review_id', $review_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->review_id = $review_id; //Likeインスタンスにreview_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('review_id', $review_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $review_likes_count = Review::withCount('likes')->findOrFail($review_id)->likes_count;
        $param = [
            'review_likes_count' => $review_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        return redirect(route('mypage.show', Auth::id()))->with('success', 'ブックマークを解除しました');
    }
}
