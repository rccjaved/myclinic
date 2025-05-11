<?php namespace MyClinic\Social\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicSocialRecords4 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_social_records', function($table)
        {
            $table->renameColumn('landuage', 'language');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_social_records', function($table)
        {
            $table->renameColumn('language', 'landuage');
        });
    }
}
