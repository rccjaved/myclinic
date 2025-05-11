<?php namespace MyClinic\Doctor\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicDoctor extends Migration
{
    public function up()
    {
        Schema::create('myclinic_doctor_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->bigInteger('specialty_id');
            $table->string('title')->nullable();
            $table->string('tag_line')->nullable();
            $table->string('link_name')->nullable();
            $table->string('link_value')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('tag_line_ar')->nullable();
            $table->string('link_name_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_doctor_');
    }
}
