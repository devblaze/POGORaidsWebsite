<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->boolean('can_modify_users')->default(0);
            $table->boolean('can_modify_users_access')->default(0);
            $table->boolean('can_modify_trainers')->default(0);
            $table->boolean('can_modify_raids')->default(0);
            $table->boolean('can_modify_pokemons')->default(0);
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
        Schema::dropIfExists('access_levels');
    }
}
