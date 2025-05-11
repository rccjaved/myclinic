<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingLocations3 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->string('name_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->dropColumn('name_ar');
        });
    }
}
