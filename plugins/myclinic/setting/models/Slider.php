<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Slider extends Model
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
    public $table = 'myclinic_setting_sliders';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $attachOne = [
        'slider_image' => 'System\\Models\\File',
        'slider_image_ar' => 'System\\Models\\File',
        'slider_image_mobile' => 'System\\Models\\File',
        'slider_image_ar_mobile' => 'System\\Models\\File',
    ];
}
