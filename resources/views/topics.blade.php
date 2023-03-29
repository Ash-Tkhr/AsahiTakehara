@extends('layout')

@section('content')
<main role="main" class="container center-block">
  <br>
  <br> <br>
  <br>
  <div class="col-md-6 px-0">
    <h1 class="display-4 font-italic"></h1>
    <img src="{{asset($topics->image)}}" style="height: 300px; width: auto; display: block;" alt="Thumbnail [100%x300]" class="img-fluid height: 300px; width: auto;" />
  </div>
  <hr>
  <br>
  <br>

  <main role="main" class="container">
    <div class="row">
      <div class="col-md-8 blog-main">
        <div class="blog-post">
          <h2 class="blog-post-title">{{$topics['title']}}</h2>
          <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
            <input class="form-control mr-sm-2" type="hidden" placeholder="検索" aria-label="Search" name="searchword" value='{{$maincategory}}'>
            @if(isset($maincategory['name']))
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              {{$maincategory['name']}}
              @else
              <!-- 表示なし -->
              @endif
            </button>
          </form>
          <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
            <input class="form-control mr-sm-2" type="hidden" placeholder="検索" aria-label="Search" name="searchword" value='{{$subcategory}}'>
            @if(isset($subcategory['name']))
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              {{$subcategory['name']}}
              @else
              <!-- 表示なし -->
              @endif
            </button>
            <br>
          </form>
          <br>
          <p>{!!nl2br(e($topics['text']))!!}</p>
        </div>
        <br>
        <br>
        <br>


      </div><!-- /.blog-main -->
      <aside class="col-md-4 blog-sidebar">
        <h2 class="col-md-12 mb-2">その他のトピックス</h2>
        <div class="row justify-content-around">
          @foreach($others as $other)
          <div class="col-md-12 mb-2">
            <div class="card mb-4 shadow-sm">
              <a href="{{ route('topic.show',$other->id) }}">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" style="height: 225px; width: 100%; display: block;" src="{{asset($other->image)}}" data-holder-rendered="true">
                <h5 class="card-text">　{{ $other->title }}</h5>
              </a>
            </div>
          </div>
          @endforeach
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


  <svg xmlns="http://www.w3.org/2000/svg" width="200" height="250" viewBox="0 0 200 250" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;">
    <defs>
      <style type="text/css"></style>
    </defs><text x="0" y="13" style="font-weight:bold;font-size:13pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text>
  </svg>
  </body>

  </html>
  @endsection

  <style>
    /* .bookmarks::before {
  font-family: "Font Awesome 5 Free";
  font-weight: 900;
  content: "\f001";
} */
    .bookmarked {
      color: yellow;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>