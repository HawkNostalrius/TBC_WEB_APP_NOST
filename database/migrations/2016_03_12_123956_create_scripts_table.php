<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('script', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->unsignedInteger('user_id');
            $table->enum('status',
                ['WaitingAdminConfirmForTest',
                    'AcceptedForTestStep',
                    'Testing',
                    'AcceptedAfterTest',
                    'RefusedAfterTest'])
                ->default('WaitingAdminConfirmForTest');
            $table->string('updated_admin_by')->nullable();
            $table->string('updated_admin_at')->nullable();
            $table->timestamps();
        });

        DB::table('script')->insert(
            array(
                'title' => 'Title test script 1',
                'content' => "Test Content for script",
                'user_id' => 1,
                'status' => 'WaitingAdminConfirmForTest'
            ));
        DB::table('script')->insert(
            array(
                'title' => 'Title test script 2',
                'content' => "Test Content for script",
                'user_id' => 1,
                'status' => 'AcceptedForTestStep'
            ));
        DB::table('script')->insert(
            array(
                'title' => 'Title test script 3',
                'content' => "Test Content for script",
                'user_id' => 1,
                'status' => 'Testing'
            ));
        DB::table('script')->insert(
            array(
                'title' => 'Title test script 4',
                'content' => "Test Content for script",
                'user_id' => 1,
                'status' => 'AcceptedAfterTest'
            ));
        DB::table('script')->insert(
            array(
                'title' => 'Title test script 5',
                'content' => "Test Content for script",
                'user_id' => 1,
            'status' => 'RefusedAfterTest'
            ));
        DB::table('script')->insert(
            array(
                'title' => 'Title test script 6',
                'content' => "Test Content for script",
                'user_id' => 1,
                'status' => 'WaitingAdminConfirmForTest'
            ));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('script');
    }
}
