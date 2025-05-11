<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors16 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('designation')->nullable();
            $table->string('designation_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->dropColumn('designation');
            $table->dropColumn('designation_ar');
        });
    }
}
