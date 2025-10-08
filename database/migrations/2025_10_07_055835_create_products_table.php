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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // base info
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle');
            $table->integer('regular_price')->default(0);
            $table->integer('sale_price')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('rating')->default(0);
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();

            // Relationships
            $table->foreignId('brand_id')->constrained('brands')->OnDelete('cascade');


            // base info
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
