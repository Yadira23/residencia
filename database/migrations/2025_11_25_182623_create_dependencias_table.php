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
        Schema::create('dependencias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('siglas')->nullable();
        $table->string('ubicacion')->nullable();
        $table->text('descripcion')->nullable();
        $table->unsignedBigInteger('administrador_id')->nullable();
        $table->foreign('administrador_id')->references('id')->on('administradors')->onDelete('set null');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencias');
    }
};
