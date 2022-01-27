<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grindings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('grind_setting')->nullable(false);
            $table->string('quantity_used')->nullable(false);
            $table->boolean('repeatable')->nullable(false)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grindings');
    }
}
