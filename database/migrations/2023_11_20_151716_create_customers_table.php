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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('customer_for')->nullable();
            $table->string('billing_address_line_one')->nullable();
            $table->string('billing_address_line_two')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postal')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('same_as_billing')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_company_name')->nullable();
            $table->string('shipping_address_line_one')->nullable();
            $table->string('shipping_address_line_two')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postal')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
