<?php

namespace MyClinic\Doctor\Models;

use Model;
use MyClinic\Setting\Models\Language;
use MyClinic\Setting\Models\Location;
use Illuminate\Support\Facades\Http;

/**
 * Model
 */
class Doctor extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_doctor_doctors';

    /**
     * @var array Validation rules
     */
    public $rules = [];
    public $attachOne = [
        'doctor_image' => 'System\\Models\\File',
        'doctor_detail_image' => 'System\\Models\\File'

    ];


    public $belongsToMany = [
        'specialties' => ['MyClinic\Doctor\Models\Specialty', 'table' => 'myclinic_doctor_doctor_specialty', 'key' => 'doctor_id'],
        'locations' => ['MyClinic\Setting\Models\Location',  'table' => 'myclinic_doctor_doctor_location', 'key' => 'doctor_id'],
        'languages' => ['MyClinic\Setting\Models\Language',  'table' => 'myclinic_doctor_doctor_language', 'key' => 'doctor_id'],

    ];

    public function listLocations()
    {
        return Location::all()->pluck('name', 'id');
    }

    public function listSpecialty()
    {
        return Specialty::all()->pluck('name', 'id');
    }

    public function listLanguage()
    {

        $language = Language::all();
        $languageList = [];
        foreach ($language as $item) {
            $languageList[$item->id] = $item->name . ' | ' . $item->name_ar;
        }
        return $languageList;
    }


    public function mazikDoctor()
    {
        // Define the API endpoint and token
        $url = 'https://bamc.myclinic.com.sa/OS.WebAPI.External/api/OSExternal/GetRefDoctors';
        $securityToken = 'e236d058-fa14-44e1-aa07-5415d8f062c2';

        // Make the API request
        $response = Http::post($url, [
            'SecurityToken' => $securityToken,
            'IsTelemedicine' => false
        ]);

        // Initialize the dropdown data with a default option
        $doctorList = [0 => 'Default Mazik Doctor'];

        // Check if the request was successful
        if ($response->successful()) {
            $doctorsData = $response->json();
            
            // Check if the expected "DoctorProfiles" key exists in the response
            if (isset($doctorsData['DoctorProfiles'])) {
                foreach ($doctorsData['DoctorProfiles'] as $doctor) {
                    // Use DoctorId as the key and NameEn as the display name in the dropdown
                    $doctorList[$doctor['DoctorId']] = $doctor['NameEn'];
                }
            }
        } else {
            // Handle the error or log it as needed
            \Log::error('Failed to fetch doctor data from external API: ' . $response->body());
        }

        return $doctorList;
    }
}
