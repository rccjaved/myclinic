<?php

namespace MyClinic\Programs\Models;

use Model;

/**
 * Model
 */
class Program extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_programs_';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $attachOne = [
        'program_image' => 'System\\Models\\File',
        'program_list_page_image' => 'System\\Models\\File',
        'program_banner_image' => 'System\\Models\\File',
    ];
}
