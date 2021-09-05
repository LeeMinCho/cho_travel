<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->bigInteger("travel_offer_id");
            $table->integer("quantity");
            $table->tinyInteger("status")->comment("0 Rejected | 1 New Booking | 2 Approved");
            $table->string("additional_visa")->nullable();
            $table->tinyInteger("is_visa")->comment("0 No | 1 Yes");
            $table->date("doe_passport")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
