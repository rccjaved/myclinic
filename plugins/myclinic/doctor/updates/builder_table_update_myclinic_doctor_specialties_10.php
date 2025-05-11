<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties10 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->string('arabic_search_word');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->dropColumn('arabic_search_word');
        });
    }
}
