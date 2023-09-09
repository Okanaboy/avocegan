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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->string('bar_code')->nullable();
            $table->tinyText('small_description');
            $table->text('long_description');
            $table->unsignedFloat('init_price')->nullable();
            $table->unsignedFloat('selling_price');
            $table->integer('stock')->default(0);
            $table->integer('discount')->default(NULL);
            $table->foreignId('brand_id')->constrained('product_brands')->nullable();
            $table->foreignId('sub_category_id')->constrained('product_sub_categories');
            $table->foreignId('user_id')->constrained();
            $table->unsignedFloat('weight')->nullable();
            $table->unsignedFloat('note')->default(0);
            $table->enum('trending', ['1', '0'])->default('0');
            $table->enum('status', ['online', 'offline', 'trashed', 'draft'])->default('offline');
            $table->enum('role_id', ['1', '2', '3', '4'])->default('1');

            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_description');
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
