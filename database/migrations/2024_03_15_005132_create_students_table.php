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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->string('registration_number')->unique();
            $table->foreignId('academic_advisor_id')->nullable()->constrained('academic_advisors')->onUpdate('cascade')->onDelete('restrict');
            $table->bigInteger('sanction_advisor')->default(0);
            $table->bigInteger('sanction_company')->default(0);
            $table->foreignId('book_id')->nullable()->constrained('books')->inDelete('cascade');
            $table->boolean('isReEntry')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
