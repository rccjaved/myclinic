<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms6 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->string('section_1_title');
            $table->string('section_2_title');
            $table->string('section_3_title');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->dropColumn('section_1_title');
            $table->dropColumn('section_2_title');
            $table->dropColumn('section_3_title');
        });
    }
}
