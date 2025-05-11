<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicDoctorDoctorSpecialty extends Migration
{
    public function up()
    {
        Schema::create('myclinic_doctor_doctor_specialty', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->bigInteger('doctor_id');
            $table->bigInteger('specialty_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_doctor_doctor_specialty');
    }
}
