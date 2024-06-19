<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('商品名');
            $table->text('introduction', 300)->comment('商品説明');
            $table->integer('price', false, 99999)->unsigned()->default(300)->comment('商品価格');
            $table->string('image')->nullable()->default('item_sample.webp')->comment('商品画像');
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('status_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
