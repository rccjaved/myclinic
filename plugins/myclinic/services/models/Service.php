<?php

namespace MyClinic\Services\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_services_';

    /**
     * @var array Validation rules
     */
    public $rules = [];
    public $attachOne = [
        'service_image' => 'System\\Models\\File'
    ];
}
