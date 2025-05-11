<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors14 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->dropColumn('language');
            $table->dropColumn('language_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->text('language')->nullable();
            $table->text('language_ar')->nullable();
        });
    }
}
