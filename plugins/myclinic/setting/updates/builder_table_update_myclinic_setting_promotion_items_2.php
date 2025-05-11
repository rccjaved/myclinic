<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingPromotionItems2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_promotion_items', function($table)
        {
            $table->text('text_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_promotion_items', function($table)
        {
            $table->dropColumn('text_ar');
        });
    }
}
