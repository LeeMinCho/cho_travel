<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("travel_package_id");
            $table->date("start_date");
            $table->date("end_date");
            $table->tinyInteger("type")->comment("1 open trip | 2 private trip");
            $table->string("caption");
            $table->integer("min_quota");
            $table->integer("max_quota");
            $table->string("trip_number");
            $table->float("price");
            $table->string("departure_from", 100);
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
        Schema::dropIfExists('travel_offers');
    }
}
