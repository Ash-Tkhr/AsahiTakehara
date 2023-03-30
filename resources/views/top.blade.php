<html lang="ja">
@extends('layout')

@section('content')

<main role="main">
  @can ('admin_only')
  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Astreet</h1>
      <p class="lead text-muted">スポーツ、格闘技、武道、トレーニングなどの様々な情報が交わるポータルサイト</p>
    </div>
  </section>

  <!-- 以下、テスト用のあれこれ -->
  <div class="d-flex col-md-8 row justify-content-around">
    <div>
      <button class="btn btn-primary" type="submit" href="{{ route('owner') }}">
        <span class="search">
          トピックス一覧
        </span>
      </button>
    </div>
    <div>
      <button class="btn btn-primary" type="submit" href="{{ route('topic.create') }}">
        <span class="search">
          トピックス投稿
        </span>
      </button>
    </div>
  </div>
  <br>

  <!-- 以上、テスト用のあれこれ -->

  <div class="album py-5 bg-light">
    <div class="container">
      <h3>新着トピックス</h3>
      <p>最新のスポーツニュースやトピックスをお届けします</p>
      <div class="row justify-content-around">
        @foreach($topics as $topic)
        <div class="col-md-4 mb-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ route('topic.show',$topic->id) }}" class=" mb-4">
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($topic->image)}}" data-holder-rendered="true">
              <h5 class="card-text">　{{ $topic->title }}</h5>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @else

  <section class="jumbotron text-center">
    <div class="container">
      <br>
      <h1 class="jumbotron-heading">Astreet</h1>
      <p class="lead text-muted">スポーツ、格闘技、武道、トレーニングなどの様々な情報が交わるポータルサイト</p>
    </div>
  </section>

  <!-- 以下、テスト用のあれこれ -->
  <div class="album py-5">
    <div class="container">
      <h3>新着トピックス</h3>
      <p>最新のスポーツニュースやトピックスをお届けします</p>
      <div class="row justify-content-around">
        @foreach($topics as $topic)
        <div class="col-md-4 mb-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ route('topic.show',$topic->id) }}" class=" mb-4">
              <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($topic->image)}}" data-holder-rendered="true">
              <h5 class="card-text">　{{ $topic->title }}</h5>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </br>
  @endcan
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
@endsection