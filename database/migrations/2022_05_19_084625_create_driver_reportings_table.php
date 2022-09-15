<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverReportingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_reportings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('image')->nullable();
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('driver')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('driver_reportings');
    }
}
