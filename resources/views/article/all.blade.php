@extends('layout')

@section('content')
<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <div class="col-md-12 px-0">
        <br>
        <br>
        <br>
        <br>
        <h1 class="display-4 font-italic"></h1>
        <img src="{{asset($article->image)}}" style="height: 300px; width: auto; display: block;" alt="Thumbnail [100%x300]" class="img-fluid height: 300px; width: auto;" />
      </div>
      <hr>
      <br>
      <div class="blog-post">
        <h2 class="blog-post-title font-italic">{{$article['title']}}</h2>
        <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
          @if(isset($maincategory))
          <input class="form-control mr-sm-2" type="hidden" placeholder="検索" aria-label="Search" name="searchword" value='{{$maincategory->name}}'>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            {{$maincategory->name}}
            @else
            <!-- 表示なし -->
            @endif
          </button>
        </form>
        <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
          @if(isset($subcategory))
          <input class="form-control mr-sm-2" type="hidden" placeholder="検索" aria-label="Search" name="searchword" value='{{$subcategory->name}}'>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            {{$subcategory->name}}
            @else
            <!-- 表示なし -->
            @endif
          </button>
          <br>
        </form>
        <br>
        <p>{!!nl2br(e($article['text']))!!}</p>
      </div>
      <br>
      <br>
      <br>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <br>
      <br>
      <br>
      <br>
      <div class="container d-flex  align-items-center">
        <div class="col-lg-4">
          <br>
          <img class="rounded-circle" src="{{asset($article->User->image)}}" alt="Generic placeholder image" width="100" height="100">
        </div>
        <div class="col-lg-4 text-nowrap">
          <br>
          <h5>{{$article->User->name}}</h5>
        </div>
      </div>
      <p>{{$article->User->profile}}</p>

      <div class="p-3">
        <h4 class="font-italic"></h4>
        @auth
        @if (!$article->bookmarked(Auth::user()))
        <span class="bookmarks">
          <button type="button" class="btn btn-outline-dark mb-12  bookmark-toggle " data-article-id="{{ $article->id }}" data-toggle="modal" data-target="#testModal">
            <i class="fa-regular fa-star fa-lg ">
              ブックマーク</i></button>
          <!-- <span class="bookmark-counter">{{$article->bookmark}}</span> -->
        </span>
        @else
        <div class="row mb-5">
          <span class="bookmarks">
            <button type="button" class="btn btn-outline-warning mb-12 bookmarked bookmark-toggle" data-article-id="{{ $article->id }}" data-toggle="modal" data-target="#testModal">
              <i class="fa-regular fa-star fa-lg ">ブックマーク</i></button>
            <!-- <span class="bookmark-counter">{{$article->bookmark}}</span> -->
          </span>
          @endif

          @endauth

          <br>
          <br>
          <br>
          <div class="ml-3">
            <form action="{{ route('send.comment',['comment'=>$article['id']])}}" method="post">
              @csrf
              コメント
              <div class="ml-3 d-flex">
                <div>
                  <input type='text' class='form-control' name='comment' id='comment' value="" />
                  <input type='hidden' class='form-control' name='id' id='id' value="{{$article['id']}}" />
                </div>
                <div>
                  <button type='submit' class='btn btn-primary'>送信</button>
                </div>
              </div>
            </form>
          </div>
          @if($errors->any())
          <div class='alert alert-danger'>
            <ul>
              @foreach($errors->all() as $message)
              <li>{{$message}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div>
            @foreach($comments as $comment)
            {{$comment['text']}}
            <br>
            <div class="mb-12  text-right">
              <small>by　{{$comment['name']}}</small>
              <br>
              <small>　　　　{{$comment['created_at']}}</small><br>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
  Holder.addTheme('thumb', {
    bg: '#55595c',
    fg: '#eceeef',
    text: 'Thumbnail'
  });
</script>

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


<svg xmlns="http://www.w3.org/2000/svg" width="400" height="500" viewBox="0 0 400 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
  <defs>
    <style type="text/css"></style>
  </defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
</svg>
</body>

</html>

<style>
  /* .bookmarks::before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f001";
  } */
  .bookmarked {
    color: yellow;
    border-color: yellow;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@endsection