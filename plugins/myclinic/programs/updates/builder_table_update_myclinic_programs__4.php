<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms4 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->text('section_1');
            $table->text('section_2');
            $table->text('section_3');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->dropColumn('section_1');
            $table->dropColumn('section_2');
            $table->dropColumn('section_3');
        });
    }
}
