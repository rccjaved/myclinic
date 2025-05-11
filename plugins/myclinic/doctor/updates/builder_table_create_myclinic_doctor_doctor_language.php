<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicDoctorDoctorLanguage extends Migration
{
    public function up()
    {
        Schema::create('myclinic_doctor_doctor_language', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_doctor_doctor_language');
    }
}
