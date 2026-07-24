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
    Schema::create('fuel_purchase_items', function (Blueprint $table) {

        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Purchase
        |--------------------------------------------------------------------------
        */

        $table->foreignId('fuel_purchase_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        /*
        |--------------------------------------------------------------------------
        | Fuel
        |--------------------------------------------------------------------------
        */

        $table->foreignId('fuel_type_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        /*
        |--------------------------------------------------------------------------
        | Tank
        |--------------------------------------------------------------------------
        */

        $table->foreignId('tank_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        /*
        |--------------------------------------------------------------------------
        | Purchase Quantity
        |--------------------------------------------------------------------------
        */

        $table->decimal('quantity',15,2);

        $table->decimal('rate',15,2);

        $table->decimal('total',15,2);

        /*
        |--------------------------------------------------------------------------
        | Remarks
        |--------------------------------------------------------------------------
        */

        $table->string('remarks')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_purchase_items');
    }
};
