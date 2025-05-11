<?php

namespace MyClinic\Hr\Models;

use Model;

/**
 * Model
 */
class AskUs extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'message',
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_hr_ask_us';

    /**
     * @var array Validation rules
     */
    public $rules = [];
}
