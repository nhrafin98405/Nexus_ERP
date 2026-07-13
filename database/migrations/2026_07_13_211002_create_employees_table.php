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
    Schema::create('employees', function (Blueprint $table) {

        $table->id();

        // Organization Relation

        $table->foreignId('company_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('branch_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('department_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('designation_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();


        // Employee Information

        $table->string('employee_code')->unique();

        $table->string('name');

        $table->string('email')
            ->nullable();

        $table->string('phone',20)
            ->nullable();


        $table->string('photo')
            ->nullable();


        $table->enum('gender', [
            'male',
            'female',
            'other'
        ])
        ->nullable();


        $table->date('date_of_birth')
            ->nullable();


        $table->date('joining_date')
            ->nullable();


        $table->text('address')
            ->nullable();


        $table->boolean('status')
            ->default(true);


        $table->timestamps();

        $table->softDeletes();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
