@extends('layout')

@section('content')
@can ('admin_only')
<main role="main">
    @can ('admin_only')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Astreet</h1>
            <p class="lead text-muted">スポーツ、格闘技、武道、トレーニングなどの様々な情報が交わるポータルサイト</p>
        </div>
    </section>

    <!-- 以下、テスト用のあれこれ -->
    <p>トピックを<a href="{{ route('topic.create') }}">投稿</a></p>

    <!-- 以上、テスト用のあれこれ -->

    <div class="container">
        <div class="d-flex flex-wrap">
            @foreach($topics as $topic)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ route('topic.show',$topic->id) }}">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($topic->image)}}" data-holder-rendered="true">
                        <h4 class="card-text">　{{ $topic->title }}</h4>
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center text-dark">
                            <p><a class="btn btn-outline-dark my-2 my-sm-0" href="{{ route('topic.edit',['topic'=>$topic['id']])}}" role="button">
                                    <input class="btn btn-outline-dark my-2 my-sm-0" value='$topic->id' type="hidden">
                                    編集
                                </a></p>
                            <form action="{{route('topic.destroy',$topic->id)}}" method="POST">
                                <input class="btn btn-outline-dark my-2 my-sm-0" value='削除' type="submit" data-toggle="modal" data-target="#testModal" onclick='return confirm("削除しますか？");'>
                                @method('delete')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </br>
    @endcan
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>トピックス削除</h4>
                </div>
                <div class="modal-body">
                    <p>このトピックスを削除しますか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-danger">削除</button>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-muted">
</footer>
<script src="../../assets/js/vendor/holder.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="288" height="225" viewBox="0 0 288 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
        <style type="text/css"></style>
    </defs><text x="0" y="14" style="font-weight:bold;font-size:14pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
</svg></body>

</html>
@endcan
@endsection