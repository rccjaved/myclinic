<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingHomeHealthCare extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_home_health_care', function($table)
        {
            $table->string('title_ar');
            $table->text('description_ar');
            $table->string('link_name_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_home_health_care', function($table)
        {
            $table->dropColumn('title_ar');
            $table->dropColumn('description_ar');
            $table->dropColumn('link_name_ar');
        });
    }
}
