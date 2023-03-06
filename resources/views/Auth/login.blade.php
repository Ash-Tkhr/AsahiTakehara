@extends('layout')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ログイン</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
        </div>
      </div>
    </div>
  </div>
@endsection




<!-- <html lang="ja">
<head>
    <title>Astreetp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <a id="skippy" class="sr-only sr-only-focusable" href="#content">
  <div class="container">
    <span class="skiplink-text">Skip to main content</span>
  </div>
</a> -->
<!-- 以下、ヘッダーに付ける予定のlayoutの一部 -->
<!-- <div class="my-navbar-control">
                @if(Auth::check())
                <span class="my-navbar-item">{{Auth::user()->name}}</span>
                /
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
                </form>
                <script>
                    document.getElementById('logout').addEventListener('click',function(event){
                        event.preventDefault();
                        document.getElementById('logout-form').submit();
                    });
                </script>
                @else
                <a class="may-navbar-item" href="{{route('login')}}">ログイン</a>
                /
                <a class="my-navbar-item" href="{{route('register')}}">会員情報</a>
                @endif
            </div> -->
<!-- 以上、ヘッダーに付ける予定のlayoutの一部 -->

    <!-- <form class="form-signin" action="{{ route('login') }}" method="POST">
    @csrf
  <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <label for="inputEmail" class="sr-only">メールアドレスを入力してください</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
  <label for="inputPassword" class="sr-only">パスワードを入力してください</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
  <div class="checkbox mb-3">
      <a> パスワードをお忘れの方はこちら</a>
  </div>
  <button class="login-button" type="submit">ログイン</button>
</form> -->
<style>
  .login-button {
    font-weight: 400!important;
    cursor: pointer;
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    vertical-align: middle;
    display: block;
    width: 10%;
    margin: 0 auto;
}
<!-- </style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script><script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
<script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
<script src="/docs/4.3/assets/js/src/application.js"></script>
<script src="/docs/4.3/assets/js/src/search.js"></script>
<script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
  

</body></html> -->