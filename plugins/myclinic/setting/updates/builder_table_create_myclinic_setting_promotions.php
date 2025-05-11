<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMyclinicSettingPromotions extends Migration
{
    public function up()
    {
        Schema::create('myclinic_setting_promotions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('name2');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('myclinic_setting_promotions');
    }
}
