<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingTestimonials extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_testimonials', function($table)
        {
            $table->string('testimonial_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_testimonials', function($table)
        {
            $table->dropColumn('testimonial_ar');
        });
    }
}
