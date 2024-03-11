<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('advisory_sessions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('session_date');
            $table->text('description');
            $table->boolean('is_confirmed')->default(false);
            $table->foreignId('id_proyect_id')->constrained('projects_tests')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('id_advisor_id')->constrained('users_test')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisory_sessions');
    }
};
