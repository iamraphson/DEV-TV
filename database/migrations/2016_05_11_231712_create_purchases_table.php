<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_tbl', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users_tbl')->onDelete('cascade');
            $table->string('payment_desc');
            $table->double('amount', 10, 2);
            $table->string('stripe_transaction_id');
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
        Schema::drop('”purchases”');
    }
}
