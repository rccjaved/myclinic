<?php

namespace MyClinic\Doctor\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Db;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;
use MyClinic\Doctor\Models\Doctor;
use MyClinic\Doctor\Models\Specialty as ModelsSpecialty;

class Specialty extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MyClinic.Doctor', 'Doc', 'specialties');
    }


    public function getDoctors($slug,HttpRequest $request)
    {
        $language = $request->header('Language');


        $specialty = ModelsSpecialty::where('slug', $slug)->first();
        $locationId = (int)$_REQUEST['location'];
        $locationDoctors = Db::table("myclinic_doctor_doctor_location")
            ->where('location_id', $locationId)
            ->pluck('doctor_id')
            ->toArray();

        $specialityDoctors = Db::table("myclinic_doctor_doctor_specialty")
            ->where('specialty_id', $specialty->id)
            ->pluck('doctor_id')
            ->toArray();

        $mergedDoctors = array_intersect($locationDoctors, $specialityDoctors);


        if($language && $language == 'ar'){
            $doctors = Doctor::whereIn('id', $mergedDoctors)->orderBy('name_ar')->get();
        }else{
            $doctors = Doctor::whereIn('id', $mergedDoctors)->orderBy('name')->get();
        }

            return ['doctors' => $doctors];
       
    }
}
