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
        //
        Schema::create('programs', function (Blueprint $table) {
            $table->id('id_program');
            $table->string('name');
            $table->text('description');
            $table->foreignId('id_division_id')->constrained('divisions', 'id_division') // Especificar el nombre de la columna primaria
            ->onUpdate('restrict')
            ->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('programs');
    }
};
