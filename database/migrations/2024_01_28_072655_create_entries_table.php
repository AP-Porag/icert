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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('entrySKU')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('item_qty')->nullable();
            $table->string('billing_address_line_one')->nullable();
            $table->string('billing_address_line_two')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postal')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('same_as_billing')->nullable();
            $table->string('autographed')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_company_name')->nullable();
            $table->string('shipping_address_line_one')->nullable();
            $table->string('shipping_address_line_two')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_postal')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('grading_location')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('payment_made')->nullable();
            $table->string('pay_on_pickup')->nullable();
            $table->string('cod')->nullable();
            $table->string('shopify_order_number')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('show_pickup_location')->nullable();
            $table->string('third_party_drop_center')->nullable();
            $table->string('use_customer_account')->nullable();
            $table->string('customer_account_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
