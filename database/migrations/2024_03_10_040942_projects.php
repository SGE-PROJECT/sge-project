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
     *
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('fullname_student');
            $table->bigInteger('id_student');
            $table->string('group_student');
            $table->bigInteger('phone_student')->nullable();
            $table->string('email_student');
            $table->date('startproject_date');
            $table->date('endproject_date');
            $table->string('name_project');
            $table->string('company_name');
            $table->string('company_address');
            $table->foreignId('business_advisor_id')->nullable()->constrained('business_advisors')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('project_area');
            $table->text('general_objective');
            $table->text('problem_statement');
            $table->text('justification');
            $table->text('activities');
            $table->string('status')->default('Registrado');
            $table->boolean('is_project')->default(false);
            $table->boolean('is_public')->default(false);
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
