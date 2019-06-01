@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-transparent my-3">
        <div class="card-header">Vendor</div>
        <div class="card-body">
          <form method="post" action="{{route('vendors.update', $vendor->id)}}">
            @csrf
            @method('patch')

            <label>Company Name</label>
            <input class="form-control bg-transparent" type="text" name="company_name" value="{{$vendor->company_name}}"></input>
            <br>

            <label>Office Address</label>
            <input class="form-control bg-transparent" type="text" name="office_address" value="{{$vendor->office_address}}"></input>
            <br>

            <label>Trade License Number</label>
            <input class="form-control bg-transparent" type="text" name="trade_license_number" value="{{$vendor->trade_license_number}}"></input>
            <br>

            <label>Owner Name</label>
            <input class="form-control bg-transparent" type="text" name="owner_name" value="{{$vendor->owner_name}}"></input>
            <br>

            <label>Nid Number</label>
            <input class="form-control bg-transparent" type="text" name="owner_nid_number" value="{{$vendor->owner_nid_number}}"></input>
            <br>

            <label>Current Address</label>
            <textarea class="form-control bg-transparent" id="exampleFormControlTextarea1" name="owner_current_house_address" rows="3">{{$vendor->owner_current_house_address}}</textarea>
            <br>

            <label>Contact Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="owner_contact_number_primary" value="{{$vendor->owner_contact_number_primary}}"></input>
            <br>

            <label>Contact Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="owner_contact_number_secondary" value="{{$vendor->owner_contact_number_secondary}}"></input>
            <br>

            <label>primary Contact person Position</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_position" value="{{$vendor->primary_contact_person_position}}"></input>
            <br>

            <label>Primary Contact Person Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_number_primary" value="{{$vendor->primary_contact_person_number_primary}}"></input>
            <br>

            <label>Primary Contact Person Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="primary_contact_person_number_secondary" value="{{$vendor->primary_contact_person_number_secondary}}"></input>
            <br>

            <label>Secondary Contact Person Position</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_position" value="{{$vendor->secondary_contact_person_position}}"></input>
            <br>

            <label>Secondary Contact Person Number Primary</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_number_primary" value="{{$vendor->secondary_contact_person_number_primary}}"></input>
            <br>

            <label>Secondary Contact Person Number Secondary</label>
            <input class="form-control bg-transparent" type="text" name="secondary_contact_person_number_secondary" value="{{$vendor->secondary_contact_person_number_secondary}}"></input>
            <br>

            <label>Documents Google Drive Link</label>
            <input class="form-control bg-transparent" type="text" name="documents_google_drive_link" value="{{$vendor->documents_google_drive_link}}"></input>
            <br>

            <label>Overall Review</label>
            <input class="form-control bg-transparent" type="number" name="overall_review" value="{{$vendor->overall_review}}"></input>
            <br>

            <label>Review By Service</label>
            <input class="form-control bg-transparent" type="number" name="review_by_service" value="{{$vendor->review_by_service}}"></input>
            
            <input class="form-control bg-transparent" type="hidden" name="added_by" value="{{$vendor->added_by}}"></input>
            <br>

            <label>Add Note</label>
            <input class="form-control bg-transparent" type="text" name="add_note" value="{{$vendor->add_note}}"></input>
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
            <input class="form-control bg-transparent" type="text" name="review_note" value="{{$vendor->review_note}}"></input>
            <br>

            <label>Margin</label>
            <input class="form-control bg-transparent" type="number" name="margin" value="{{$vendor->margin}}"></input>
            <br>


            <button class="btn btn-info" type="submit">Update Vendor</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection