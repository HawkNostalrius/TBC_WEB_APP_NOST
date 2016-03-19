<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->tinyInteger('gm_level')->default(0);
            $table->timestamps();
        });

        /**
         * TODO A DELETE POUR LA PRODUCTION
         */
        DB::table('account')->insert(
            array(
                'username' => 'test',
                'password' => '3d0d99423e31fcc67a6745ec89d70d700344bc76'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('account');
    }
}
