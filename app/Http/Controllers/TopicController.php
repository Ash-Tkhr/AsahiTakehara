<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use App\Bookmark;
use App\Category;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
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
        return view('topic.create', [
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
        $topics = new Topic;
        $category = new Category;
        $user = Auth::user();
        $topics->title = $request->title;
        $topics->text = $request->text;
        $topics->user_id = Auth::id();
        if (isset($request->maincategory)) {
            $topics->maincategory_id = $request->maincategory;
        }
        if (isset($request->subcategory)) {
            $topics->subcategory_id = $request->subcategory;
        }

        if (isset($request->image)) {
            $dir = 'picture';
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $image);
            $article->image = 'storage/' . $dir . '/' . $image;
        }
        $topics->save();
        $id = Topic::latest('id')->first();

        return redirect()->route('topic.show', [
            'topic' => $id->id,
            'topics' => $id,
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $topic = Topic::where('id', $topic->id)->first();
        $maincategory = Category::Join('topics', 'categories.id', '=', 'topics.maincategory_id')
            ->where('topics.id', $topic->id)
            ->first();

        $subcategory = Category::Join('topics', 'categories.id', '=', 'topics.subcategory_id')
            ->where('topics.id', $topic->id)
            ->first();
        $other_topics = Topic::latest()->take(5)->get();

        $user = Auth::user();
        return view("topics", [
            'topics' => $topic,
            'user' => $user,
            'maincategory' => $maincategory,
            'subcategory' => $subcategory,
            'others' => $other_topics,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $user = new User;
        $category = new Category;
        $topic = Topic::where('id', $topic->id)->first();
        $user = Auth::user();
        $maincategory = Category::Join('topics', 'categories.id', '=', 'topics.maincategory_id')
            ->where('topics.id', $topic->id)
            ->select('categories.name')
            ->first();
        $subcategory = Category::Join('topics', 'categories.id', '=', 'topics.subcategory_id')
            ->where('topics.id', $topic->id)
            ->select('categories.name')
            ->first();
        return view('topic/edit', [
            'topic' => $topic,
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
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Topic $topic)
    {
        $user = Auth::user();
        $topic->title = $request->title;
        $topic->text = $request->text;
        $topic->user_id = Auth::id();
        if (isset($request->maincategory)) {
            $topic->maincategory_id = $request->maincategory;
        }
        if (isset($request->subcategory)) {
            $topic->subcategory_id = $request->subcategory;
        }

        if (isset($request->image)) {
            $dir = 'picture';
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $image);
            $topic->image = 'storage/' . $dir . '/' . $image;
        }

        $topic->save();
        $id = Topic::latest('id')->first();

        return redirect()->route('topic.show', [
            'topic' => $id,
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect(route('owner'))->with('success', 'トピックスを削除しました');
    }
}
