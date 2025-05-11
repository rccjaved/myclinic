<?php namespace MyClinic\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicServices2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->string('service_type');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->dropColumn('service_type');
        });
    }
}
