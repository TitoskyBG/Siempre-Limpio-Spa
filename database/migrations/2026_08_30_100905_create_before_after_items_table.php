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
        Schema::create('before_after_items', function (Blueprint $table) {
            $table->id();
            $table->string('tab_name'); // Nombre en la pestaña (ej: Pisos)
            $table->string('tab_target'); // Atributo data-target para el JS (ej: pisos)
            $table->string('tag');
            $table->string('title');
            $table->text('description');
            $table->string('image_before_path');
            $table->string('image_before_alt')->nullable();
            $table->string('image_after_path');
            $table->string('image_after_alt')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('before_after_items');
    }
};
