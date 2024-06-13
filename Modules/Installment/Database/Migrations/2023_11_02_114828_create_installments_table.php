<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->string('account_number');
            $table->string('bank');
            $table->unsignedBigInteger('down_payment');
            $table->unsignedDecimal('delay');
            $table->unsignedDecimal('profit');
            $table->unsignedDecimal('per_month_profit');
            $table->unsignedInteger('month');
            $table->boolean('status');
            $table->string('start_date');
            $table->string('end_date');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('installment_price');
            $table->unsignedBigInteger('paid')->nullable();
            $table->string('exchange')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
};
