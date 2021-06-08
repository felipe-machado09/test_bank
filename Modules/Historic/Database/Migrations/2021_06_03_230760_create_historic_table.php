<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->unsigned()->nullable();
            $table->foreign('account_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('payer_id')->unsigned()->nullable();
            $table->foreign('payer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('payee_id')->unsigned()->nullable();
            $table->foreign('payee_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('previous_balance', 8, 2);
            $table->decimal('future_balance', 8, 2);
            $table->decimal('value', 8, 2);
            $table->string('type_historic');


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
        Schema::dropIfExists('historic');
    }
}
