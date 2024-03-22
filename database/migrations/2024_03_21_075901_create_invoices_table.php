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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date');
            $table->date('service_date');
            $table->date('due_date');
            $table->integer('status_id')->default(0);
            $table->integer('company_id')->default(1);
            $table->integer('product_id')->default(1);
            $table->integer('quantity')->default(1);
            $table->integer('customer_id')->nullable();
            $table->string('vat')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->enum('currency', ['usd', 'eur', 'pln'])->default('usd');
            $table->enum('secondary_currency', ['usd', 'eur', 'pln'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
