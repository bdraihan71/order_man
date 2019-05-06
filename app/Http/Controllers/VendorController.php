<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'office_address' => 'required',
            'trade_license_number' => 'required',
            'owner_name' => 'required',
            'owner_nid_number' => 'required',
            'owner_current_house_address' => 'required',
            'owner_contact_number_primary' => 'required',
            'owner_contact_number_secondary' => 'required',
            'primary_contact_person_position' => 'required',
            'primary_contact_person_number_primary' => 'required',
            'primary_contact_person_number_secondary' => 'required',
            'secondary_contact_person_position' => 'required',
            'secondary_contact_person_number_primary' => 'required',
            'secondary_contact_person_number_secondary' => 'required',
            'documents_google_drive_link' => 'required',
            'overall_review' => 'required',
            'review_by_service' => 'required',
            'added_by' => 'required',
            'add_note' => 'required',
            'reviewed_by' => 'required',
            'review_note' => 'required',
            'margin' => 'required',
        ]);

        Vendor::create([
            'company_name' => $request->company_name,
            'office_address' => $request->office_address,
            'trade_license_number' => $request->trade_license_number,
            'owner_name' => $request->owner_name,
            'owner_nid_number' => $request->owner_nid_number,
            'owner_current_house_address' => $request->owner_current_house_address,
            'owner_contact_number_primary' => $request->owner_contact_number_primary,
            'owner_contact_number_secondary' => $request->owner_contact_number_secondary,
            'primary_contact_person_position' => $request->primary_contact_person_position,
            'primary_contact_person_number_primary' => $request->primary_contact_person_number_primary,
            'primary_contact_person_number_secondary' => $request->primary_contact_person_number_secondary,
            'secondary_contact_person_position' => $request->secondary_contact_person_position,
            'secondary_contact_person_number_primary' => $request->secondary_contact_person_number_primary,
            'secondary_contact_person_number_secondary' => $request->secondary_contact_person_number_secondary,
            'documents_google_drive_link' => $request->documents_google_drive_link,
            'overall_review' => $request->overall_review,
            'review_by_service' => $request->review_by_service,
            'added_by' => $request->added_by,
            'add_note' => $request->add_note,
            'reviewed_by' => $request->reviewed_by,
            'review_note' => $request->review_note,
            'margin' => $request->margin,
        ]);

        return redirect(route('vendors.index'));
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'office_address' => 'required',
            'trade_license_number' => 'required',
            'owner_name' => 'required',
            'owner_nid_number' => 'required',
            'owner_current_house_address' => 'required',
            'owner_contact_number_primary' => 'required',
            'owner_contact_number_secondary' => 'required',
            'primary_contact_person_position' => 'required',
            'primary_contact_person_number_primary' => 'required',
            'primary_contact_person_number_secondary' => 'required',
            'secondary_contact_person_position' => 'required',
            'secondary_contact_person_number_primary' => 'required',
            'secondary_contact_person_number_secondary' => 'required',
            'documents_google_drive_link' => 'required',
            'overall_review' => 'required',
            'review_by_service' => 'required',
            'added_by' => 'required',
            'add_note' => 'required',
            'reviewed_by' => 'required',
            'review_note' => 'required',
            'margin' => 'required',
        ]);
        
        $vendor = Vendor::find($id);
        $vendor->company_name = $request->get('company_name');
        $vendor->office_address = $request->get('office_address');
        $vendor->trade_license_number = $request->get('trade_license_number');
        $vendor->owner_name = $request->get('owner_name');
        $vendor->owner_nid_number = $request->get('owner_nid_number');
        $vendor->owner_current_house_address = $request->get('owner_current_house_address');
        $vendor->owner_contact_number_primary = $request->get('owner_contact_number_primary');
        $vendor->owner_contact_number_secondary = $request->get('owner_contact_number_secondary');
        $vendor->primary_contact_person_position = $request->get('primary_contact_person_position');
        $vendor->primary_contact_person_number_primary = $request->get('primary_contact_person_number_primary');
        $vendor->primary_contact_person_number_secondary = $request->get('primary_contact_person_number_secondary');
        $vendor->secondary_contact_person_position = $request->get('secondary_contact_person_position');
        $vendor->secondary_contact_person_number_primary = $request->get('secondary_contact_person_number_primary');
        $vendor->secondary_contact_person_number_secondary = $request->get('secondary_contact_person_number_secondary');
        $vendor->documents_google_drive_link = $request->get('documents_google_drive_link');
        $vendor->overall_review = $request->get('overall_review');
        $vendor->review_by_service = $request->get('review_by_service');
        $vendor->added_by = $request->get('added_by');
        $vendor->add_note = $request->get('add_note');
        $vendor->reviewed_by = $request->get('reviewed_by');
        $vendor->review_note = $request->get('review_note');
        $vendor->margin = $request->get('margin');
        $vendor->save();

        return redirect(route('vendors.index'));
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect(route('vendors.index'));
    }
}
