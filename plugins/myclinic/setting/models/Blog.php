<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Blog extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_blogs';

    /**
     * @var array Validation rules
     */
    public $rules = [];
    public $attachOne = [
        'blog_image' => 'System\\Models\\File',
    ];
}
