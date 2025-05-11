<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors4 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('about', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('about', 255)->nullable(false)->change();
        });
    }
}
