<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingLocations5 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->string('name_ar', 255)->nullable()->change();
            $table->string('title_ar', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->string('name_ar', 255)->nullable(false)->change();
            $table->string('title_ar', 255)->nullable(false)->change();
        });
    }
}
