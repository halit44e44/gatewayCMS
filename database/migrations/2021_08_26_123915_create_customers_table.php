<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('address_id')->unsigned()->nullable();
            $table->string('customerId');
            $table->string('fullName');
            $table->string('tcNo');
            $table->string('phone');
            $table->string('eMail');
            $table->integer('customerType')->nullable();
            $table->string('ip');
            $table->string('language');
            $table->timestamps();
            $table->softDeletes();
            //$table->string('status')->default('1');
            $table->boolean('isActive')->default(true);
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
