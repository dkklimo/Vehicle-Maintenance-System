<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vehicle');
            $table->string('pdos');
            $table->string('dos');
            $table->string('servicepart');
            $table->string('servicetype');
            $table->string('garage');
            $table->string('mechanic');
            $table->string('cmileage');
            $table->string('nmileage');
            $table->string('amount');
            $table->string('report')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('services');
    }
}
