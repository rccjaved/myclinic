<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingSliders2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->string('title_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->dropColumn('title_ar');
        });
    }
}
