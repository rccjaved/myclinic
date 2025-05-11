<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicSettingSliders extends Migration
{
    public function up()
    {
        Schema::create('myclinic_setting_sliders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('type');
            $table->string('image');
            $table->string('title');
            $table->text('tag_line');
            $table->string('link_name');
            $table->string('link_value');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_setting_sliders');
    }
}
