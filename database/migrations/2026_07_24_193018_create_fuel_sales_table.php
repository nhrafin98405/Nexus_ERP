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

    /*
    |--------------------------------------------------------------------------
    | Organization
    |--------------------------------------------------------------------------
    */

    $table->foreignId('company_id')->constrained()->cascadeOnDelete();

    $table->foreignId('pump_id')->constrained()->cascadeOnDelete();



    /*
    |--------------------------------------------------------------------------
    | Sales
    |--------------------------------------------------------------------------
    */

    $table->string('invoice_no')->unique();

    $table->date('sale_date');



    /*
    |--------------------------------------------------------------------------
    | Fuel
    |--------------------------------------------------------------------------
    */

    $table->foreignId('nozzle_id')->constrained()->cascadeOnDelete();

    $table->foreignId('tank_id')->constrained()->cascadeOnDelete();

    $table->foreignId('fuel_type_id')->constrained()->cascadeOnDelete();



    /*
    |--------------------------------------------------------------------------
    | Meter
    |--------------------------------------------------------------------------
    */

    $table->decimal('opening_meter',12,2);

    $table->decimal('closing_meter',12,2);

    $table->decimal('quantity',12,2);



    /*
    |--------------------------------------------------------------------------
    | Price
    |--------------------------------------------------------------------------
    */

    $table->decimal('unit_price',12,2);

    $table->decimal('subtotal',12,2);

    $table->decimal('discount',12,2)->default(0);

    $table->decimal('vat',12,2)->default(0);

    $table->decimal('grand_total',12,2);



    /*
    |--------------------------------------------------------------------------
    | Payment
    |--------------------------------------------------------------------------
    */

    $table->enum('payment_type',[
        'Cash',
        'Card',
        'Mobile Banking',
        'Credit'
    ]);



    /*
    |--------------------------------------------------------------------------
    | Customer
    |--------------------------------------------------------------------------
    */

    $table->string('customer_name')->nullable();

    $table->string('customer_phone')->nullable();



    /*
    |--------------------------------------------------------------------------
    | Status
    |--------------------------------------------------------------------------
    */

    $table->boolean('status')->default(true);



    /*
    |--------------------------------------------------------------------------
    | Audit
    |--------------------------------------------------------------------------
    */

    $table->foreignId('created_by')->nullable()->constrained('users');

    $table->foreignId('updated_by')->nullable()->constrained('users');



    $table->timestamps();

    $table->softDeletes();

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
