<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::create('tanks', function (Blueprint $table) {


            $table->id();


            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */

            $table->foreignId('company_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();


            $table->foreignId('pump_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Fuel Information
            |--------------------------------------------------------------------------
            */

            $table->foreignId('fuel_type_id')
                ->nullable()
                ->constrained('fuel_types')
                ->nullOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Tank Information
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('code')
                ->unique();


            // Tank Capacity (Liter)

            $table->decimal(
                'capacity',
                12,
                2
            )
            ->default(0);



            // Current Fuel Stock

            $table->decimal(
                'current_stock',
                12,
                2
            )
            ->default(0);



            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            $table->boolean('status')
                ->default(true);



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

        Schema::dropIfExists('tanks');

    }

};