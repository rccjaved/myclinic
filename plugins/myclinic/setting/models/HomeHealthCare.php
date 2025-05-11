<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class HomeHealthCare extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_home_health_care';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $attachOne = [
        'homecare_image' => 'System\\Models\\File',
    ];
}
