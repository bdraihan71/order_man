@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">Vendor</div>
        <div class="card-body">

          <span>
            <h5>Company Name:</h5>
          </span>
          <P>{{$vendor->company_name}}</P>
          <br>

          <span>
            <h5>Office Address:</h5>
          </span>
          <P>{{$vendor->office_address}}</P>
          <br>

          <span>
            <h5>Trade License Number:</h5>
          </span>
          <P>{{$vendor->trade_license_number}}</P>
          <br>

          <span>
            <h5>Owner Name:</h5>
          </span>
          <P>{{$vendor->owner_name}}</P>
          <br>

          <span>
            <h5>Owner Nid Number:</h5>
          </span>
          <P>{{$vendor->owner_nid_number}}</P>
          <br>

          <span>
            <h5>Owner Current House Address:</h5>
          </span>
          <P>{{$vendor->owner_current_house_address}}</P>
          <br>

          <span>
            <h5>Owner Contact Number Primary:</h5>
          </span>
          <P>{{$vendor->owner_contact_number_primary}}</P>
          <br>

          <span>
            <h5>Owner Contact Number Secondary:</h5>
          </span>
          <P>{{$vendor->owner_contact_number_secondary}}</P>
          <br>

          <span>
            <h5>Primary Contact Person Position:</h5>
          </span>
          <P>{{$vendor->primary_contact_person_position}}</P>
          <br>

          <span>
            <h5>Primary Contact Person Number Primary:</h5>
          </span>
          <P>{{$vendor->primary_contact_person_number_primary}}</P>
          <br>

          <span>
            <h5>Primary Contact Person Number Secondary:</h5>
          </span>
          <P>{{$vendor->primary_contact_person_number_secondary}}</P>
          <br>

          <span>
            <h5>Secondary Contact Person Position:</h5>
          </span>
          <P>{{$vendor->secondary_contact_person_position}}</P>
          <br>

          <span>
            <h5>Secondary Contact Person Number Primary:</h5>
          </span>
          <P>{{$vendor->secondary_contact_person_number_primary}}</P>
          <br>

          <span>
            <h5>Secondary Contact Person Number Secondary:</h5>
          </span>
          <P>{{$vendor->secondary_contact_person_number_secondary}}</P>
          <br>

          <span>
            <h5>Documents Google Drive Link:</h5>
          </span>
          <P>{{$vendor->documents_google_drive_link}}</P>
          <br>

          <span>
            <h5>Overall Review:</h5>
          </span>
          <P>{{$vendor->overall_review}}</P>
          <br>

          <span>
            <h5>Review By Service:</h5>
          </span>
          <P>{{$vendor->review_by_service}}</P>
          <br>

          <span>
            <h5>Added By:</h5>
          </span>
          <P>{{$vendor->added_by}}</P>
          <br>

          <span>
            <h5>Add Note:</h5>
          </span>
          <P>{{$vendor->add_note}}</P>
          <br>

          <span>
            <h5>Reviewed By:</h5>
          </span>
          <P>{{$vendor->reviewed_by}}</P>
          <br>

          <span>
            <h5>Review Note:</h5>
          </span>
          <P>{{$vendor->review_note}}</P>
          <br>

          <span>
            <h5>Margin:</h5>
          </span>
          <P>{{$vendor->margin}}</P>
          <br>


          <a href="{{route('vendors.index')}}" class="btn btn-info">Vendor List</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection