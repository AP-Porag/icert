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
        Schema::create('receiving_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receiving_id');
            $table->string('itemType')->nullable();
            //item type card
            $table->string('card_description_one')->nullable();
            $table->string('card_description_two')->nullable();
            $table->string('card_description_three')->nullable();
            $table->string('card_serial_number')->nullable();
            $table->string('card_autographed')->nullable();
            $table->string('card_authenticator_name')->nullable();
            $table->string('card_authenticator_cert_no')->nullable();
            $table->string('card_estimated_value')->nullable();

            //item type auto authentication
            $table->string('auto_authentication_description_one')->nullable();
            $table->string('auto_authentication_description_two')->nullable();
            $table->string('auto_authentication_description_three')->nullable();
            $table->string('auto_authentication_serial_number')->nullable();
            $table->string('auto_authentication_autographed')->nullable();
            $table->string('auto_authentication_authenticator_name')->nullable();
            $table->string('auto_authentication_authenticator_cert_no')->nullable();
            $table->string('auto_authentication_estimated_value')->nullable();

            //item type combined service
            $table->string('combined_service_description_one')->nullable();
            $table->string('combined_service_description_two')->nullable();
            $table->string('combined_service_description_three')->nullable();
            $table->string('combined_service_serial_number')->nullable();
            $table->string('combined_service_autographed')->nullable();
            $table->string('combined_service_authenticator_name')->nullable();
            $table->string('combined_service_authenticator_cert_no')->nullable();
            $table->string('combined_service_estimated_value')->nullable();

            //item type combined service
            $table->string('reholder_certification_number')->nullable();
            $table->string('reholder_estimated_value')->nullable();

            //item type crossover
            $table->string('crossover_description_one')->nullable();
            $table->string('crossover_description_two')->nullable();
            $table->string('crossover_description_three')->nullable();
            $table->string('crossover_serial_number')->nullable();
            $table->string('crossover_autographed')->nullable();
            $table->string('crossover_authenticator_name')->nullable();
            $table->string('crossover_authenticator_cert_no')->nullable();
            $table->string('crossover_estimated_value')->nullable();
            $table->string('crossover_item_type')->nullable();
            $table->string('crossover_minimum_grade')->nullable();
            $table->string('pieces')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiving_items');
    }
};
