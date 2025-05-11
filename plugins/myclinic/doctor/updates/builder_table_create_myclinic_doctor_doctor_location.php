<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicDoctorDoctorLocation extends Migration
{
    public function up()
    {
        Schema::create('myclinic_doctor_doctor_location', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->bigInteger('doctor_id');
            $table->bigInteger('location_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_doctor_doctor_location');
    }
}
