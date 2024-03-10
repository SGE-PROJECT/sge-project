<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//NOTA: VERIFICAR QUE EXISTAN LAS DEMAS TABLAS A LAS CUALES SE HACEN REFERENCIA
//CAMBIAR LAS RESTRICCIONES EN onUpdate de 'restric' a 'restrict'

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("projects", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("status");
            $table->text("general_information");
            $table->foreignId("program_id")->constrained()
            ->onUpdate('restric')
            ->onDelete('restrict');
            $table->foreignId("company_id")->constrained()
            ->onUpdate('restric')
            ->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('approved');
            $table->foreignId("academic_advisor_id")->constrained()
            ->onUpdate('restric')
            ->onDelete('restrict');
            $table->foreignId("business_advisor_id")->constrained()
            ->onUpdate('restric')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
