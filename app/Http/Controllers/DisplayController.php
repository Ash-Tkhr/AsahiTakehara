<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Article;
use app\Bookmark;
use app\Category;
use app\Comment;
use app\User;
use app\Topic;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    public function index() {
        return view('top',[

        ]);
    }
    public function article() {
        return view('article',[

        ]);
    }
    public function articleSerch() {
        return view('article_serch',[

        ]);
    }
    public function articleCreate() {
        return view('article_create',[

        ]);
    }
}

