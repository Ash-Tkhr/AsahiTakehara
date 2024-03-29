@extends('layout')

@section('content')
<main role="main" class="container">
@section('title', '新規投稿')

@section('content')
  <div class="starter-template">
    <h1>Bootstrap starter template</h1>
  </div>
  <section>
  <div id="contact_box">
    <h2><b>記事投稿</b></h2>
            @if($errors->any())
    <div class='alert alert-danger'>
      <ul>
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
      </ul>
    </div>
      @endif
    <form action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
    @csrf
      <dl>
        <dt><label for="title"></label><span class="required">タイトル</span></dt>
        <dd><input type="text" name="title" class="form-control" id="title" placeholder="" value=""></dd>
        
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
        <dd><textarea name="text" id="exampleFormControlTextarea1" class="form-control" rows="10"></textarea></dd>

        <dd><button type="submit" class="send btn btn-sm btn-outline-primary" name="submit">投稿</button></dd>
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
@endsection
