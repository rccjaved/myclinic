<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms9 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->text('tag_line_ar');
            $table->string('section_1_title_ar');
            $table->string('section_2_title_ar');
            $table->string('section_3_title_ar');
            $table->string('section_4_title_ar');
            $table->text('section_1_ar');
            $table->text('section_2_ar');
            $table->text('section_3_ar');
            $table->text('section_4_ar');
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->dropColumn('tag_line_ar');
            $table->dropColumn('section_1_title_ar');
            $table->dropColumn('section_2_title_ar');
            $table->dropColumn('section_3_title_ar');
            $table->dropColumn('section_4_title_ar');
            $table->dropColumn('section_1_ar');
            $table->dropColumn('section_2_ar');
            $table->dropColumn('section_3_ar');
            $table->dropColumn('section_4_ar');
        });
    }
}
