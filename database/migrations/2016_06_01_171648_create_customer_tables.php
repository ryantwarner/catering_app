<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->text('note');
            
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
        });
        
        Schema::create('guest_dietary_restrictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guest_id')->unsigned();
            $table->integer('item_type_id')->unsigned()->nullable();
            $table->string('restriction_note')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('item_type_id')->references('id')->on('item_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
