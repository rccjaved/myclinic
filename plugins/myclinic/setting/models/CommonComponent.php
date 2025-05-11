<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class CommonComponent extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_common_components';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $attachOne = [
        'section_image' => 'System\\Models\\File',
    ];
}
