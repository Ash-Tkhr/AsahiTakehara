@extends('layout')

@section('content')
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Astreet</h1>
      <p class="lead text-muted">スポーツ、格闘技、武道、トレーニングなどの様々な情報が交わるポータルサイト</p>
    </div>
  </section>

  <!-- 以下、テスト用のあれこれ -->
  @csrf
  <div class="center-block ">
  <h1 class=" text-center">「{{$search}}」の検索結果</h1>
                <div class="form-inline my-2 my-lg-0 d-flex ">
                  <div>
                    <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="検索" aria-label="Search" name="searchword">
                    </div>
                    <div>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            <span class="search">
                            <i class="fas fa-search pr-1"></i>
                            </span>
                        </button>
                    </form>
                    </div>
                </div>
                <br><br><br>
  <!-- <form action="{{route('article.list')}}" id="form">
        <select name="price" id="price">
            <option value="1" >指定なし</option>
            <option value="2" >投稿が古い順</option>
            <option value="3" >投稿が新しい順</option>
        </select>
    </form> -->
  @foreach($articles as $article)
<div class="col-md-4">
      <a href="{{ route('article.show',$article->id) }}">
          <div class="card mb-4 shadow-sm">
            <img class="card-img-top" 
            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" 
            alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" 
            src="{{asset($article->image)}}" data-holder-rendered="true">
            <div class="card-body">
              <p class="card-text">{{ $article->title }}</p>
              <div class="card-body d-flex justify-content-between">
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{$user->name}}</small>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">{{$article->created_at}}</small>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted"></small>
              </div>
              </div>
            </div>
          </div>
          </a>
        </div>
    </br>
@endforeach 

  <!-- 以上、テスト用のあれこれ -->

  <div class="album py-5 bg-light">
    <div class="container">
</div>
</div>
</div>
  

</main>

<footer class="text-muted">
  <!-- <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
  </div> -->
</footer>
<script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script><script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
  

<svg xmlns="http://www.w3.org/2000/svg" width="288" height="225" viewBox="0 0 288 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="14" style="font-weight:bold;font-size:14pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
</html>
@endsection