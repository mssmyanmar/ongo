<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('display_name');
            $table->string('identifier');
            $table->string('validation_regx');
            $table->integer('display_order');
            $table->string('field_type');
            $table->boolean('isRequired');
            $table->string('min')->nullable()->default(null);
            $table->string('max')->nullable()->default(null);
            $table->string('branch_data', 255)->nullable()->default(null);
            $table->string('format')->nullable()->default(null);
            $table->softDeletes(); 
            $table->timestamps();
            $table->foreign('client_id')
                    ->references('id')->on('clients')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_fields');
    }
}