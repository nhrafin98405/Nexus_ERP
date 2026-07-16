<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_salaries', function (Blueprint $table) {

$table->id();

$table->foreignId('employee_id')
    ->constrained()
    ->cascadeOnDelete();


$table->decimal('basic_salary',10,2)
    ->default(0);

$table->decimal('house_rent',10,2)
    ->default(0);

$table->decimal('medical_allowance',10,2)
    ->default(0);

$table->decimal('transport_allowance',10,2)
    ->default(0);

$table->decimal('other_allowance',10,2)
    ->default(0);

$table->decimal('deduction',10,2)
    ->default(0);

$table->decimal('net_salary',10,2)
    ->default(0);

$table->date('effective_date')
    ->nullable();

$table->boolean('status')
    ->default(true);

$table->timestamps();

$table->softDeletes();

});
    }


    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};