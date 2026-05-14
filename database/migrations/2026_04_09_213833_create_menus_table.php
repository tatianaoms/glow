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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del botón (Ej: INICIO)
            $table->string('url')->nullable(); // A dónde lleva
            $table->unsignedBigInteger('parent_id')->nullable(); // Por si es submenú
            $table->integer('orden')->default(0); // Qué posición ocupa
            $table->timestamps();


            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }
};
