<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Bookmark;
use App\Category;
use App\Comment;
use App\User;
use App\Topic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $topics = Topic::latest()->take(15)->get();
        return view('top', [
            'user' => $user,
            'topics' => $topics,
        ]);
    }
    public function article()
    {
        $user = Auth::user();
        return view('article', [
            'article' => $article,
            'user' => $user,
        ]);
    }
    public function articleSearch(Request $request)
    {
        $user = Auth::user();
        // ユーザー一覧をページネートで取得
        $articles = Article::paginate(20);
        // 検索フォームで入力された値を取得する
        $search = $request->input('searchword');
        // クエリビルダ
        $query = Article::query();
        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('title', 'like', '%' . $value . '%')->orWhere('text', 'like', '%' . $value . '%');
            }
            // 上記で取得した$queryをページネートにし、変数$usersに代入
        }
        // ビューにusersとsearchを変数として渡す

        $select = $request->search;

        // セレクトボックスの値に応じてソート
        switch ($select) {
            case '1':
                $articles = $query->latest()->paginate(20);
                break;
            case '2':
                $articles = $query->orderBy('created_at', 'desc')->paginate(20);
                break;
            case '3':
                $articles = $query->orderBy('created_at', 'asc')->paginate(20);
                break;
            case '4':
                $articles = $query->orderBy('interest', 'desc')->paginate(20);
                break;
            case '5':
                $articles = $query->orderBy('interest', 'asc')->paginate(20);
                break;
            case '6':
                $articles = $query->orderBy('repeat', 'desc')->paginate(20);
                break;
            case '7':
                $articles = $query->orderBy('repeat', 'asc')->paginate(20);
                break;
            case '8':
                $articles = $query->orderBy('study', 'desc')->paginate(20);
                break;
            case '9':
                $articles = $query->orderBy('study', 'asc')->paginate(20);
                break;
            case '10':
                $articles = $query->orderBy('answer', 'desc')->paginate(20);
                break;
            case '11':
                $articles = $query->orderBy('answer', 'asc')->paginate(20);
                break;
            case '12':
                $articles = $query->orderBy('reaction', 'desc')->paginate(20);
                break;
            case '13':
                $articles = $query->orderBy('reaction', 'asc')->paginate(20);
                break;
            default:
                // デフォルトはID順
                $articles = $query->paginate(20);
                break;
        }
        return view('article_search')
            ->with([
                'articles' => $articles,
                'search' => $search,
                'user' => $user,
                'select' => $select,
            ]);
    }
    public function newArticle(Request $request)
    {

        return view('article/create_conf');
    }
    public function topics(Request $request)
    {
        $user = Auth::user();
        return view('topics', [
            'article' => $article,
            'user' => $user,
        ]);
    }
    public function owner()
    {
        $user = Auth::user();
        $topics = Topic::get();

        if (isset($topics)) {
            $topic = $topics;
        } else {
            $topic = '';
        }
        return view("ownerpage", [
            'topics' => $topic,
            'user' => $user,
        ]);
    }
    public function articleList(Request $request)
    {
        $user = Auth::user();
        // ユーザー一覧をページネートで取得
        $articles = Article::paginate(20);
        // 検索フォームで入力された値を取得する
        $search = $request->input('searchword');
        // クエリビルダ
        $query = Article::query();
        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('title', 'like', '%' . $value . '%')->orWhere('text', 'like', '%' . $value . '%');
            }
            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $articles = $query->paginate(20);
        }

        $user = Auth::user();
        // セレクトボックスで選択した値
        $select = $request->sort;

        // セレクトボックスの値に応じてソート
        switch ($select) {
            case '1':
                //「指定なし」はID順
                $items
                    = $articles->get();
                break;
            case '2':
                // 「タイトルが低い順」でソート
                $items = $articles->orderBy('created_at', 'asc')->get();
                break;
            case '3':
                // 「タイトルが高い順」でソート
                $items
                    = $articles->orderBy('created_at', 'desc')->get();
                break;
            default:
                // デフォルトはID順
                $items
                    = $articles->get();
                break;
        }
        // ビューにusersとsearchを変数として渡す
        return view('article.list')
            ->with([
                'articles' => $articles,
                'search' => $search,
                'user' => $user,
                'select' => $select,
            ]);
    }
}
