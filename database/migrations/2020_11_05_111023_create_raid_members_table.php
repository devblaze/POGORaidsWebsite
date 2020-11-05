<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaidMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('raid_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('raid_id');
            $table->unsignedBigInteger('trainer_id');
            $table->timestamps();

            $table->foreign('raid_id')
                ->references('id')
                ->on('raids')
                ->onDelete('cascade');
            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers')
                ->onDelete('cascade');

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raid_members');
    }
}
