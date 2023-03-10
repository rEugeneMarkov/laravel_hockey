<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('tournament_id');
            $table->timestamps();

            $table->index('tournament_id', 'tournament_team_idx');
            $table->foreign('tournament_id', 'tournament_team_fk')->on('tournaments')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
