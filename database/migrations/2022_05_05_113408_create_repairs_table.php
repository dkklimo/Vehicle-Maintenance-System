<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('previous_DOR')->nullable();
            $table->string('expected_DOR')->nullable();
            $table->string('DOR')->nullable();
            $table->string('amount')->nullable();
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('garage')->nullable();
            $table->string('mechanic')->nullable();
            $table->string('mechanic_report')->nullable();
            $table->string('status')->nullable();
            $table->string('reject_reason')->nullable();
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
        Schema::dropIfExists('repairs');
    }
}
