<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class Promotion extends Model
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
    public $table = 'myclinic_setting_promotions';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $hasMany = [
        'promotionItems' => ['MyClinic\Setting\Models\PromotionItem', 'key' => 'promotion_id'],
    ];

    public $attachOne = [
        'promotion_image' => 'System\\Models\\File'
    ];
}
