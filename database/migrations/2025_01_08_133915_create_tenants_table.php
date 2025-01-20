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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name');
            $table->string('tenant_contact')->unique(); // Unique contact number
            $table->string('tenant_email')->unique(); // Unique email
            $table->string('tenant_marital_status');
            $table->date('tenant_birth_date');
            $table->string('tenant_address');
            $table->string('tenant_employer');
            $table->string('tenant_emergency_contact');
            $table->string('tenant_facebook_link');
            $table->string('tenant_image'); // String to store the image path or URL
            $table->text('tenant_note'); // Long text for additional notes
            $table->string('tenant_room_id'); // String for room ID, can be alphanumeric
            $table->boolean('tenant_account_enable')->default(false); // Default to false
            $table->boolean('tenant_account_bill_notif')->default(false); // Default to false
            $table->string('tenant_account_password'); // Store hashed passwords (bcrypt or argon2)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};

