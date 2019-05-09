@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3>Managed by {{ $user->name }}</h3>
                </div>
            </div>
        
            <form action="{{ route('subcatman.add', ['user' => $user->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="user" value="{{ $user->id }}">
                
                <div class="row mb-3">
                    <div class="col-md-8">
                        <select name="subcat" class="form-control">
                            <option value="">Select Subcategory to add to list</option>
                            @foreach ($subcats as $subcat)
                                <option value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success w-100" type="submit">Add to list</button>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">
                    Subcategories
                </div>
                <div class="card-body">
                    @foreach ($user->manages as $subcat)
                        <div class="row mb-2">
                            <div class="col-md-8">{{ $subcat->name }}</div>
                            <div class="col-md-4">
                                <a href="{{ route('subcatman.remove', ['user' => $user->id,'subcat' => $subcat->id]) }}" class="float-right ml-3"><i class="fa fas fa-trash"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection