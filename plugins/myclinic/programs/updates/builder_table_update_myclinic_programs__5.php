<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms5 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->text('tag_line');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->dropColumn('tag_line');
        });
    }
}
