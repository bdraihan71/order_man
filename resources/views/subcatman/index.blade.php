@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Subcategory Managers
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            User Name
                        </div>
                        <div class="col-md-6">
                            Subcategories Managed
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="row mb-3">
                            <div class="col-md-4">
                                {{ $user->name }}
                            </div>
                            <div class="col-md-6">
                                {{ count($user->manages) }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('subcatman.show', ['user' => $user->id]) }}" class="btn btn-primary w-100">Show</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection