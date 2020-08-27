<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('raids', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->string('name');
            $table->integer('level');
            $table->tinyInteger('party_size');
            $table->boolean('status');
            $table->boolean('weather_boost');
            $table->string('icon_name');
            $table->timestamp('end_time');
            $table->timestamps();

/*            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers')
                ->onDelete('cascade');
            $table->foreign('party_id')
                ->references('id')
                ->on('party');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('raids');
    }
}
