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
        Schema::create('proyect_student_tests', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Proyect_id');
            $table->foreign('id_Proyect_id')->references('id')->on('projects_tests')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_Student_id');
            $table->foreign('id_Student_id')->references('id')->on('users_tests')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyect_student_tests');
    }
};
