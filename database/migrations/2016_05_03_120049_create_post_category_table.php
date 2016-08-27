<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category_tbl', function (Blueprint $table) {
            $table->increments('pc_id');
            $table->string('pc_category_name')->nullable();
            $table->string('pc_category_slug')->nullable();
            $table->integer('pc_parent_id')->unsigned();
            $table->integer('pc_display_order')->unsigned();
            $table->integer('pc_created_by')->unsigned();
            $table->integer('pc_edited_by')->unsigned();
            $table->timestamps();
            $table->foreign('pc_created_by')->references('id')->on('users_tbl')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pc_edited_by')->references('id')->on('users_tbl')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_category_tbl');
    }
}
