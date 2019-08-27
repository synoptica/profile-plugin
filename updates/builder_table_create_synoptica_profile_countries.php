<?php namespace Synoptica\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSynopticaProfileCountries extends Migration
{
    public function up()
    {
        Schema::create('synoptica_profile_countries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('aruba_id')->nullable()->unique();
            $table->string('name', 255);
            $table->string('name_en', 255)->nullable();
            $table->string('name_it', 255)->nullable();
            $table->string('name_es', 255)->nullable();
            $table->string('name_de', 255)->nullable();
            $table->string('code', 2)->nullable()->unique();
            $table->boolean('is_enabled')->default(1);
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('synoptica_profile_countries');
    }
}
