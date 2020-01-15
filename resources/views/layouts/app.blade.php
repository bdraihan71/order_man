<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="/css/all.min.css">

    <!-- App CSS -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" />

    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Order Man</title>
  </head>

  <body>
      @auth
      <nav class="navbar navbar-expand-lg navbar-light nav-bg m-3">
          <a class="navbar-brand text-info display-1" href="/home">Order Man</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item my-auto">
                    <a class="nav-link" href="{{ route('create-order') }}"><i class="fas fa-plus-circle fa-2x"></i></a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/orders">Order</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/customers">Customer</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/vendors">Vendor</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/services">Service</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/users">User</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/categories">Category</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/subcategories">Subcategory</a>
                </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/locations">Location</a>
                </li>
                <li class="nav-item my-auto">
                  <a class="nav-link" href="/channels">Channel</a>
              </li>
                <li class="nav-item my-auto">
                    <a class="nav-link" href="/reference">Reference</a>
                </li>
                <li class="nav-item my-auto">
                  <a class="nav-link">
                    <form method="POST" action="{{route('logout')}}">
                      @csrf
                      <button class="btn btn-outline-info" type="submit">Logout</button>
                    </form>
                  </a>
                </li>
              </ul>
            </div>
        </nav>
    <hr>
    @endauth
    <div class="container-fluid">
        
      @include('layouts.messages')
      @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.4.0.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145375324-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-145375324-2');
    </script>
    @yield('scripts')
    
  </body>
</html>
