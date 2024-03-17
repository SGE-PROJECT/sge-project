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
            $table->bigInteger('phone_student');
            $table->string('email_student');
            $table->date('startproject_date');
            $table->date('endproject_date');
            $table->string('name_project');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('advisor_business_name');
            $table->string('advisor_business_position');
            $table->bigInteger('advisor_business_phone');
            $table->string('advisor_business_email');
            $table->string('project_area');
            $table->text('general_objective');
            $table->text('problem_statement');
            $table->text('justification');
            $table->text('activities');
            $table->foreignId("id_academic_advisor_id")->nullable()->constrained("academic_advisors")
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId("id_business_advisor_id")->nullable()->constrained("business_advisors")
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId("id_program_id")->nullable()->constrained("programs")
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId("id_company_id")->nullable()->constrained("affiliated_companies")
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->string('status')->default('Nuevo');
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
