<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingBlogs extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_blogs', function($table)
        {
            $table->string('author_name_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_blogs', function($table)
        {
            $table->dropColumn('author_name_ar');
        });
    }
}
