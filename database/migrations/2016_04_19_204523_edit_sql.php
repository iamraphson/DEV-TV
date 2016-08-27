<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        /*Schema::table('videos_tbl', function ($table) {
            $table->foreign('video_category')->references('cat_id')->on('Categories_tbl')->onUpdate('cascade')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
