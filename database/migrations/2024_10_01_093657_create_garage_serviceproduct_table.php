<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('garage_serviceproduct', function (Blueprint $table) {
            $table->foreignId('garage_id');
            $table->foreignId('service_product_id');
            $table->integer('quantity')->default(1);
            $table->double('total', 10, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garage_serviceproduct');
    }
};
