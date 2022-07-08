<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_cashes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->string('staff_name');
            $table->unsignedBigInteger('company_id');
            $table->string('merchant_id');
            $table->string('company_name');
            $table->integer('amount');
            $table->string('description');
            $table->string('remarks');
            $table->boolean('sync_status');
            $table->date('collected_date');
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
        Schema::dropIfExists('store_cashes');
    }
}