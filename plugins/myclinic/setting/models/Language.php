<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Language extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_language';

    /**
     * @var array Validation rules
     */

    public $belongsToMany = [
        'doctors' => ['MyClinic\Doctor\Models\Doctor', 'table' => 'myclinic_doctor_doctor_language', 'key' => 'language_id'],

    ];

    public $rules = [];
}
