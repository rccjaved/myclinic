<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors10 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('name_ar');
            $table->string('highest_degree_ar');
            $table->text('about_ar');
            $table->text('specialty_desc_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->dropColumn('name_ar');
            $table->dropColumn('highest_degree_ar');
            $table->dropColumn('about_ar');
            $table->dropColumn('specialty_desc_ar');
        });
    }
}
