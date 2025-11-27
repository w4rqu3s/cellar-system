<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bebidas', function (Blueprint $table) {

            $table->id();

            $table->string('nome');
            $table->string('desc');

            $table->year('ano');
            $table->integer('quantidade');
            $table->float('valor');

            $table->string('foto')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('tipo');
            $table->foreign('tipo')->references('id')->on('tipos');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bebidas');
    }
};
