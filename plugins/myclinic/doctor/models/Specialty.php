<?php

namespace MyClinic\Doctor\Models;

use Model;
use MyClinic\Setting\Models\Location;
use October\Rain\Database\Traits\Sortable;

/**
 * Model
 */
class Specialty extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;


    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_doctor_specialties';

    /**
     * @var array Validation rules
     */
    public $rules = [];
    public $attachOne = [
        'specialty_image' => 'System\\Models\\File',
        'specialty_banner_image' => 'System\\Models\\File',
    ];

    public $belongsToMany = [
        'locations' => ['MyClinic\Setting\Models\Location', 'table' => 'myclinic_doctor_specialty_location', 'key' => 'specialty_id'],
        'doctors' => ['MyClinic\Doctor\Models\Doctor', 'table' => 'myclinic_doctor_doctor_specialty', 'key' => 'specialty_id'],
    ];

    public function listDoctors()
    {
        $doctors = Doctor::orderBy('name','desc')->get();
        $doctorList = [];
        foreach ($doctors as $item) {
            $doctorList[$item->id] = $item->name . ' | ' . $item->name_ar;
        }
        return $doctorList;
    }
}
