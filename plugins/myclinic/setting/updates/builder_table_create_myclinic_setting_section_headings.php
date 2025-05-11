<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicSettingSectionHeadings extends Migration
{
    public function up()
    {
        Schema::create('myclinic_setting_section_headings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('page');
            $table->string('section');
            $table->string('name');
            $table->string('name_ar');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_setting_section_headings');
    }
}
