<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->boolean('show_home_page');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->dropColumn('show_home_page');
        });
    }
}
