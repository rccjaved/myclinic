<?php

namespace MyClinic\Hr\Models;

use Model;

/**
 * Model
 */
class ProgramEnrollment extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'program_id',
        'program_name',
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_hr_program_enrollment';

    /**
     * @var array Validation rules
     */
    public $rules = [];
}
