<?php namespace MyClinic\Doctor\Models;

use Model;
use MyClinic\Setting\Models\Location;

/**
 * Model
 */
class HodDoctor extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_doctor_doctors_hod';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'doctor' => ['MyClinic\Doctor\Models\Doctor', 'key' => 'doctor_id', 'otherKey' => 'id'],
        'specialty' => ['MyClinic\Doctor\Models\Specialty', 'key' => 'specialty_id', 'otherKey' => 'id'],
        'location' => ['MyClinic\Setting\Models\Location', 'key' => 'location_id', 'otherKey' => 'id'],


    ];

    
    
  
    public function listDoctors()
    {
        return Doctor::all()->pluck('name', 'id');
    }


    public function listLocations()
    {
        return Location::all()->pluck('name', 'id');
    }

    public function listSpecialty()
    {
        return Specialty::all()->pluck('name', 'id');
    }

}
