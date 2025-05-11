<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingAboutUs extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_about_us', function($table)
        {
            $table->boolean('is_core_value')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_about_us', function($table)
        {
            $table->dropColumn('is_core_value');
        });
    }
}
