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
       Schema::create('attendances', function (Blueprint $table) {

    $table->id();

    $table->foreignId('employee_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    $table->date('attendance_date');

    $table->time('check_in')->nullable();

    $table->time('check_out')->nullable();

    $table->enum('status', [
        'present',
        'absent',
        'late',
        'half_day',
        'leave',
    ])->default('present');

    $table->integer('working_minutes')
        ->default(0);

    $table->text('remarks')
        ->nullable();

    $table->timestamps();

    $table->softDeletes();

    $table->unique([
        'employee_id',
        'attendance_date',
    ]);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
