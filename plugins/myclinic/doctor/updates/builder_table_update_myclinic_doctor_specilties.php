<?php

namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecilties extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_specialties', function ($table) {
            $table->dropColumn('location_id');
        });
    }

    public function down()
    {
        Schema::table('myclinic_doctor_specialties', function ($table) {
            $table->bigInteger('location_id')->nullable();
        });
    }
}
