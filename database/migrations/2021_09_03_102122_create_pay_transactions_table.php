<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('token_id')->unsigned();
            $table->bigInteger('bank_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('currenicy_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->integer('result_id')->nullable();
            $table->json('product_id');
            $table->string('conversationId')->unique();
            $table->float('price',10,2);
            $table->text('description');
            $table->string('paymentUrl');
            $table->timestamps();
            $table->softDeletes();
            $table->string('status')->default('1');
            $table->boolean('isActive')->default(true);
            $table->foreign('token_id')->references('id')->on('tokens');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_transactions');
    }
}
