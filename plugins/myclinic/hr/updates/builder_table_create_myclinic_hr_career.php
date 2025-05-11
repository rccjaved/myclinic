<?php namespace MyClinic\Hr\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicHrCareer extends Migration
{
    public function up()
    {
        Schema::create('myclinic_hr_career', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('education')->nullable();
            $table->string('years_of_exp')->nullable();
            $table->string('current_residence')->nullable();
            $table->string('job_category')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('email');
            $table->string('phone');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_hr_career');
    }
}
