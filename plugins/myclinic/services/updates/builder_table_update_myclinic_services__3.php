<?php namespace MyClinic\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicServices3 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->renameColumn('desctription', 'description');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_services_', function($table)
        {
            $table->renameColumn('description', 'desctription');
        });
    }
}
