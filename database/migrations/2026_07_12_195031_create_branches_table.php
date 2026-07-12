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
    Schema::create('branches', function (Blueprint $table) {

        $table->id();

        $table->foreignId('company_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->restrictOnDelete();

        $table->string('name');
        $table->string('code')->unique();

        $table->string('email')->nullable();
        $table->string('phone', 20)->nullable();
        $table->string('website')->nullable();

        $table->string('logo')->nullable();

        $table->text('address')->nullable();

        $table->boolean('status')
            ->default(true);

        $table->softDeletes();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
