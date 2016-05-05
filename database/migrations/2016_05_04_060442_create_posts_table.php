<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tbl', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_title')->nullable();
            $table->string('post_image_location')->nullable();
            $table->string('post_slug')->nullable();
            $table->text('post_content')->nullable();
            $table->integer('post_category')->unsigned();
            $table->string('post_access', 20)->nullable();
            $table->string('active', 2)->nullable();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users_tbl')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('edited_by')->unsigned();
            $table->foreign('edited_by')->references('id')->on('users_tbl')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts_tbl');
    }
}
