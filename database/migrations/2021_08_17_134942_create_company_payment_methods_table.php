<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bank_id')->unsigned();
            $table->float('percent',10,2);
            $table->float('maxValue',10,2);
            $table->float('minValue',10,2);
            $table->float('controlValue',10,2);
            $table->bigInteger('company_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('status')->default('1');
            $table->boolean('isActive')->default(true);
            $table->foreign('bank_id')->references('id')->on('banks');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_payment_methods');
    }
}
