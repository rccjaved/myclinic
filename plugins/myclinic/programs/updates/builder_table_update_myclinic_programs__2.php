<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms2 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->renameColumn('page_url', 'slug');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->renameColumn('slug', 'page_url');
        });
    }
}
