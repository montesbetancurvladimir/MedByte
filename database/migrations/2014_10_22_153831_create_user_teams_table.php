<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserTeam;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_team')->references('id')->on('team_empresas');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('user_teams');
    }
};
