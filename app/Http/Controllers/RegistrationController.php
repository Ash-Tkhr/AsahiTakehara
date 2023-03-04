<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Article;
use app\Bookmark;
use app\Category;
use app\Comment;
use app\User;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function articleSerch() {
        return view('article_serch',[

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
}
