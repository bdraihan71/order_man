@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-transparent my-3">
                <div class="card-header lead">Vendor
                    <a href="{{route('vendors.create')}}" class="btn btn-outline-info float-right">Create Vendor</a>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Company Name</td>
                            <td>Category</td>
                            <td>Owner Name</td>
                            <td>Number</td>
                            <td>Address</td>
                            <td>Actions</td>
                        </tr>
                        @foreach ($vendors as $vendor)
                        <tr>
                            <td>{{ $vendor->company_name }}</td>
                            @if($vendor->category)
                            <td>{{ $vendor->category->name }}</td>
                            @else
                            <td class="red">Assign a category</td>
                            @endif
                            <td>{{ $vendor->owner_name }}</td>
                            <td>{{ $vendor->owner_contact_number_primary }}</td>
                            <td>{{ $vendor->office_address }}</td>
                            <td>
                            <a class="btn btn-primary my-1" href="{{route('vendors.show', ['vendor' => $vendor->id])}}">View</a>
                                <a class="btn btn-info my-1" href="{{route('vendors.edit', ['vendor' => $vendor->id])}}">Edit</a>
                                <form action="{{ route('vendors.destroy', $vendor->id)}}" onclick="return confirm('Are you sure?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button  class="btn btn-danger my-1" type="submit">delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection