<?php namespace MyClinic\Hr\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicHrCareer2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_hr_career', function($table)
        {
            $table->string('city_of_employment', 255)->nullable();
            $table->string('contract_type', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_hr_career', function($table)
        {
            $table->dropColumn('city_of_employment');
            $table->dropColumn('contract_type');
        });
    }
}
