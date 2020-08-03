@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-transparent my-3">
        <div class="card-header">Vendor</div>
        <div class="card-body">
          <form method="post" action="{{route('vendors.store')}}">
            @csrf
            <label class="star">Company Name</label>
            <input class="form-control bg-transparent" type="text" name="company_name" value="{{old('company_name')}}"></input>
            <br>

            <label>Category</label>
            <select class="form-control bg-transparent" name="category_id">
              @foreach($categories as $category)
                @if(old('category_id') == $category->id)
                  <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
              @endforeach
            </select>
            <br>

            <label class="star">Office Address</label>
            <input class="form-control bg-transparent" type="text" name="office_address" value="{{old('office_address')}}"></input>
            <br>

            <label>Trade License Number</label>
            <input class="form-control bg-transparent" type="text" name="trade_license_number" value="{{old('trade_license_number')}}"></input>
            <br>

            <label>Owner Name</label>
            <input class="form-control bg-transparent" type="text" name="owner_name" value="{{old('owner_name')}}"></input>
            <br>

            <label>Nid Number</label>
            <input class="form-control bg-transparent" type="text" name="owner_nid_number" value="{{old('owner_nid_number')}}"></input>
            <br>

            <label>Email</label>
            <input class="form-control bg-transparent" type="email" name="email" value="{{old('email')}}"></input>
            <br>

            <label>Current Address</label>
            <textarea class="form-control bg-transparent" id="exampleFormControlTextarea1" name="owner_current_house_address" rows="3">{{old('owner_current_house_address')}}</textarea>
            <br>

            <label class="star">Contact Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="owner_contact_number_primary" value="{{old('owner_contact_number_primary')}}"></input>
            <br>

            <label>Contact Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="owner_contact_number_secondary" value="{{old('owner_contact_number_secondary')}}"></input>
            <br>

            <label class="star">Primary Contact person Position</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_position" value="{{old('primary_contact_person_position')}}"></input>
            <br>

            <label class="star">Primary Contact Person Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_number_primary" value="{{old('primary_contact_person_number_primary')}}"></input>
            <br>

            <label>Primary Contact Person Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_number_secondary" value="{{old('primary_contact_person_number_secondary')}}"></input>
            <br>

            <label>Secondary Contact Person Position</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_position" value="{{old('secondary_contact_person_position')}}"></input>
            <br>

            <label>Secondary Contact Person Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_number_primary" value="{{old('secondary_contact_person_number_primary')}}"></input>
            <br>

            <label>Secondary Contact Person Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_number_secondary" value="{{old('secondary_contact_person_number_secondary')}}"></input>
            <br>

            <label>Documents Google Drive Link</label>
            <input class="form-control bg-transparent" type="text" name="documents_google_drive_link" value="{{old('documents_google_drive_link')}}"></input>
            <br>

            <label>Overall Review</label>
            <input class="form-control bg-transparent" type="number" name="overall_review" value="{{old('overall_review')}}"></input>
            <br>

            <label>Review By Service</label>
            <input class="form-control bg-transparent" type="number" name="review_by_service" value="{{old('review_by_service')}}"></input>
          

            <input class="form-control bg-transparent" type="hidden" name="added_by" value="{{Auth::user()->id}}"></input>
            <br>

            <label>Add Note</label>
            <input class="form-control bg-transparent" type="text" name="add_note" value="{{old('add_note')}}"></input>
            <br>

            <label>Reviewed By</label>
            <select class="form-control bg-transparent" name="reviewed_by">
              @foreach($users as $user)
                @if(old('reviewed_by') == $user->id)
                  <option selected value="{{$user->id}}">{{$user->name}}</option>
                @else
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
              @endforeach
            </select>
            <br>

            <label>Review Note</label>
            <input class="form-control bg-transparent" type="text" name="review_note" value="{{old('review_note')}}"></input>
            <br>

            <label class="star">Margin</label>
            <input class="form-control bg-transparent" type="number" name="margin" value="{{old('margin')}}"></input>
            <br>


            <button class="btn btn-info" type="submit">Create Vendor</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection