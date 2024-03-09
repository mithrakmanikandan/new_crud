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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->date('dob');
            $table->string('phone_number_1')->nullable(false); // Primary and mandatory
            $table->string('phone_number_2')->nullable();
            $table->string('address_1')->nullable(false); // Mandatory
            $table->string('address_2')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_active')->default(true);
            $table->softDeletes(); // Implement soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
