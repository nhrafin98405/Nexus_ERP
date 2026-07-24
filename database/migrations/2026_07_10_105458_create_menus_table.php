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
        Schema::create('menus', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Parent Menu
            |--------------------------------------------------------------------------
            */

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('menus')
                ->nullOnDelete();


            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            $table->string('name');

            $table->string('slug')->unique();

            $table->string('title')->nullable();

            $table->text('description')->nullable();


            /*
            |--------------------------------------------------------------------------
            | UI
            |--------------------------------------------------------------------------
            */

            $table->string('icon')->nullable();

            $table->string('badge')->nullable();

            $table->string('badge_color')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Navigation
            |--------------------------------------------------------------------------
            */

            $table->string('route_name')->nullable();

            $table->string('url')->nullable();

            $table->string('target')->default('_self'); // _self / _blank


            /*
            |--------------------------------------------------------------------------
            | Industry
            |--------------------------------------------------------------------------
            */

            $table->string('industry')->default('common');
            // common
            // petrol
            // inventory
            // ecommerce
            // hotel
            // restaurant
            // hospital
            // school
            // manufacturing


            /*
            |--------------------------------------------------------------------------
            | Module
            |--------------------------------------------------------------------------
            */

            $table->string('module')->nullable();
            // hr
            // payroll
            // attendance
            // accounts
            // inventory
            // sales
            // purchase
            // fuel
            // report


            /*
            |--------------------------------------------------------------------------
            | Menu Group
            |--------------------------------------------------------------------------
            */

            $table->string('menu_group')->nullable();
            // Dashboard
            // Operations
            // HR
            // Accounts
            // Reports
            // Settings


            /*
            |--------------------------------------------------------------------------
            | Permission
            |--------------------------------------------------------------------------
            */

            $table->string('permission_name')->nullable();

            $table->string('role_name')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Menu Type
            |--------------------------------------------------------------------------
            */

            $table->enum('menu_type', [
                'sidebar',
                'topbar',
                'footer',
                'quick_menu'
            ])->default('sidebar');


            /*
            |--------------------------------------------------------------------------
            | Sorting
            |--------------------------------------------------------------------------
            */

            $table->integer('sort_order')->default(0);


            /*
            |--------------------------------------------------------------------------
            | Features
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_visible')->default(true);

            $table->boolean('is_system')->default(false);

            $table->boolean('is_default')->default(false);

            $table->boolean('is_external')->default(false);

            $table->boolean('status')->default(true);


            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('created_by')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();



            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};