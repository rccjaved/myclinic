<?php

namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorSpecialties extends Migration
{
    public function up()
    {
        Schema::rename('myclinic_doctor_specialties', 'myclinic_doctor_specialties');
    }

    public function down()
    {
        Schema::rename('myclinic_doctor_specialties', 'myclinic_doctor_specialties');
    }
}
