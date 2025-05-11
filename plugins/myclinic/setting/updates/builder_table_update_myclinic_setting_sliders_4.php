<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingSliders4 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->text('tag_line_ar');
            $table->string('link_name_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_sliders', function($table)
        {
            $table->dropColumn('tag_line_ar');
            $table->dropColumn('link_name_ar');
        });
    }
}
