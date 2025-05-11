<?php namespace MyClinic\Social\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicSocial extends Migration
{
    public function up()
    {
        Schema::create('myclinic_social_records', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('phone_no');
            $table->string('platform');
            $table->string('type');
            $table->string('slug')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_social_records');
    }
}
