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
        Schema::create('rent_payments', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('tenant_id'); 
            $table->unsignedBigInteger('tenant_room_id');
            $table->date('payment_date');
            $table->char('payment_billing_period_start', 7); // Format: YYYY-MM
            $table->char('payment_billing_period_end', 7); // Format: YYYY-MM
            $table->unsignedInteger('payment_amount')->nullable();
            $table->string('payment_type', 50);
            $table->string('payment_reference_number')->nullable();
            $table->string('payment_receipt_url')->nullable();
            $table->enum('payment_status', ['Pending', 'Paid', 'Overdue'])->default('Pending');
            $table->date('payment_due_date');
            $table->text('payment_note')->nullable();
            $table->unsignedBigInteger('payment_collected_by_id')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_payments');
    }
};
