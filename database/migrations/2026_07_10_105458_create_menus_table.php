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

            // Parent Menu
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('menus')
                ->nullOnDelete();

            // Basic Info
            $table->string('name');
            $table->string('slug')->unique();

            // UI
            $table->string('icon')->nullable();

            // Navigation
            $table->string('route_name')->nullable();
            $table->string('url')->nullable();

            // Sidebar / Topbar
            $table->enum('menu_type', [
                'sidebar',
                'topbar'
            ])->default('sidebar');

            // Sorting
            $table->integer('sort_order')->default(0);

            // Active / Inactive
            $table->boolean('status')->default(true);

            // Audit
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

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