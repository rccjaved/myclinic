<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctorSpecialty extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctor_specialty', function($table)
        {
            $table->bigInteger('location_id')->nullable();
            $table->boolean('is_hod')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctor_specialty', function($table)
        {
            $table->dropColumn('location_id');
            $table->dropColumn('is_hod');
        });
    }
}
