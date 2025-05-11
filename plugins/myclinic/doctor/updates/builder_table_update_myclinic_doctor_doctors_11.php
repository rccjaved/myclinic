<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors11 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('name_ar', 255)->default('اسم البديل')->change();
            $table->string('highest_degree_ar', 255)->default('أعلى درجة')->change();
            $table->text('about_ar')->default('حول')->change();
            $table->text('specialty_desc_ar')->default('تخصصات')->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('name_ar', 255)->default(null)->change();
            $table->string('highest_degree_ar', 255)->default(null)->change();
            $table->text('about_ar')->default(null)->change();
            $table->text('specialty_desc_ar')->default(null)->change();
        });
    }
}
