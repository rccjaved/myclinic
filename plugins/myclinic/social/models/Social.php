<?php namespace MyClinic\Social\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Model;
use Url;

/**
 * Model
 */
class Social extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'myclinic_social_records';

    /**
     * @var array Validation rules
     */
  
    public $rules = [
        'phone_no' => 'required|numeric',
    ];

    protected $fillable = [
        'slug',
        'phone_no', 
    ];
   

    public function afterCreate()
    {
        Social::where('id', $this->id)->update([
            'slug' => Url::to("/social-media-detail/{$this->type}/{$this->platform}/{$this->id}"),
            'language' => 'en'
        ]);

        $socialDataInsertArbId = Social::insertGetId([
            'phone_no'   => $this->phone_no,
            'platform'   => $this->platform,
            'type'       => $this->type,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'language'   => 'ar'
        ]);

        Social::where('id', $socialDataInsertArbId)->update([
            'slug' => Url::to("/social-media-detail/{$this->type}/{$this->platform}/{$socialDataInsertArbId}")
        ]);
    }

    public function afterSave()
    {
        Social::where('id', $this->id)->update([
            'slug' => Url::to("/social-media-detail/{$this->type}/{$this->platform}/{$this->id}"),
        ]);
        
    }

}
