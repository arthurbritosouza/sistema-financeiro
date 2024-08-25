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
        Schema::create('transicao', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('conta')->nullable();
            $table->text('descricao')->nullable();
            $table->date('data_pagamento')->nullable();
            $table->text('valor_conta')->nullable();
            $table->text('valor_banco')->nullable();
            $table->text('valor_final')->nullable();
            $table->dateTime('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transicao');
    }
};
