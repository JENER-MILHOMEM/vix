<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('projects', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('titulo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('descricao');
            $table->integer('orçamento');
            $table->timestamps();
            $table->string('img');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('projects');
    }
};
