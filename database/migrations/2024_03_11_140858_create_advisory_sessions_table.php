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
            $table->unsignedBigInteger('id_project_id');
            $table->foreign('id_project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('advisory_sessions');
    }
};
