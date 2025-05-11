<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingCommonComponents extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_common_components', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_common_components', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
