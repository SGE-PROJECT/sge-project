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
        Schema::create('projects_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('status', 100);
            $table->string('image', 500); 
            $table->json('general_information');
            $table->unsignedBigInteger('id_advisor_id');
            $table->foreign('id_advisor_id')->references('id')->on('users_tests')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_tests');
    }
};
