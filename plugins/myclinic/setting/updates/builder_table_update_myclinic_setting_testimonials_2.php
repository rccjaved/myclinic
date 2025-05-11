<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingTestimonials2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_testimonials', function($table)
        {
            $table->string('name_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_testimonials', function($table)
        {
            $table->dropColumn('name_ar');
        });
    }
}
