<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('stock_movements', function (Blueprint $table) {


            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */


            $table->foreignId('company_id')
                ->constrained()
                ->cascadeOnDelete();


            $table->foreignId('pump_id')
                ->constrained()
                ->cascadeOnDelete();





            /*
            |--------------------------------------------------------------------------
            | Fuel Location
            |--------------------------------------------------------------------------
            */


            $table->foreignId('tank_id')
                ->constrained()
                ->cascadeOnDelete();



            $table->foreignId('fuel_type_id')
                ->constrained()
                ->cascadeOnDelete();







            /*
            |--------------------------------------------------------------------------
            | Movement Information
            |--------------------------------------------------------------------------
            */


            $table->enum('type',[

                'Purchase',

                'Sale',

                'Adjustment',

            ]);




            $table->decimal(
                'quantity',
                12,
                2
            );





            /*
            |--------------------------------------------------------------------------
            | Reference
            |--------------------------------------------------------------------------
            */


            $table->string(
                'reference_type'
            )
            ->nullable();



            $table->unsignedBigInteger(
                'reference_id'
            )
            ->nullable();







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





    public function down(): void
    {

        Schema::dropIfExists(
            'stock_movements'
        );

    }

};