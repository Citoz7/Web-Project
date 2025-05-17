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
        Schema::table('orders', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan
            $table->dropColumn(['status', 'total']);

            // Tambahkan kolom baru
            $table->foreignId('product_id')->after('user_id')->constrained('products')->onDelete('cascade');
            $table->string('product')->after('product_id');
            $table->integer('total_order')->unsigned()->after('product');

            // Pastikan kolom created_at dan updated_at tetap ada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
             // Kembalikan perubahan
             $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
             $table->decimal('total', 10, 2);
 
             $table->dropForeign(['product_id']);
             $table->dropColumn(['product_id', 'product', 'total_order']);
        });
    }
};
