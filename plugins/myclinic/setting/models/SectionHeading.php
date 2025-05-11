<?php namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class SectionHeading extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_section_headings';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
