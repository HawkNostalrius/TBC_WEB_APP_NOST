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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->tinyInteger('gm_level')->default(0);
            $table->timestamps();
        });

        /**
         * TODO A DELETE POUR LA PRODUCTION
         */
        DB::table('user')->insert(
            array(
                'login' => 'test',
                'email' => 'test@gmail.com',
                'gm_level' => 1,
                'password' => '3d0d99423e31fcc67a6745ec89d70d700344bc76'
            )
        );

        DB::table('user')->insert(
            array(
                'login' => 'Daemon',
                'email' => 'Daemon.nostalrius@gmail.com',
                'gm_level' => 4,
                'password' => '8c055a39c987202958bef1b9b38f387397eb1dd8'
            )
        );

        DB::table('user')->insert(
            array(
                'login' => 'Viper',
                'email' => 'Viper.nostalrius@gmail.com',
                'gm_level' => 4,
                'password' => 'd150544b7e83b226c94dc49de994c0580402a2b4'
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
        Schema::drop('user');
    }
}
