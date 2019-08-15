<?php namespace Synoptica\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->integer('profile_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function($table)
        {
            
            $table->dropColumn([
                'profile_id',
            ]);
        });
    }
}
