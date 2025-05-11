<?php namespace MyClinic\Setting\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSettingLocations7 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->string('google_address_link')->nullable();
            $table->text('address')->nullable();
            $table->text('address_ar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('timings_description')->nullable();
            $table->text('timings_description_ar')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_setting_locations', function($table)
        {
            $table->dropColumn('google_address_link');
            $table->dropColumn('address');
            $table->dropColumn('address_ar');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('whatsapp');
            $table->dropColumn('timings_description');
            $table->dropColumn('timings_description_ar');
        });
    }
}
