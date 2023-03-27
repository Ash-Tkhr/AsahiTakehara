@extends('layout')

@section('content')
<main role="main" class="container">
  <div class="starter-template">
    <h1>Bootstrap starter template</h1>
  </div>
  <section>
  <div id="contact_box">
    <h2><b>ユーザー情報編集</b></h2>
    <form action="{{route('mypage.update',['mypage'=>$user['id']])}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf
    @if($errors->any())
                        <div class='alert alert-danger'>
                          <ul>
                            @foreach($errors->all() as $message)
                            <li>{{$message}}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
      <dl>
        <dt><label for="title"></label><span class="required">ユーザー名</span></dt>
        <dd><input type="text" name="name" id="name" class="form-control"placeholder="" value="{{$user['name']}}"></dd>
        <dt><label for="image">アイコン画像</label></dt>       
        <dd><input type="file" name="image" id="image" value="{{asset($user->image)}}"></dd>
        <dt><label for="profile">自己紹介<span class="profile"></span></label></dt>
        <dd><textarea name="profile" id="profile">{{$user['profile']}}</textarea></dd>

        <dd><button type="submit" class="send btn btn-sm btn-outline-primary" name="submit">更新</button></dd>
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
