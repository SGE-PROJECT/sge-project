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
        Schema::disableForeignKeyConstraints();
        Schema::create("project_likes", function (Blueprint $table) {
            $table->id();
            $table->foreignId("academic_advisor_id")->constrained("academic_advisors");
            $table->foreignId("project_id")->constrained("projects")->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_likes');
    }
};
