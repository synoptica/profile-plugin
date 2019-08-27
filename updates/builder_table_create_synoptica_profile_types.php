<?php namespace Synoptica\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSynopticaProfileTypes extends Migration
{
    public function up()
    {
        Schema::create('synoptica_profile_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('code', 255)->nullable();
            $table->string('external_code', 255)->nullable();
            $table->float('vat_rate', 4, 2)->default(0);
            $table->string('vat_type', 1)->default('I');
            $table->string('invoice_format', 5)->default('FPR12');
            $table->text('configs')->nullable();
            $table->boolean('is_enabled')->default(1);
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('synoptica_profile_types');
    }
}