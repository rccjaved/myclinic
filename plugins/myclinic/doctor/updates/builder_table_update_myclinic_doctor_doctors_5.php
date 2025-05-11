<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctors5 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->text('about')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctors', function($table)
        {
            $table->string('about', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
