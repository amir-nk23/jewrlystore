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
        Schema::create('notebooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('pay_date')->nullable();
            $table->unsignedBigInteger('paid')->nullable();
            $table->unsignedBigInteger('installment_id');
                        $table->foreign('installment_id')
                            ->references('id')
                            ->on('installments')
                            ->onDelete('no action')
                            ->onUpdate('cascade');
                        $table->boolean('status');
                        $table->string('pay_status')->nullable();
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
        Schema::dropIfExists('notebooks');
    }
};
