<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties9 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->string('tag_line_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->dropColumn('tag_line_ar');
        });
    }
}
