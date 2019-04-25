@extends('layouts.app')

@section('content')

<!-- @include('dashboard.partials.navbar') -->

<div class="container-fluid">
  <div class="row">

    @include('dashboard.partials.sidenav')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      @yield('dashboard_content')
  </div>
</div>
@endsection
