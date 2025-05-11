<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties4 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->bigInteger('doctor_count')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->dropColumn('doctor_count');
        });
    }
}
