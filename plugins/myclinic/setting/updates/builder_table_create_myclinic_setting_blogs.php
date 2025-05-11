<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicSettingBlogs extends Migration
{
    public function up()
    {
        Schema::create('myclinic_setting_blogs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('author_name');
            $table->string('tag_line');
            $table->string('tag_line_ar');
            $table->text('description');
            $table->text('description_ar');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_setting_blogs');
    }
}
