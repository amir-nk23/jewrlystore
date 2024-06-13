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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('date');
            $table->unsignedBigInteger('notebook_id')->nullable();
            $table->foreign('notebook_id')
                ->references('id')
                ->on('notebooks')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('cash_id')->nullable();
            $table->foreign('cash_id')
                ->references('id')
                ->on('cashes')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('reports');
    }
};
