@extends('layout')

@section('content')
<div class=”row”>

    <div class=”col-8″>
        <main role="main">

            <section class="jumbotron text-center">
                <div class="container d-flex">
                    <div class="col-lg-4">
                        <br>
                        <img class="rounded-circle" src="{{asset($user->image)}}" alt="Generic placeholder image" width="140" height="140">
                    </div>
                    <div class="col-lg-4">
                        <br>
                        <h2>{{$user['name']}}</h2>
                        <p>{{$user['profile']}}</p>
                        <p><a class="btn btn-secondary" href="{{ route('mypage.edit',['mypage'=>$user['id']])}}" role="button">
                                ユーザー情報を編集</a></p>
                    </div>
                </div>
            </section>

            <div class="album py-5 bg-light">
                <div class="container">
                    @if (session('flash_message'))
                    <div class="flash_message">
                        {{ session('flash_message') }}
                    </div>
                    @endif
                    <div class="row">
                        <h2>投稿記事一覧</h2>
                        @if(isset($articles))
                        @foreach($articles as $article)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{ route('article.show',$article->id) }}">
                                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($article->image)}}" data-holder-rendered="true">
                                    <h4 class="card-text">　{{ $article->title }}</h4>
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center text-dark">
                                        <p><a class="btn btn-outline-dark my-2 my-sm-0" href="{{ route('article.edit',['article'=>$article['id']])}}" role="button">
                                                <input class="btn btn-outline-dark my-2 my-sm-0" value='$article->id' type="hidden">
                                                編集
                                            </a></p>
                                        <form action="{{route('article.destroy',$article->id)}}" method="POST">
                                            <input class="btn btn-outline-dark my-2 my-sm-0" value='削除' type="submit" data-toggle="modal" data-target="#testModal" onclick='return confirm("削除しますか？");'>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </br>
                        @endforeach
                        @else
                        <h2>まだ記事が投稿されていません</h2>
                        @endif
                        <aside class="col-md-4 blog-sidebar">
                            <h2>ブックマーク一覧</h2>
                            @foreach($bookmarks as $bookmark)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a href="{{ route('article.show',$article->id) }}">
                                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($article->image)}}" data-holder-rendered="true">
                                        <h4 class="card-text">　{{ $bookmark->title }}</h4>
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center text-dark">
                                            <form action="{{route('article.destroy',$article->id)}}" method="POST">
                                                <input class="btn btn-outline-dark my-2 my-sm-0" value='削除' type="submit" data-toggle="modal" data-target="#testModal" onclick='return confirm("削除しますか？");'>
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </aside>
                        <!-- 削除用モーダル -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>投稿削除</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>この投稿を削除しますか？</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                        <button type="button" class="btn btn-danger">削除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</style>
<svg xmlns="http://www.w3.org/2000/svg" width="400" height="500" viewBox="0 0 400 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
        <style type="text/css"></style>
    </defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
</svg>