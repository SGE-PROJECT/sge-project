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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('matricula');
            $table->string('nombre');
            $table->boolean('tradicional')->default(false);
            $table->boolean('excelencia')->default(false);
            $table->boolean('proyecto_investigacion')->default(false);
            $table->boolean('experiencia_profesional')->default(false);
            $table->boolean('certificacion_profesional')->default(false);
            $table->boolean('movilidad_internacional')->default(false);
            $table->string('contacto_inicial')->nullable();
            $table->string('contacto_seguimiento')->nullable();
            $table->string('contacto_cierre')->nullable();
            $table->integer('evaluacion_asesor_empresarial')->nullable();
            $table->integer('evaluacion_asesor_academico')->nullable();
            $table->json('actividad_realizada')->nullable();
            $table->boolean('amonestacion_academica1')->default(false);
            $table->boolean('amonestacion_academica2')->default(false);
            $table->boolean('gestion_empresarial1')->default(false);
            $table->boolean('gestion_empresarial2')->default(false);
            $table->string('nombre_asesor')->nullable();
            $table->string('correo_asesor')->nullable();
            $table->string('titulo_memoria')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
        DB::table('reports')->update(['actividad_realizada' => json_encode([])]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
