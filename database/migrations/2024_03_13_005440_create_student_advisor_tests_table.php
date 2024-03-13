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
        Schema::create('student_advisor_tests', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Asesor_id');
            $table->foreign('id_Asesor_id')->references('id')->on('users_tests')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_Student_id');
            $table->foreign('id_Student_id')->references('id')->on('users_tests')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_advisor_tests');
    }
};
