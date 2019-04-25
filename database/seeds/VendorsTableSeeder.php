<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('vendors')->insert([
            'company_name'=> 'BD Advertising',
            'office_address'=> 'Gulshan Dhaka',
            'trade_license_number'=> '1239123',
            'owner_name'=> 'Prince',
            'owner_nid_number'=> '2342342312123',
            'owner_current_house_address'=> 'Gulshan Dhaka',
            'owner_contact_number_primary'=> '123123123',
            'owner_contact_number_secondary'=> '123123123',
            'primary_contact_person_position'=> '123123',
            'primary_contact_person_number_primary'=> '123123',
            'primary_contact_person_number_secondary'=> '123',
            'secondary_contact_person_position'=> '123123',
            'secondary_contact_person_number_primary'=> '123123',
            'secondary_contact_person_number_secondary'=> '12313',
            'documents_google_drive_link'=> 'http://google.com',
            'overall_review'=> 5,
            'review_by_service'=> 5,
            'added_by'=> 2,
            'add_note'=> 'Some note',
            'reviewed_by'=> 1,
            'review_note'=> 'Review note',
            'margin'=> 20,
        ]);

        DB::table('vendors')->insert([
            'company_name'=> 'Fairy Tale',
            'office_address'=> 'Gulshan Dhaka',
            'trade_license_number'=> '1239123',
            'owner_name'=> 'Tasnim',
            'owner_nid_number'=> '2342342312123',
            'owner_current_house_address'=> 'Gulshan Dhaka',
            'owner_contact_number_primary'=> '123123123',
            'owner_contact_number_secondary'=> '123123123',
            'primary_contact_person_position'=> '123123',
            'primary_contact_person_number_primary'=> '123123',
            'primary_contact_person_number_secondary'=> '123',
            'secondary_contact_person_position'=> '123123',
            'secondary_contact_person_number_primary'=> '123123',
            'secondary_contact_person_number_secondary'=> '12313',
            'documents_google_drive_link'=> 'http://facebook.com',
            'overall_review'=> 5,
            'review_by_service'=> 5,
            'added_by'=> 2,
            'add_note'=> 'Some note',
            'reviewed_by'=> 1,
            'review_note'=> 'Review note',
            'margin'=> 20,
        ]);
    }
}
