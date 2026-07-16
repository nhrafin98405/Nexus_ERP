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
    Schema::create('pumps', function (Blueprint $table) {

        $table->id();

        // Pump Information
        $table->string('name');
        $table->string('code')->unique();

        // Owner
        $table->string('owner_name')->nullable();

        // Contact
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        // Address
        $table->text('address')->nullable();

        // Status
        $table->boolean('status')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pumps');
    }
};
