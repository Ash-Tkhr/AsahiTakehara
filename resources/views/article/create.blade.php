<html lang="ja"><head>
    <title>Astreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="starter-template.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67fc42cf07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/67fc42cf07.css" crossorigin="anonymous">
    <meta charset="UTF-8">
  </head>


  <body>
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="{{ route('article.search')}}" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="検索" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
        <span class="search">
        <i class="fa-regular fa-magnifying-glass"></i>
        </span>
      </button>
    </form>
  </div>
</nav>


<main role="main" class="container">
@section('title', '新規投稿')

@section('content')
  <div class="starter-template">
    <h1>Bootstrap starter template</h1>
  </div>
  <section>
  <div id="contact_box">
    <h2><b>記事投稿</b></h2>
    <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
    @csrf
      <dl>
        <dt><label for="title"></label><span class="required">タイトル</span></dt>
        <dd><input type="text" name="title" id="title" placeholder="" value=""></dd>
        
        <dt><label for="category">カテゴリー</label><span class="required"></span></dt>
        <dd><select name='maincategory' class='maincategory' placeholder=メインカテゴリー'>
          <option  hidden></option>
                                @foreach($maincategories as $maincategory)
                                <option value="{{$maincategory['id']}}">{{ $maincategory['name'] }}</option>
                                @endforeach
                            </select></dd>
        <dd><select name='subcategory' class='subcategory' placeholder='サブカテゴリー'  >
                                <option hidden></option>
                                @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory['id']}}">{{ $subcategory['name'] }}</option>
                                @endforeach
                            </select></dd>
        <dd><input type="hidden" name="topics_id" id="topics_id" placeholder=""value=""></dd>
 
        <dt><label for="image">画像アップロード</label></dt>       
        <dd><input type="file" name="image" id="image" value=""></dd>
        <dt><label for="text">本文<span class="text"></span></label></dt>
        <dd><textarea name="text" id="text"></textarea></dd>
        <dd><button type="submit" class="send" name="submit">投稿内容確認</button></dd>
      </dl>
    </form>
  </div>
</section>
</main><!-- /.container -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script><script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
  

</body></html>

