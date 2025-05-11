<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Location extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_locations';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsToMany = [
        'specialties' => ['MyClinic\Doctor\Models\Specialty', 'table' => 'myclinic_doctor_specialty_location', 'key' => 'location_id'],
        'doctors' => ['MyClinic\Doctor\Models\Doctor', 'table' => 'myclinic_doctor_doctor_location', 'key' => 'location_id'],

    ];

    public $attachOne = [
        'location_image' => 'System\\Models\\File',
    ];
}
