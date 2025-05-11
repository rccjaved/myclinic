<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteMyclinicDoctorSpecialities extends Migration
{
    public function up()
    {
        Schema::dropIfExists('myclinic_doctor_specialities');
    }
    
    public function down()
    {
        Schema::create('myclinic_doctor_specialities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
