<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingSliders3 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->string('title_ar', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->string('title_ar', 255)->nullable(false)->change();
        });
    }
}
