<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('nozzles', function (Blueprint $table) {


            $table->id();



            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */

            $table->foreignId('company_id')
                ->nullable()
                ->constrained('companies')
                ->nullOnDelete();



            $table->foreignId('pump_id')
                ->constrained('pumps')
                ->cascadeOnDelete();



            /*
            |--------------------------------------------------------------------------
            | Fuel Connection
            |--------------------------------------------------------------------------
            */


            $table->foreignId('tank_id')
                ->constrained('tanks')
                ->cascadeOnDelete();



            $table->foreignId('fuel_type_id')
                ->constrained('fuel_types')
                ->cascadeOnDelete();




            /*
            |--------------------------------------------------------------------------
            | Nozzle Information
            |--------------------------------------------------------------------------
            */


            $table->string('name');


            $table->string('code')
                ->unique();



            /*
            |--------------------------------------------------------------------------
            | Meter Reading
            |--------------------------------------------------------------------------
            */


            $table->decimal('meter_start',12,2)
                ->default(0);



            $table->decimal('meter_current',12,2)
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
        Schema::dropIfExists('nozzles');
    }

};