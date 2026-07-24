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
        Schema::create('employees', function (Blueprint $table) {

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

            $table->foreignId('branch_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('designation_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Employee Identity
            |--------------------------------------------------------------------------
            */

            $table->string('employee_code')->unique();

            $table->string('first_name');

            $table->string('last_name')->nullable();

            $table->string('full_name');

            $table->string('photo')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Personal Information
            |--------------------------------------------------------------------------
            */

            $table->enum('gender', [
                'Male',
                'Female',
                'Other'
            ]);

            $table->date('date_of_birth')->nullable();

            $table->string('blood_group', 10)->nullable();

            $table->string('religion')->nullable();

            $table->string('marital_status')->nullable();

            $table->string('nationality')
                ->default('Bangladeshi');

            $table->string('national_id')
                ->nullable();

            $table->string('passport_no')
                ->nullable();

            $table->string('driving_license')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Contact
            |--------------------------------------------------------------------------
            */

            $table->string('email')
                ->nullable();

            $table->string('phone', 20);

            $table->string('alternate_phone', 20)
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Address
            |--------------------------------------------------------------------------
            */

            $table->text('present_address')
                ->nullable();

            $table->text('permanent_address')
                ->nullable();

            $table->string('city')
                ->nullable();

            $table->string('state')
                ->nullable();

            $table->string('country')
                ->default('Bangladesh');

            $table->string('postal_code')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Employment
            |--------------------------------------------------------------------------
            */

            $table->date('joining_date');

            $table->date('confirmation_date')
                ->nullable();

            $table->date('resignation_date')
                ->nullable();

            $table->date('leaving_date')
                ->nullable();

            $table->enum('employment_type', [

                'Permanent',
                'Probation',
                'Contract',
                'Part Time',
                'Intern'

            ])->default('Permanent');

            $table->enum('employment_status', [

                'Active',
                'Inactive',
                'Resigned',
                'Terminated'

            ])->default('Active');

            $table->unsignedBigInteger('reporting_manager_id')
                ->nullable();

            $table->unsignedBigInteger('shift_id')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Salary
            |--------------------------------------------------------------------------
            */

            $table->decimal('basic_salary', 12, 2)
                ->default(0);

            $table->decimal('hourly_rate', 10, 2)
                ->default(0);

            $table->decimal('overtime_rate', 10, 2)
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | Settings
            |--------------------------------------------------------------------------
            */

            $table->integer('sort_order')
                ->default(0);

            $table->boolean('is_system')
                ->default(false);

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
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->softDeletes();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Self Relationship
            |--------------------------------------------------------------------------
            */

            $table->foreign('reporting_manager_id')
                ->references('id')
                ->on('employees')
                ->nullOnDelete()
                ->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};