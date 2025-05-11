<?php

namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicDoctorSpecilties extends Migration
{
    public function up()
    {
        Schema::create('myclinic_doctor_specialties', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('myclinic_doctor_specialties');
    }
}
