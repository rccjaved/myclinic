<?php namespace MyClinic\Doctor\Models;

use Model;

/**
 * Model
 */
class SpecialtySlider extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_doctor_specialty_sliders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'specialties' => ['MyClinic\Doctor\Models\Specialty', 'table' => 'myclinic_doctor_doctor_specialty_slider', 'key' => 'specialty_id'],
    ];

    public $attachOne = [
        'slider_image' => 'System\\Models\\File',
        'slider_image_ar' => 'System\\Models\\File',
        'slider_image_mobile' => 'System\\Models\\File',
        'slider_image_ar_mobile' => 'System\\Models\\File',
    ];

    public function listSpecialty()
    {
        return Specialty::all()->pluck('name', 'id');
    }
}
