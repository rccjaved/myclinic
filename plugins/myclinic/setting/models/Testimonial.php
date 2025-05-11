<?php namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Testimonial extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_testimonials';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
