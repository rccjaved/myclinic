<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors18 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->dropColumn('hod_location_id');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->bigInteger('hod_location_id')->nullable();
        });
    }
}
