<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('raid_id');
            $table->unsignedBigInteger('trainer_id');
            $table->timestamps();

            $table->foreign('raid_id')
                ->references('id')
                ->on('raids');
            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
