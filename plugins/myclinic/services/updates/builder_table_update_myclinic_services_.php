<?php namespace MyClinic\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicServices extends Migration
{
    public function up()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->string('page_url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->dropColumn('page_url');
        });
    }
}
