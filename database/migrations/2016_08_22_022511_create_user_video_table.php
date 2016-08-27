<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateUserVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('user_video_tbl', function(Blueprint $table){
            $table->integer('user_id')->unsigned()->index();
            $table->integer('video_id')->unsigned()->index();
            $table->string('operation_type', 10)->nullable();
            $table->foreign('user_id')->references('id')->on('users_tbl')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos_tbl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('User_Video');
    }
}
