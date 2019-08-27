<?php namespace Synoptica\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateSynopticaProfileProfiles extends Migration
{
    public function up()
    {
        Schema::create('synoptica_profile_profiles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('sid', 32)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('ceo_id')->nullable();
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('zip', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('prov', 255)->nullable();
            $table->integer('country_id')->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('vat', 255)->nullable();
            $table->string('cf', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('pec', 255)->nullable();
            $table->string('lang', 2)->nullable();
            $table->string('ip_reg', 255)->nullable();
            $table->timestamp('privacy_at')->nullable();
            $table->timestamp('terms_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('synoptica_profile_profiles');
    }
}
