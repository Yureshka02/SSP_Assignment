<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('garage_id');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('region');
            $table->string('postal_code')->nullable();
            $table->string('phone');
            $table->string('card_number');
            $table->string('name_on_card');
            $table->string('expiration_date');
            $table->string('cvc');
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
