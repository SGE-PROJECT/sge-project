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
        Schema::create('division_images', function (Blueprint $table) {
            $table->id('id_image_division');
            $table->foreignId('id_division_id')->constrained('divisions', 'id_division') // Especificar el nombre de la columna primaria
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_images');
    }
};
