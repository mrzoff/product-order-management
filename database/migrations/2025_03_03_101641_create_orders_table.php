<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // ФИО покупателя
            $table->enum('status', ['new', 'completed'])->default('new'); // Статус заказа
            $table->text('comment')->nullable(); // Комментарий
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Связь с товаром
            $table->integer('quantity')->default(1); // Количество товара
            $table->decimal('total_price', 8, 2); // Итоговая цена
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
