<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('form_id');
            $table->integer('field_id');
            $table->string('value');
            $table->boolean('status');
            $table->integer('executed_date');
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
        Schema::dropIfExists('transaction_form_fields');
    }
}
