<?php namespace MyClinic\Hr\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicHrProgramEnrollment extends Migration
{
    public function up()
    {
        Schema::create('myclinic_hr_program_enrollment', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->bigInteger('program_id');
            $table->string('program_name');
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_hr_program_enrollment');
    }
}
