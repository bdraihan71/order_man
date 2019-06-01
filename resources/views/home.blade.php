@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mt-5">
                <h1 class="display-4">Dashboard</h1>

                <div class="lead">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Role: {{Auth::user()->role->display_name}}
                </div>
            
        </div>
    </div>
</div>
@endsection
