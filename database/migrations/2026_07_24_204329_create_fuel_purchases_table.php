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
    Schema::create('fuel_purchases', function (Blueprint $table) {

        $table->id();

        /*
        |--------------------------------------------------------------------------
        | Organization
        |--------------------------------------------------------------------------
        */

        $table->foreignId('company_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->foreignId('pump_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        /*
        |--------------------------------------------------------------------------
        | Supplier
        |--------------------------------------------------------------------------
        */

        $table->foreignId('supplier_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        /*
        |--------------------------------------------------------------------------
        | Purchase Information
        |--------------------------------------------------------------------------
        */

        $table->string('purchase_no')->unique();

        $table->date('purchase_date');

        /*
        |--------------------------------------------------------------------------
        | Amount
        |--------------------------------------------------------------------------
        */

        $table->decimal('subtotal',15,2)->default(0);

        $table->decimal('discount',15,2)->default(0);

        $table->decimal('vat',15,2)->default(0);

        $table->decimal('grand_total',15,2)->default(0);

        /*
        |--------------------------------------------------------------------------
        | Payment
        |--------------------------------------------------------------------------
        */

        $table->decimal('paid_amount',15,2)->default(0);

        $table->decimal('due_amount',15,2)->default(0);

        $table->enum('payment_status',[

            'Paid',
            'Partial',
            'Due',

        ])->default('Due');

        $table->enum('payment_method',[

            'Cash',
            'Bank',
            'Mobile Banking',
            'Cheque',

        ])->default('Cash');

        /*
        |--------------------------------------------------------------------------
        | Remarks
        |--------------------------------------------------------------------------
        */

        $table->text('remarks')->nullable();

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

        $table->foreignId('created_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->foreignId('updated_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamps();

        $table->softDeletes();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_purchases');
    }
};
