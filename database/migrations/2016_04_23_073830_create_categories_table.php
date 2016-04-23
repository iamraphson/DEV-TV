<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('Categories_tbl', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('category_name')->nullable();
            $table->integer('parent_id')->unsigned();
            $table->integer('display_order')->unsigned();
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
        //
    }
}
