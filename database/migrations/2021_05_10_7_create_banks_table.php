<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->integer('paymentMethodId')->nullable();
            $table->string('name');
            $table->string('image');
            $table->float('commission',10,2);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
            $table->string('status')->default('1');
            $table->boolean('isActive')->default(true);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
