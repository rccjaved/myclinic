<?php namespace MyClinic\Social\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSocialRecords3 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_social_records', function($table)
        {
            $table->string('landuage')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_social_records', function($table)
        {
            $table->dropColumn('landuage');
        });
    }
}
