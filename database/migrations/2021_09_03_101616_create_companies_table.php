<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('company_payment_id')->unsigned()->nullable();
            $table->bigInteger('balance_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->string('hostname');
            $table->string('ipn');
            $table->string('institutionType');
            $table->string('institutionCode');
            $table->string('apiKey');
            $table->string('secretKey');
            $table->timestamps();
            $table->softDeletes();
            $table->string('status')->default('1');
            $table->boolean('isActive')->default(true);
            //$table->foreign('company_payment_id')->references('id')->on('company_payment_methods');
            // $table->foreign('balance_id')->references('id')->on('balances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
