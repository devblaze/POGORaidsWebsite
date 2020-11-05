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
        Schema::disableForeignKeyConstraints();
        Schema::create('raids', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('pokemon_id');
            $table->tinyInteger('invites');
            $table->boolean('hatched');
            $table->boolean('weather_boost');
            $table->timestamp('end_time');
            $table->timestamps();

            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers')
                ->onDelete('cascade');
            $table->foreign('pokemon_id')
                ->references('id')
                ->on('pokemon')
                ->onDelete('cascade');

/*            $table->foreign('party_id')
                ->references('id')
                ->on('party');*/
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('raids');
        Schema::enableForeignKeyConstraints();
    }
}
