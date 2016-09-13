<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('videos_tbl', function (Blueprint $table) {
            $table->increments('video_id');
            $table->string('video_title')->nullable();
            $table->string('video_cover_location')->nullable();
            $table->text('video_details')->nullable();
            $table->string('video_desc')->nullable();
            $table->integer('video_category')->unsigned();
            $table->string('video_tags')->nullable();
            $table->string('video_duration', 10)->nullable();
            $table->string('video_access', 20)->nullable();
            $table->string('video_type', 10)->nullable();
            $table->text('video_source')->nullable();
            $table->string('featured', 2)->nullable();
            $table->string('active', 2)->nullable();
            $table->integer('video_favorites')->unsigned()->default(0);
            $table->integer('video_views')->unsigned()->default(0);
            $table->timestamps();
            $table->integer('created_by')->unsigned();
            $table->foreign('video_category')->references('cat_id')->on('Categories_tbl')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users_tbl')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos_tbl');
    }
}
