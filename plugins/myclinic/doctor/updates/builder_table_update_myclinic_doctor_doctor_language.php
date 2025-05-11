<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicDoctorDoctorLanguage extends Migration
{
    public function up()
    {
        Schema::table('myclinic_doctor_doctor_language', function($table)
        {
            $table->bigInteger('doctor_id');
            $table->bigInteger('language_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_doctor_doctor_language', function($table)
        {
            $table->dropColumn('doctor_id');
            $table->dropColumn('language_id');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
