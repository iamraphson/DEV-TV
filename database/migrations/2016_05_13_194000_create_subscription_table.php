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
            $table->string('payment_desc')->nullable();
            $table->string('comment')->nullable();
            $table->string('payment_method')->default('stripe')->nullable();
            $table->decimal('amount', 8, 2)->unsigned();
            $table->decimal('discount', 8, 2)->unsigned();
            $table->decimal('total_amt', 8, 2)->unsigned();
            $table->string('transaction_id')->nullable();
            $table->timestamp('purchase_time')->nullable();
            $table->timestamp('started_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->string('doneby')->default('system');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users_tbl')->onDelete('cascade');
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
