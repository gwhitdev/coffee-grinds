<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('coffee_type_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('supplier_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('brand_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('drink_type_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('grinding_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('drinking_event_id')->nullable(true)->constrained()->nullOnDelete();
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->foreignId('drinking_location_id')->nullable(true)->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['coffee_type_id']);
            $table->dropColumn('coffee_type_id');
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropColumn('supplier_id');
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['drink_type_id']);
            $table->dropColumn('drink_type_id');
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['grinding_id']);
            $table->dropColumn('grinding_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['drinking_event_id']);
            $table->dropColumn('drinking_event_id');
        });

        Schema::table('drinking_events', function (Blueprint $table) {
            $table->dropForeign(['drinking_location_id']);
            $table->dropColumn('drinking_location_id');
        });
    }
}
