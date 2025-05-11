<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties8 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->string('name_ar', 255)->nullable()->change();
            $table->text('description_ar')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function($table)
        {
            $table->string('name_ar', 255)->nullable(false)->change();
            $table->text('description_ar')->nullable(false)->change();
        });
    }
}
