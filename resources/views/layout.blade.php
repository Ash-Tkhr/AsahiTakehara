@yield('stylesheet')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Astreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="jumbotron.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/67fc42cf07.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/67fc42cf07.css" crossorigin="anonymous">
    <script src="{{ asset('js/bookmark.js') }}" defer></script>
    <link href="album.css" rel="stylesheet">


<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.6">

<meta name="docsearch:language" content="en">
<meta name="docsearch:version" content="4.3">
<!-- Bootstrap core CSS -->
<style class="anchorjs"></style><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- Documentation extras -->
<link href="/docs/4.3/assets/css/docs.min.css" rel="stylesheet">
<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.3/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/favicon.ico">
<meta name="msapplication-config" content="/docs/4.3/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


<script async="" src="https://d.line-scdn.net/n/_4/torimochi.js/public/v1/release/dev/min/torimochi.js"></script><script async="" src="//www.google-analytics.com/analytics.js"></script><script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
      m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
</script>

<script>
  (function (g, d) {
    var v = 'release/dev';
    g._trmq = [];
    g._trm = function () {
      g._trmq.push(arguments)
    };
    g.onerror = function (m, f, l, c) {
      g._trm('send', 'exception', m, f, l, c)
    };
    var h = location.protocol === 'https:' ? 'https://d.line-scdn.net' : 'http://d.line-cdn.net';
    var s = d.createElement('script');
    s.async = 1;
    s.src = h + '/n/_4/torimochi.js/public/v1/' + v + '/min/torimochi.js';
    var t = d.getElementsByTagName('script')[0];
    t.parentNode.insertBefore(s, t);
  })(window, document);
</script>

<script>
  ! function (a, b) {
    var c = !!b.callWithGaFunc,
      d = !!b.overwriteGaFunc,
      e = a.ga,
      f = function () {
        var b = Array.prototype.concat.apply([], arguments),
          g = JSON.parse(JSON.stringify(b)),
          i = g.length - 1;
        g.length > 0 && "[object Object]" === Object.prototype.toString.call(g[i]);
        c && (d ? e !== f && e.apply(a, g) : a.ga !== f && a.ga.apply(a, g)), a._trm.apply(a, b)
      };
    a._tg = f, d && Object.defineProperty(a, "ga", {
      get: function () {
        return f
      },
      set: function (a) {
        a.hasOwnProperty("loaded") && (f.loaded = a.loaded), e = a
      },
      enumerable: !0,
      configurable: !0
    })
  }(window, {
    callWithGaFunc: true,
    overwriteGaFunc: true
  });
  ga('create', 'UA-79687685-7', 'auto');
  ga('send', 'pageview');
  _trm('enable', {
    productKey: 'bootstrap'
  });
</script>

  <title>サンプル · Bootstrap</title>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark d-flex">
            <div class="container">
                <a href="{{ route('article.index')}}" class="navbar-brand d-flex ">
                    <strong>Astreet</strong>
                </a>
            </div> 
            <div class="navbar-nav  d-flex">
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
                <div>
                    @if(Auth::check())

                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2" 
                        id="bd-versions" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                            <a class="dropdown-item" href="{{ route('mypage.show',['mypage'=>$user['id']])}}" >
                            マイページ
                            </a>
                            <a class="dropdown-item" href="{{ route('article.create')}}" >
                            新規記事作成
                            </a>
                            <a class="dropdown-item " href="#" id="logout" class="my-navbar-item">ログアウト</a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <script>
                                document.getElementById('logout').addEventListener('click',function(event){
                                    event.preventDefault();
                                    document.getElementById('logout-form').submit();
                                });
                            </script>
                        </div>
                    </li>
                </div>
                <div>
                    @else
                    <div class="nav-nav  d-flex"> 
                        <div>
                            <a class="my-navbar-item" href="{{route('login')}}">ログイン</a>
                        </div>
                        /
                        <div>                  
                            <a class="my-navbar-item" href="{{route('register')}}">新規登録</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                                        <input type="hidden" name="_token" value="fDsdzQ36FIlJdmp18RcPYpnpsOiT8bReHOPZmYhD">                                    </form>
                                </div>
                            </li>
                                            </ul>
                    </div>
                </div> -->
            </div>
        </nav>
    </div>
<style>
    .my-navbar-item{
        white-space: nowrap;
        font-size:80%;
    }
</style>
        @yield('content')
</body>
</html>

