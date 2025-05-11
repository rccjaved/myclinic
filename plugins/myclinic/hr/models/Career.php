<?php

namespace MyClinic\Hr\Models;

use Model;

/**
 * Model
 */
class Career extends Model
{
    use \October\Rain\Database\Traits\Validation;



    protected $guarded = [];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_hr_career';

    public $attachOne = [
        'file' => 'System\\Models\\File',
        'license' => 'System\\Models\\File',
        'education_certificate' => 'System\\Models\\File',
        'exp_certificate' => 'System\\Models\\File',
        'additional_certificate' => 'System\\Models\\File',
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [];
}
