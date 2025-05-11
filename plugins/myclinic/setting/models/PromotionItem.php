<?php

namespace MyClinic\Setting\Models;

use Model;

/**
 * Model
 */
class PromotionItem extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_setting_promotion_items';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'promotion' => ['MyClinic\Setting\Models\Promotion', 'key' => 'promotion_id'],
    ];

    public function listPromotions()
    {
        return Promotion::all()->pluck('name', 'id');
    }
}
