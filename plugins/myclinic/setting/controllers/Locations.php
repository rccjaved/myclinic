<?php

namespace MyClinic\Setting\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MyClinic\Doctor\Models\Specialty;
use MyClinic\Setting\Models\Location;

class Locations extends Controller
{
    public $implement = ['Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MyClinic.Setting', 'Settings', 'locations');
    }

    public function getSpecialties($id,Request $request)
    {
        $language = $request->header('Language');

        $location = Location::find($id);

        if ($location) {
            if($language && $language == 'ar'){
                $specialties = $location->specialties()->orderBy('name_ar')->get();
            }else{
                $specialties = $location->specialties()->orderBy('name')->get();
            }
            foreach ($specialties as $item) {
                $item->image_path = ($item->specialty_image) ? $item->specialty_image->path : '';
            }
            if($language && $language == 'ar'){
                $doctors = $location->doctors()->orderBy('name_ar')->get();

            }else{
                $doctors = $location->doctors()->orderBy('name')->get();

            }
            return ['specialties' => $specialties,'doctors'=>$doctors];
        }
    }
    public function getSpecialtiesByAlphabet($id, $alphabet)
    {
        $location = Location::find($id);
        $alphabetArray = [
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
            9 => 'I',
            10 => 'J',
            11 => 'K',
            12 => 'L',
            13 => 'M',
            14 => 'N',
            15 => 'O',
            16 => 'P',
            17 => 'Q',
            18 => 'R',
            19 => 'S',
            20 => 'T',
            21 => 'U',
            22 => 'V',
            23 => 'W',
            24 => 'X',
            25 => 'Y',
            26 => 'Z',
        ];

        if ($location) {
            $specialty_id=[];
            $specialties = $location->specialties()->orderBy('name')->get();
            foreach ($specialties as $item) {
                $specialty_id[] = $item->id;
            }

            $alphabetLetter = $alphabetArray[$alphabet];
            $specialties = Specialty::whereIn('id', $specialty_id)->where('name', 'LIKE', $alphabetLetter . '%')
                ->orWhere('name', 'LIKE', strtolower($alphabetLetter) . '%')->whereIn('id', $specialty_id)->get();
            foreach ($specialties as $item) {
                $item->image_path = ($item->specialty_image) ? $item->specialty_image->path : '';
            }
            return ['specialties' => $specialties];
        }
    }


    public function getSpecialtiesByAlphabetAr($id, $alphabet)
    {
        $location = Location::find($id);
        $alphabetArray = [
            28 => 'ي',
            27 => 'و',
            26 => 'هـ',
            25 => 'ن',
            24 => 'م',
            23 => 'ل',
            22 => 'ك',
            21 => 'ق',
            20 => 'ف',
            19 => 'غ',
            18 => 'ع',
            17 => 'ظ',
            16 => 'ط',
            15 => 'ض',
            14 => 'ص',
            13 => 'ش',
            12 => 'س',
            11 => 'ز',
            10 => 'ر',
            9 => 'ذ',
            8 => 'د',
            7 => 'خ',
            6 => 'ح',
            5 => 'ج',
            4 => 'ث',
            3 => 'ت',
            2 => 'ب',
            1 => 'أ',
        ];

        if ($location) {
            $specialties = $location->specialties()->orderBy('name')->get();
            foreach ($specialties as $item) {
                $specialty_id[] = $item->id;
            }
            $alphabetLetter = $alphabetArray[$alphabet];
            $specialties = Specialty::whereIn('id', $specialty_id)->where('arabic_search_word', 'LIKE', '%' . $alphabetLetter . '%')->get();
            foreach ($specialties as $item) {
                $item->image_path = ($item->specialty_image) ? $item->specialty_image->path : '';
            }
            return ['specialties' => $specialties];
        }
    }
}
