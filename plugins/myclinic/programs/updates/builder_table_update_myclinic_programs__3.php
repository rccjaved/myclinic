<?php namespace MyClinic\Programs\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMyclinicPrograms3 extends Migration
{
    public function up()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->text('description')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('myclinic_programs_', function($table)
        {
            $table->string('description', 255)->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
