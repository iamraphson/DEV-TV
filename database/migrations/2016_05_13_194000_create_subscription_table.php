<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create("subscription_tbl", function (Blueprint $table) {
            $table->increments('subscription_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users_tbl')->onDelete('cascade');
            $table->timestamp('purchase_time')->nullable();
            $table->timestamp('started_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('doneby')->default('stripe');
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
        Schema::drop("subscription_tbl");
    }
}
