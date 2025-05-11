<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingLocations2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->string('title_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->dropColumn('title_ar');
        });
    }
}
