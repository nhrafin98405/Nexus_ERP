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
        Schema::create('fuel_sales', function (Blueprint $table) {

    $table->id();

    $table->foreignId('pump_id')
        ->nullable()
        ->constrained()
        ->cascadeOnDelete();

    $table->string('invoice_no')->nullable();

    $table->string('fuel_type')->nullable();

    $table->decimal('quantity',10,2)
        ->default(0);

    $table->decimal('rate',10,2)
        ->default(0);

    $table->decimal('grand_total',12,2)
        ->default(0);

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_sales');
    }
};
