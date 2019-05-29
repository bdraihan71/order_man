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
    <nav class="navbar navbar-light nav-bg m-3">
      <a class="navbar-brand text-info display-1" href="/">Order Man</a>
      @auth
      <div class="float-right display-inline">
          <a class="text-muted nav-link text-dark float-right" href="/customers">Customer</a>
          <a class="text-muted nav-link text-dark float-right" href="/vendors">Vendor</a>
          <a class="text-muted nav-link text-dark float-right" href="/orders">Order</a>
          <a class="text-muted nav-link text-dark float-right" href="/services">Service</a>
          <a class="text-muted nav-link text-dark float-right" href="/users">User</a>
          <a class="text-muted nav-link text-dark float-right" href="/categories">Category</a>
          <a class="text-muted nav-link text-dark float-right" href="/subcategories">Subcategory</a>
          <a class="text-muted nav-link text-dark float-right" href="/locations">Location</a>
          <a class="text-muted nav-link text-dark float-right" href="/reference">Reference</a>
      </div>
      @endauth
    </nav>
    <hr>
    <div class="container-fluid">
        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button type="submit" class="text-muted nav-link text-dark float-right">Logout</button>
        </form>
      @include('layouts.messages')
      @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.4.0.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>
