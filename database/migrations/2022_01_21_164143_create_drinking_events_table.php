<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinking_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('event_date_time')->nullable(false);
            $table->integer('rating')->nullable(true)->default(0);
            $table->string('comments')->nullable(true);
            $table->boolean('drank_at_home')->nullable(false)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinking_events');
    }
}
