<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();;
            $table->timestamps();
        });

        Schema::create('permission', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();;
            $table->timestamps();
        });

        Schema::create('permission_role', function(Blueprint $table){
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')
                ->references('id')
                ->on('permission')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);

        });


        Schema::create('role_user', function(Blueprint $table){
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');

            $table->primary(['role_id', 'user_id']);
        });


        DB::table('role')->insert(
            array('name' => 'admin',
                'label' => 'Administrator')
        );

        DB::table('role_user')->insert(
            array('role_id' => 1,
                'user_id' => 2)
        );

        DB::table('role_user')->insert(
            array('role_id' => 1,
                'user_id' => 3)
        );
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('role_user');
        Schema::drop('role');
        Schema::drop('permission');
        //
    }
}
