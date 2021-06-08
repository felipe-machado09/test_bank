<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payer_id')->unsigned()->nullable();
            $table->foreign('payer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('payee_id')->unsigned()->nullable();
            $table->foreign('payee_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('value', 8, 2);
            $table->string('type_transaction');
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
        Schema::dropIfExists('transactions');
    }
}
