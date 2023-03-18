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
    public function index(Request $request) {
        return view('top',[

        ]);
    }
    public function article() {
        return view('article',[
            'article'=>$article,
        ]);
    }
    public function articleSearch(Request $request) {
        // ユーザー一覧をページネートで取得
        $articles = Article::paginate(20);
        // 検索フォームで入力された値を取得する
        $search=$request->input('searchword');
        // クエリビルダ
        $query = Article::query();
       // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }
            // 上記で取得した$queryをページネートにし、変数$usersに代入
            $articles = $query->paginate(20);
        }
        // ビューにusersとsearchを変数として渡す
        return view('article_search')
            ->with([
                'articles' => $articles,
                'search' => $search,
            ]);
    }
    public function newArticle(Request $request) {
       
        return view('article/create_conf');
    }
}
?>
