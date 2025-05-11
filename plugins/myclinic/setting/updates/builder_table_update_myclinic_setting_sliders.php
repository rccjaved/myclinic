<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingSliders extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->dropColumn('image');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->string('image', 255);
        });
    }
}
