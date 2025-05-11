<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingCommonComponents2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_common_components', function($table)
        {
            $table->string('title_ar');
            $table->text('description_ar');
            $table->string('link_name_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_common_components', function($table)
        {
            $table->dropColumn('title_ar');
            $table->dropColumn('description_ar');
            $table->dropColumn('link_name_ar');
        });
    }
}
