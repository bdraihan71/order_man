@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Vendor</div>
        <div class="card-body">
          <form method="post" action="{{route('vendors.store')}}">
            @csrf
            <label>Company Name</label>
            <input class="form-control" type="text" name="company_name" value="{{old('company_name')}}"></input>
            <br>

            <label>Office Address</label>
            <input class="form-control" type="text" name="office_address" value="{{old('office_address')}}"></input>
            <br>

            <label>Trade License Number</label>
            <input class="form-control" type="text" name="trade_license_number" value="{{old('trade_license_number')}}"></input>
            <br>

            <label>Owner Name</label>
            <input class="form-control" type="text" name="owner_name" value="{{old('owner_name')}}"></input>
            <br>

            <label>Nid Number</label>
            <input class="form-control" type="text" name="owner_nid_number" value="{{old('owner_nid_number')}}"></input>
            <br>

            <label>Current Address</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="owner_current_house_address" rows="3">{{old('owner_current_house_address')}}</textarea>
            <br>

            <label>Contact Number Primary</label>
            <input class="form-control" type="text" name="owner_contact_number_primary" value="{{old('owner_contact_number_primary')}}"></input>
            <br>

            <label>Contact Number Secondary</label>
            <input class="form-control" type="text" name="owner_contact_number_secondary" value="{{old('owner_contact_number_secondary')}}"></input>
            <br>

            <label>primary Contact person Position</label>
            <input class="form-control" type="text" name="primary_contact_person_position" value="{{old('primary_contact_person_position')}}"></input>
            <br>

            <label>Primary Contact Person Number Primary</label>
            <input class="form-control" type="text" name="primary_contact_person_number_primary" value="{{old('primary_contact_person_number_primary')}}"></input>
            <br>

            <label>Primary Contact Person Number Secondary</label>
            <input class="form-control" type="text" name="primary_contact_person_number_secondary" value="{{old('primary_contact_person_number_secondary')}}"></input>
            <br>

            <label>Secondary Contact Person Position</label>
            <input class="form-control" type="text" name="secondary_contact_person_position" value="{{old('secondary_contact_person_position')}}"></input>
            <br>

            <label>Secondary Contact Person Number Primary</label>
            <input class="form-control" type="text" name="secondary_contact_person_number_primary" value="{{old('secondary_contact_person_number_primary')}}"></input>
            <br>

            <label>Secondary Contact Person Number Secondary</label>
            <input class="form-control" type="text" name="secondary_contact_person_number_secondary" value="{{old('secondary_contact_person_number_secondary')}}"></input>
            <br>

            <label>Documents Google Drive Link</label>
            <input class="form-control" type="text" name="documents_google_drive_link" value="{{old('documents_google_drive_link')}}"></input>
            <br>

            <label>Overall Review</label>
            <input class="form-control" type="number" name="overall_review" value="{{old('overall_review')}}"></input>
            <br>

            <label>Review By Service</label>
            <input class="form-control" type="number" name="review_by_service" value="{{old('review_by_service')}}"></input>
          

            <input class="form-control" type="hidden" name="added_by" value="{{Auth::user()->id}}"></input>
            <br>

            <label>Add Note</label>
            <input class="form-control" type="text" name="add_note" value="{{old('add_note')}}"></input>
            <br>

            <label>Reviewed By</label>
            <select class="form-control" name="reviewed_by">
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
            <input class="form-control" type="text" name="review_note" value="{{old('review_note')}}"></input>
            <br>

            <label>Margin</label>
            <input class="form-control" type="number" name="margin" value="{{old('margin')}}"></input>
            <br>


            <button class="btn btn-primary" type="submit">Create Vendor</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection