<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class AboutUs extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_about_us';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $attachOne = [
        'about_us_image' => 'System\\Models\\File',
    ];
}
