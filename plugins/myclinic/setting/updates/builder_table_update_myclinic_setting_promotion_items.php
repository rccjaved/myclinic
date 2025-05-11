<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingPromotionItems extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_promotion_items', function($table)
        {
            $table->renameColumn('myclinic_setting_promotion_id', 'promotion_id');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_promotion_items', function($table)
        {
            $table->renameColumn('promotion_id', 'myclinic_setting_promotion_id');
        });
    }
}
